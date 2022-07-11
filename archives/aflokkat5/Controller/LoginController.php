<?php
require_once("../Entity/Database.php");
require_once("../Entity/User.php");
require_once("../Entity/HTML.php");
require_once("../Entity/Commun.php");
session_start();
error_log("coucou");
$db = new Database();
        
$GLOBALS['database'] = $db->mysqlConnexion();

 // $_POST['request'] = 'connect';

// $_POST['data'] = json_encode(array("pseudo" => 'test555', "email" => 'b@b.fr',"passwd" => '123'));

// $_POST['request'] = 'connect';

// $_POST['user'] = "1";

// $_POST['sms'] = "4782";

// $_POST['password'] = "456";

// $_POST['mail'] = "c@c.fr";

// $_POST['password'] = "123";

switch($_POST['request'])
{
 case 'register':
error_log("coucou1");
	$data_user = json_decode($_POST['data'], true);

	$is_exist = User::isExist($data_user);

	$response = 0; 

	if(!$is_exist){
    error_log("coucou2");
		$user = new User(0);

		$hash = uniqid();
    error_log("coucou3");
		$user->setLogin($data_user['pseudo']);

		$user->setMail($data_user['email']);

		$user->setPass(sha1($data_user['passwd']));

		$user->setType($data_user['type']);

		$user->setHash($hash);
    error_log("coucou4");
		$user->register();
    error_log("coucou5");
		$response = 1;


	}
error_log($response);
	echo json_encode($response);

  break;

  case 'connect':

  	$error = 0;
  	$msg = "";
  	$validity = 1;

  	if(!User::checkBan($_POST['mail'])){

  		$connection = User::connect($_POST['mail'],$_POST['password']);

  		if(empty($connection)){

  			$error = 1;
  			$msg = "Identifiant incorrect";
  		}else{

  			$today = date("Y-m-d H:i:s");

  			if($connection["pass_end"] < $today){

  				$validity = 0;

  				$msg = HTML::changePassword(encrypt($connection['id']));

  			}else{

  				User::sms($connection['id']);

  				$msg = HTML::secondAuth(encrypt($connection['id']));
  			}

  		}

  	}else{

  		$error = 1;
  		$msg = "Compte ban temporairement !";
  	}
	

	echo json_encode(array("error"=>$error, "msg"=>$msg,"validity"=>$validity));

  break;

  case 'change_password':

  	$user = new User(decrypt($_POST['user']));

  	$user->setPass($_POST['password']);

  	$user->setPassEnd(date('Y-').(date('m')+3).date('-d'));

  	$user->register();

  	User::sms($_POST['user']);

  	$html = HTML::secondAuth($_POST['user']);

  	echo json_encode($html);

  break;

  case 'second_auth':

  	$error = 0;

  	$requete = "SELECT * 
		FROM `log_sms` 
		WHERE `user_id` = '". mysqli_real_escape_string($GLOBALS['database'],decrypt($_POST['user'])) ."'
		AND `code` = '". mysqli_real_escape_string($GLOBALS['database'],$_POST['sms']) ."'
		AND `state` = '0'";

	$result = mysqli_query($GLOBALS['database'], $requete) or die;

	if ($data = mysqli_fetch_assoc($result)){

		$requete = "UPDATE `log_sms` SET `state`='1' WHERE `id`='". $data['id'] ."'";

		mysqli_query($GLOBALS['database'], $requete) or die;

		$user = new User(decrypt($_POST['user']));

        $_SESSION['auth'] = encrypt($user->getLogin()."#".date("Y-m-d ").(date('H')+1).date(':i:s'));
			
    }else{

    	$error = 1;

    }

    echo json_encode($error);

  break;

  case 'forget_password':

  $html = HTML::displayForgetPassword();
    
  echo json_encode($html);

  break;

  case 'send_mail':

    $user_id = User::getUserByMail($_POST['email_send']);

    $success = 0;

    $hash = "";

    $html = "";

    if($user_id != 0){

      $success = 1;

      $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
      
      $var_size = strlen($chars);

      for ($i = 0; $i < 20; $i++) {

        $hash .= $chars[rand(0, $var_size-1)];

      }

      User::email($user_id,$hash);

      $html = HTML::linkMail($hash);
    

    }
    
    echo json_encode(array($success,$html));

  break;

  case 'modify_password':

    $user_id = User::getUserByMail($_POST['mail']);

    $success = 0;

    if($user_id != 0){

      $success = 2;

      if(User::checkHash($user_id,$_POST['token'])){

        $user = new User($user_id);

        $user->setPass(sha1($_POST['password']));

        $user->register();
        
        $success = 1;

      }

    }
    
    echo json_encode($success);

  break;


}
<?php session_start();
?> 
<?php

switch($_POST['request'])
{
 case 'connexion':

	$status = 1;
	$msg = "Connexion OK!";

	if($_POST['password'] !== "ppp"){
		$status = 0;
		$msg = "Mot de passe incorrect";
	}
	if($_POST['login'] != "pierre"){
		$status = 0;
		$msg = "Login incorrect";
	}
	if ($status == 1){
		$user = $_POST['login'];
		$_SESSION['loggedUser'] = $user;
	
	}
	echo json_encode(array("status" => $status, "msg" => $msg ));

  break;

  case 'login':

	if (isset($_SESSION['loggedUser']) && !empty($_SESSION['loggedUser'])){
		$msg = "Bienvenue ". $_SESSION['loggedUser'];
	}else{
		$msg = "Veuillez vous connecter";
	}
	echo json_encode( $msg );

  break;







 case 'connexion2':

  $data = json_decode($_POST['dataConnect'],true);

  $status = 1;
  $msg = "Connexion OK!";

  if($data['login'] != "sylvain"){

	  $status = 0;
	  $msg = "Login incorrect";

  }

  if($data['passwd'] != "123"){

	  $status = 0;
	  $msg = "Mot de passe incorrect";

  }

  echo json_encode(array("status" => $status, "msg" => $msg ));

  break;


 default :
  echo json_encode(1) ;
  break;
}
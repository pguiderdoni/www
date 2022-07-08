<?php session_start();
?> 
<?php
$log = 'log.txt';
switch($_POST['request'])
{
 case 'connexion':

	$status = 1;
	$msg = "Connexion OK!";

	if($_POST['login'] != "pierre"){
		$status = 0;
		$msg = "Login incorrect";
		file_put_contents($log, 'ID: '.$_POST['login'].' '.'le'.date(" d-m-Y H:i:s")." Connexion échouée: Utilisateur inconnu. \n", FILE_APPEND);
	}
	else if($_POST['password'] !== "ppp"){
		$status = 0;
		$msg = "Mot de passe incorrect";
		file_put_contents($log, 'ID: '.$_POST['login'].' '.'le'.date(" d-m-Y H:i:s")." Connexion échouée: Mot de passe incorrect. \n", FILE_APPEND);
	}
	else if ($status == 1){
		$user = $_POST['login'];
		$_SESSION['loggedUser'] = $user;
		file_put_contents($log, 'ID: '.$_POST['login'].' '.'le'.date(" d-m-Y H:i:s")." Connexion réussie \n", FILE_APPEND);
	
	}
	echo json_encode(array("status" => $status, "msg" => $msg ));

  break;

  case 'login':
	
	if (isset($_SESSION['loggedUser']) && !empty($_SESSION['loggedUser'])){
		$status = 1;
		$msg = "Bienvenue ". $_SESSION['loggedUser'];
	}else{
		$status = 0;
		$msg = "Veuillez vous connecter";
	}
	echo json_encode(array("status" => $status, "msg" => $msg ));
  break;


  case 'logout':
	file_put_contents($log, 'ID: '.$_SESSION['loggedUser'].' '.'le'.date(" d-m-Y H:i:s")." Déconnexion \n", FILE_APPEND);
	$status = 0;
	session_destroy();	
	echo json_encode($status);
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
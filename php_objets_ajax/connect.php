<?php 
session_start();

    // $db_login = '';
    // $db_nom = '';
    // $db_prenom = '';
    // $db_password = '';



switch($_POST['request']){
    
    
    case 'signup':
        $user = '';
        $status = 1;
        $msg = 'Inscription validée';

        if(!$_POST['login']||!$_POST['nom']||!$_POST['prenom']){
            $status = 0;
            $msg = "Veuillez renseigner tous les champs";  
        }
        else if($_POST['password1']!=$_POST['password2']){
            $status = 0;
            $msg = "Les mots de passe sont différents";
        }
        else if($status == 1){
            require_once "C:\wamp64\www\php_objets_ajax\utilisateur.php";
            $user = new User($_POST['login'], $_POST['nom'], $_POST['prenom'], $_POST['password1']);
            $_SESSION['User'] = $user;
            $_SESSION['login'] = $user->getLogin();
            $_SESSION['nom'] = $user->getNom();
            $_SESSION['prenom'] = $user->getPrenom();
        }
        echo json_encode(array("status" => $status, "msg" => $msg ));
    break;

    case 'login':
	
        if (isset($_SESSION['User']) && !empty($_SESSION['User'])){
            $status = 1;
            $msg = "Bienvenue ". $_SESSION['User'];
        }else{
            $status = 0;
            $msg = "Veuillez vous connecter";
        }
        echo json_encode(array("status" => $status, "msg" => $msg ));
      break;
    
    
      case 'logout':
        // file_put_contents($log, 'ID: '.$_SESSION['loggedUser'].' '.'le'.date(" d-m-Y H:i:s")." Déconnexion \n", FILE_APPEND);
        $status = 0;
        session_destroy();	
        echo json_encode($status);
      break;

    default :
  echo json_encode(1) ;
  break;
    
}







































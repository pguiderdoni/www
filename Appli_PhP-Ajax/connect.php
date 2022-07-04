<?php 
session_start();
include 'database.php';
include 'utilisateur.php';

$db = new Database();
$GLOBALS['Database'] = $db->connexion();

switch($_POST['request']){
    
    case 'signup':
        $status = 1;
        $msg = 'Inscription validée';
        
        if (User::checkLogin()){
            $status=0;
            $msg = "L'utilisateur existe déjà";
        }
        else if(!$_POST['login']||!$_POST['nom']||!$_POST['prenom']){
            $status = 0;
            $msg = "Veuillez renseigner tous les champs";  
        }
        else if($_POST['password1']!=$_POST['password2']){
            $status = 0;
            $msg = "Les mots de passe sont différents";
        }
        else if($status == 1){
            //cas 1 fonction statique
            //User::create($_POST['nom'],$_POST['prenom'],$_POST['login'],$_POST['password1']);

            // cas 2
            $user = new User(0);
            $user->setNom($_POST['nom']);
            $user->setPrenom($_POST['prenom']);
            $user->setPassword($_POST['password1']);
            $user->setLogin($_POST['login']);
            $id = $user->generate();
            $_SESSION['id'] = $id;
        }
        echo json_encode(array("status" => $status, "msg" => $msg ));
    break;


    case 'login':
        $requete = "SELECT * FROM `users` WHERE `login` = '" .mysqli_real_escape_string($GLOBALS['Database'],$_POST['login']) . "'";
        error_log($requete);
        $result = mysqli_query($GLOBALS['Database'], $requete)or die;
        if ($data = mysqli_fetch_array($result)){
            $status = 0;
            $msg = 'Mauvais mot de passe'; 
            if(password_verify($_POST['password'],$data['password'])){
                $status = 1;
                $msg = 'Vous êtes connecté';
                $_SESSION['login'] = $data['login'];
                $_SESSION['prenom'] = $data['prenom'];
                $_SESSION['nom'] = $data['nom'];
                $_SESSION['id'] = $data['id_user'];
            }
        }else{
            $status = 0;
            $msg = 'Utilisateur inconnu';
        }  
        echo json_encode(array("status" => $status, "msg" => $msg ));
      break;
    
    
    case 'logout':
    $status = 0;
    session_destroy();	
    echo json_encode($status);
    break;

    case 'account':
        $user = new User($_SESSION['id']);
        if ($user->is_logged()) {
            echo json_encode(array("login" => $user->getLogin(), "nom" => $user->getNom(), "prenom" => $user->getPrenom()));
        }
    break;

    case 'account_link':
        $user = new User($_SESSION['id']);
        $log=0;
        $msg='';
        if($user->is_logged()){
            $log=1; 
            $msg= 'Bienvenue, '.$_SESSION['prenom'];   
        }
        echo json_encode(array('log' => $log, 'msg'=> $msg));
    break;

        
    case 'modification':
        $user = new User($_SESSION['id']);
        $user->setNom($_POST['nom']);
        $user->setPrenom($_POST['prenom']);
        $user->setLogin($_POST['login']);
        if($user->is_logged()){
            $user->update();
        $msg= 'Information modifiée avec succès';
        }else{
            $msg= 'Une erreur est survenue';
        }
        echo json_encode(array('msg'=> $msg, 'nom'=> $user->getNom(), 'prenom'=>$user->getPrenom(), 'login'=>$user->getLogin()));
    break;

    default :
  echo json_encode(1) ;
  break;

}








































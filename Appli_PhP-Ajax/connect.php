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

        if(!$_POST['login']||!$_POST['nom']||!$_POST['prenom']){
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
            $user->generate();

            $_SESSION['login'] = $_POST['login'];
            $_SESSION['nom'] = $_POST['nom'];
            $_SESSION['prenom'] = $_POST['prenom'];
            $_SESSION['password'] = $user->getPassword();
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
            }


            
            // $this->login = $data['login'];
            // $this->nom = $data['nom'];
            // $this->prenom = $data['prenom'];
            // $status = 1;
            // $msg = 'Utilisateur inconnu';
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
    if ($_SESSION['login'] && !empty($_SESSION['login'])) {
        $userLogin = $_SESSION['login'];
        $userName = $_SESSION['nom'];
        $userSurname = $_SESSION['prenom'];
        echo json_encode(array("login" => $userLogin, "nom" => $userName, "prenom" => $userSurname));
    }
    break;

    case 'account_link':
        $log=0;
        $msg='';
        if(isset($_SESSION['login']) && !empty($_SESSION['login'])){
            $log=1; 
            $msg= 'Bienvenue, '.$_SESSION['prenom'];   
        }
        echo json_encode(array('log' => $log, 'msg'=> $msg));
    break;
        


    default :
  echo json_encode(1) ;
  break;
    
}







































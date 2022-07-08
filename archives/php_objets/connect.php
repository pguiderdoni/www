<?php
// include 'C:\wamp64\www\php_objets\function.php';  

    // $db_login = '';
    // $db_nom = '';
    // $db_prenom = '';
    // $db_password = '';



switch($_POST['request']){
    
    
    case 'signup':

        $status = 1;
        $msg = 'Inscription validée';

        if(!$POST['login']||!$POST['nom']||!$POST['prenom']){
            $status = 0;
            $msg = "Veuillez renseigner tous les champs";  
        }
        else if($_POST['password1']!=$_POST['password2']){
            $status = 0;
            $msg = "Les mots de passe sont différents";
        }
        else if($_STATUS == 1){
            require_once "C:\wamp64\www\php_objets\utilisateur.php";
            $user = new User($_POST['login'], $_POST['nom'], $_POST['prenom'], $_POST['password1']);
            $_SESSION['login'] = $user->getLogin();
            $_SESSION['nom'] = $user->getNom();
            $_SESSION['prenom'] = $user->getPrenom();
        }
        echo json_encode(array("status" => $status, "msg" => $msg ));
        break;
    
}







































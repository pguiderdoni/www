<?php
// include 'C:\wamp64\www\php_objets\function.php';  


if (isset( $_POST['login']) && isset($_POST['password1']) && isset($_POST['password2']) && isset($_POST['nom'])&& isset($_POST['prenom'])) {
    echo '1';
    if ($_POST['password1'] == $_POST['password2']){
        echo '2';
        require_once "C:\wamp64\www\php_objets\utilisateur.php";
        echo '3';
        $user = new User($_POST['login'], $_POST['nom'], $_POST['prenom'], $_POST['password1']);
     
    
        echo '4';
        $_SESSION['login'] = $user->getLogin();
        $_SESSION['nom'] = $user->getNom();
        $_SESSION['prenom'] = $user->getPrenom();

        print_r($_SESSION);// echo "Bienvenue '.$user->getNom().' '.$user->getPrenom().";
        
    }else{
        echo 'Les mots de passe ne correspondent pas';
    }

}else{
    echo 'Tous les champs sont requis!';
}

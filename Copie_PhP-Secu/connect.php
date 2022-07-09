<?php 
session_start();
include 'database.php';
include 'utilisateur.php';

$db = new Database();
$GLOBALS['Database'] = $db->connexion();

function encrypt($data){
    $key = base64_decode("Ajsffoi!/;;?x-[szck@`scd!`1934Kdp64n,:§ù^=+ù%$*^2349786;s");
    $encryption_key = base64_decode($key);
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv);
    return base64_encode($encrypted . '::' . $iv);
}
function decrypt($data){
    $key = base64_decode("Ajsffoi!/;;?x-[szck@`scd!`1934Kdp64n,:§ù^=+ù%$*^2349786;s");
    $encryption_key = base64_decode($key);
    list($encrypted_data, $iv) = explode('::', base64_decode($data), 2);
    $result = openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv);
    return $result;
}



switch($_POST['request']){
    
    case 'signup':
        $status = 1;
        $msg = 'Inscription validée';
        $pattern = '/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/';
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
        }else if(!strstr($_POST['login'], '@')){
            $status = 0;
            $msg = "Format d'adresse Mail invalide";
        
        // else if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $_POST['password1'])){
        //     error_log(4);
        //     $status = 0;
        //     $msg = "Mot de passe: mini 8 caractères";
        // }
        }
        else{
            $user = new User(0);
            $user->setNom($_POST['nom']);
            $user->setPrenom($_POST['prenom']);
            $user->setPassword($_POST['password1']);
            $user->setLogin($_POST['login']);
            $id = $user->generate();
            $_SESSION['id'] = encrypt($id);
        }
        echo json_encode(array("status" => $status, "msg" => $msg ));
    break;


    case 'login':
        $dateJour = date("Y-m-d");
        $requete = "SELECT * FROM `users` WHERE `login` = '".mysqli_real_escape_string($GLOBALS['Database'],$_POST['login']) . "'";
        $result = mysqli_query($GLOBALS['Database'], $requete)or die;
        if ($data = mysqli_fetch_array($result)){
            $status = 0;
            $msg = 'Mauvais mot de passe'; 
            if(password_verify($_POST['password'],$data['password'])){
                if($dateJour > $data['date_password']){
                    $status = 2;
                    $msg = encrypt($data['id_user']);
                }else{
                    $status = 1;
                    $msg = 'Vous êtes connecté';
                    $_SESSION['id'] = encrypt($data['id_user']);
                } 
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
        $user = new User(decrypt($_SESSION['id']));
        if ($user->is_logged()) {
            echo json_encode(array("login" => $user->getLogin(), "nom" => $user->getNom(), "prenom" => $user->getPrenom()));
        }
    break;

    case 'account_link':
        $user = new User(decrypt($_SESSION['id']));
        $log = 1;
        $msg = '';
        $requete = "SELECT * FROM `users` WHERE `id_user` = '" .mysqli_real_escape_string($GLOBALS['Database'],decrypt($_SESSION['id'])) . "'";
        error_log($requete);
        $result = mysqli_query($GLOBALS['Database'], $requete)or die;
        if ($data = mysqli_fetch_array($result)){
            $log = 0;
            // error_log(json_encode($data));
            if($user->is_logged()){
                $log=1; 
                $msg= 'Bienvenue, '.$data['prenom'];
            } 
        }
        echo json_encode(array('log' => $log, 'msg'=> $msg));
    break;

        
    case 'modification':
        $user = new User(decrypt($_SESSION['id']));
        $user->setNom($_POST['nom']);
        $user->setPrenom($_POST['prenom']);
        if(!strstr($_POST['login'], '@')){
            $status = 0;
        }
        else{
            $user->setLogin($_POST['login']);
            $status = 1; 
        }
        if($user->is_logged() && $status != 0){
            $user->update();
            $status = 1;
            $msg= 'Information modifiée avec succès';    
        }else{
            $status = 0;
            $msg= "Format d'E-mail invalide";
        }
        echo json_encode(array('status' => $status,'msg'=> $msg, 'nom'=> $user->getNom(), 'prenom'=>$user->getPrenom(), 'login'=>$user->getLogin()));
    break;

    case 'deleteAccount':
        $requete= "DELETE FROM `users` where `id_user` = '".decrypt($_SESSION['id'])."' ";
        if(mysqli_query($GLOBALS['Database'], $requete)){      
        $status = 1;
        session_destroy();
        $msg= 'Compte supprimé';	     
        }
        echo json_encode(array('msg' => $msg, 'status'=> $status));
    break;

    case 'reset_password': 
        if($_POST['newPassword'] != $_POST['newPassword2']){
            $status = 0;
            $msg = "Les mots de passe sont différents";
        }else{
            $status = 1;
            $user = new User (decrypt($_POST['user_id']));
            $user->setPassword($_POST['newPassword']);
            $user->update();
            $_SESSION['id'] = $_POST['user_id'];
            $msg = "Mot de passe mis à jour";
        } 
        echo json_encode(array('status' => $status, 'msg'=> $msg));
    break;

    case 'forgetPassword':
        $demandeLogin = '<form class="grid grid justify-items-center mx-auto" action="javascript:password_recovery();">
                        <h1>Renseignez votre login: </h1>
                        <label for="mail" class="sr-only">Email address</label>
                        <input
                        id="recoveryLogin"
                        name="mail"
                        type="text"
                        class="appearance-none  rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                        placeholder= "Entrez l\'adresse mail"/>
                        <div><button
                        type="submit"
                        value="passRecov"
                        class="group mt-2 relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-3xl text-white bg-gradient-to-r from-slate-400 to-neutral-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        </span> Demander un nouveau mot de passe</button></div>
                        </form>';               
        echo json_encode($demandeLogin);
    break;

    case 'passwordRecovery':
        $msg = '';
        $login = $_POST['login'];
        $requete = "SELECT * FROM `users` WHERE `login` = '".mysqli_real_escape_string($GLOBALS['Database'],$login) . "'";
        $result = mysqli_query($GLOBALS['Database'], $requete)or die;        
        if ($data = mysqli_fetch_array($result)){
            $status = 1;
            $crypt = bin2hex(random_bytes(18));;
            $idUser = $data['id_user'];
            $requete = "INSERT INTO `requetes` (`id_user`, `hash_user`) VALUES ('". mysqli_real_escape_string($GLOBALS['Database'],$idUser) ."','". mysqli_real_escape_string($GLOBALS['Database'],$crypt)."')";
            mysqli_query($GLOBALS['Database'], $requete) or die;
            $msg = "<a class='underline text-blue-600' href='change_password.php?token=".$crypt."'>Voici votre lien de réinitialisation</a>";
        }else{
            $status = 0;
            $msg = "Utilisateur inconnu";
        }
        echo json_encode(array('status' => $status, 'msg'=> $msg));
    break;

    case 'modifyPassword':
        $msg = '';
        $status = '';
        $requete = "SELECT * FROM `users` WHERE `login` = '".mysqli_real_escape_string($GLOBALS['Database'],$_POST['login']) . "'";
        $result = mysqli_query($GLOBALS['Database'], $requete)or die;
        if ($data = mysqli_fetch_array($result)){
            // utilisateur connu
            $idUser = $data['id_user'];
            $nomUser = $data['nom'];
            $prenomUser = $data['prenom'];
            $loginUser = $_POST['login'];
            $requete = "SELECT * FROM `requetes` WHERE `id_user` = '".mysqli_real_escape_string($GLOBALS['Database'],$idUser) . "'";
            $result = mysqli_query($GLOBALS['Database'], $requete)or die;
            error_log($requete);
            if ($data = mysqli_fetch_array($result)){
                $crypt = $data['hash_user'];
                $validiteHash = $data['validite'];
                if ($validiteHash == 1){
                    $status = 0;
                    $msg = 'Lien expiré, veuillez refaire une demande';
                }else if ($validiteHash == 0 && $crypt === $_POST['token']){
                    if($_POST['passwd1'] != $_POST['passwd2']){
                        $status = 1;
                        $msg = 'Les mots de passe ne correspondent pas';
                    }else{
                        $user = new User($idUser);
                        $user->setNom($nomUser);
                        $user->setPrenom($prenomUser);
                        $user->setPassword($_POST['passwd1']);
                        $user->setLogin($loginUser);
                        $user->update();
                        $status = 3;
                    }
                }
            }
        }else{
            $status = 4;
            $msg = 'utilisateur inconnu';
        }
        echo json_encode(array('status' => $status, 'msg'=> $msg));
    break;

    
    
    default :
  echo json_encode(1) ;
  break;
    
}








































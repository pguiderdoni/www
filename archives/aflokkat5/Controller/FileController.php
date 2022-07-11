<?php
require_once("../Entity/Database.php");
require_once("../Entity/User.php");
require_once("../Entity/HTML.php");
require_once("../Entity/Commun.php");
session_start();

$db = new Database();
        
$GLOBALS['database'] = $db->mysqlConnexion();




switch($_POST['request'])
{
 case 'encode':


	$login = explode("#", decrypt($_SESSION['auth']))[0];

  $user_data = User::getUserByLogin($login);

  $user= new User($user_data["id"]);

  $fullpath = "C:/wamp64/www/aflokkat5/document/".$_POST['name'].".pdf";

  error_log($fullpath);

  $content = file_get_contents($fullpath);

  $encrypted = encryptFile($content,$user->getHash());

  file_put_contents($fullpath, $encrypted);

	echo json_encode(1);

  break;

  case 'decode':

  $login = explode("#", decrypt($_SESSION['auth']))[0];

  $user_data = User::getUserByLogin($login);

  $user= new User($user_data["id"]);

  $fullpath = "C:/wamp64/www/aflokkat5/document/".$_POST['name'].".pdf";

  $content = file_get_contents($fullpath);

  $encrypted = decryptFile($content,$user->getHash());

  file_put_contents($fullpath, $encrypted);

  echo json_encode(2);

  break;

}
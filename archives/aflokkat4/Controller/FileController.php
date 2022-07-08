<?php
require_once("../Entity/Database.php");
require_once("../Entity/User.php");
require_once("../Entity/HTML.php");
require_once("../Entity/Commun.php");
session_start();

$db = new Database();
        
$GLOBALS['database'] = $db->mysqlConnexion();


// $_POST['request'] = 'decode';

// $_POST['name'] = "Dupont";



switch($_POST['request']){

  case 'encode':
    
	

  break;




  case 'decode':

  break;

}
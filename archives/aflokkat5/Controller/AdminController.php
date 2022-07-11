<?php
require_once("../Entity/Database.php");
require_once("../Entity/User.php");
require_once("../Entity/HTML.php");
require_once("../Entity/Commun.php");
session_start();

$db = new Database();
        
$GLOBALS['database'] = $db->mysqlConnexion();

 // $_POST['request'] = 'connect';

// $_POST['data'] = json_encode(array("pseudo" => 'test555', "email" => 'b@b.fr',"passwd" => '123'));

// $_POST['request'] = 'connect';

// $_POST['user'] = "1";

// $_POST['sms'] = "4782";

// $_POST['password'] = "456";

// $_POST['mail'] = "c@c.fr";

// $_POST['password'] = "123";

switch($_POST['request'])
{
 case 'pages':

	$html = 0;

	if(isset($_SESSION['auth'])){

		$data = explode("#", decrypt($_SESSION['auth']));
		
		if(date("Y-m-d H:i:s") < $data[1]){

			$login = explode("#", decrypt($_SESSION['auth']))[0];

			$user = User::getUserByLogin($login);

			$html = HTML::displayPage($user);

		}
	}

	

	echo json_encode($html);

  break;

  
}
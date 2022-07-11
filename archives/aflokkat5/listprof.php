
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<?php
require_once("Entity/Commun.php");
require_once("Entity/Database.php");
require_once("Entity/User.php");
require_once("Entity/HTML.php");
require_once("Entity/Commun.php");

session_start();

$db = new Database();
        
$GLOBALS['database'] = $db->mysqlConnexion();

$access = false;
if(isset($_SESSION['auth'])){

	$data = explode("#", decrypt($_SESSION['auth']));
	if(date("Y-m-d H:i:s") > $data[1]){

		header('Location: /aflokkat5');

	}else{

		$user_data = User::getUserByLogin($data[0]);

		$user= new User($user_data["id"]);

		if($user->getType() == "student"){

			$access = true;

		}


	}
}else{

	header('Location: /aflokkat5');
}

if(!$access){

	echo "<h1>Forbidden !</h1>";

}else{

	echo "<h1>Liste des professeurs !</h1>";


}
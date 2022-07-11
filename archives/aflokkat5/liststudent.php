
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

		if($user->getType() == "prof"){

			$access = true;

		}


	}
}else{

	header('Location: /aflokkat5');
}

if(!$access){

	echo "<h1>Forbidden !</h1>";

}else{
?>
	<h1>Liste des étudiants !</h1>
		<table>
		<tr>
			<td>Doe</td>
			<td>
				<button onclick='visu("doe");'>Voir</button>
				<button onclick='encoder("doe");'>Chiffrer</button>
				<button onclick='decoder("doe");'>Déchiffrer</button>
			</td>
		</tr>
		<tr></tr>
		</table>
<script>
function visu(name){
	window.open('/aflokkat5/document/'+name+'.pdf', '_blank');
	//window.location.href = "/aflokkat5/document/"+name+".pdf";
}

function encoder(name){

	$.ajax({
		url: '/aflokkat5/Controller/FileController.php',
		dataType: 'json',
		type: 'POST',
		data: {
			request: 'encode',
			name: name,
			
		},
		success: function(response) {

			alert("encodage ok!");

		},
		error: function() {
			alert("Error !");
		}
	});
}

function decoder(name){

	$.ajax({
		url: '/aflokkat5/Controller/FileController.php',
		dataType: 'json',
		type: 'POST',
		data: {
			request: 'decode',
			name: name,
			
		},
		success: function(response) {

			alert("decodage ok!");

		},
		error: function() {
			alert("Error !");
		}
	});
}
</script>
<?php
}
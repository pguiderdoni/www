
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<?php
require_once("Entity/Commun.php");
session_start();

if(isset($_SESSION['auth'])){

	$data = explode("#", decrypt($_SESSION['auth']));
	if(date("Y-m-d H:i:s") > $data[1]){

		header('Location: /aflokkat4');

	}
}else{

	header('Location: /aflokkat4');
}
?>

<h1>Bienvenue ! </h1>
<br><br>

<div id="pages"></div>

<script>

$(document).ready(function() {

	displayPages();

});

function displayPages(){

	$.ajax({
		url: '/aflokkat4/Controller/AdminController.php',
		dataType: 'json',
		type: 'POST',
		data: {
			request: 'pages',
			
		},
		success: function(response) {

			if(response == 0){

				window.location.href = "/aflokkat4";

			}else{

				$("#pages").html(response);

			}

		},
		error: function() {
			alert("Error !");
		}
	});
}

</script>
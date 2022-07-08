
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<?php
require_once("Entity/Commun.php");
require_once("Entity/Database.php");
require_once("Entity/User.php");
require_once("Entity/HTML.php");
require_once("Entity/Commun.php");

?>
	<h1>Liste des étudiants !</h1>
		<table>
		<tr>
			<td>Dupont</td>
			<td>
				<button onclick='visu("dupont");'>Voir</button>
				<button onclick='encoder("dupont");'>Chiffrer</button>
				<button onclick='decoder("dupont");'>Déchiffrer</button>
			</td>
		</tr>
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
	window.location.assign('document/'+name+'.pdf');
}

function encoder(name){
	nom = name;
  $.ajax({
    url: "FileController.php",
    dataType: "JSON",
    type: "POST",
    data: {
      request: "encode",
	  fileName: nom;
    },
    success: function (response) {
      if (!response) {
        window.location.assign("");
      }
    },
  });
}



function decoder(name){


}
</script>

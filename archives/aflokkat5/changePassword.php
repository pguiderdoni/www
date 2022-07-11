
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="/aflokkat5/bootstrap/js/bootstrap.min.js"></script>

<link href="/aflokkat5/bootstrap/css/bootstrap.min.css" rel="stylesheet">


<center>
	<div class="main">

		<form action="javascript:modifyPass();">

			<label> Email</label>
			<input type="email" id="email" class="fied"/><br><br>
			<label> Mot de passe </label>
			<input type="password" id="passwd" class="fied"/><br><br><br>
			<input type="submit" class="btn btn-success" value="Connexion"/>

		</form>

	</div>
</center>

<script>

function $_GET(param) {
	var vars = {};
	window.location.href.replace( location.hash, '' ).replace( 
		/[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
		function( m, key, value ) { // callback
			vars[key] = value !== undefined ? value : '';
		}
	);

	if ( param ) {
		return vars[param] ? vars[param] : null;	
	}
	return vars;
}

function modifyPass(){

	var token = "";

	if ($_GET('token') != null) {

		var token = $_GET('token');

	}

    $.ajax({
		url: '/aflokkat5/Controller/LoginController.php',
		dataType: 'json',
		type: 'POST',
		data: {
			request: 'modify_password',
			mail: $("#email").val(),
            password: $("#passwd").val(),
			token: token,
		},
		success: function(response) {

            if (response == 1) {

				alert("Mot de passe changé");

			} else if(response == 2){

				alert("Liens expiré");
			}else{

				alert("Email inconnue");
			}

		},
		error: function() {
			alert("Error !");
		}
	});
}

</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="/aflokkat5/bootstrap/js/bootstrap.min.js"></script>

<link href="/aflokkat5/bootstrap/css/bootstrap.min.css" rel="stylesheet">


<center>
	<img src="/aflokkat5/aflokkat.jpg">

	<form action="javascript:register();">

		<label> Utilisateur</label>
		<input type="text" id="pseudo" class="field"/><br><br>
		<label> Email</label>
		<input type="email" id="email" class="field"/><br><br>
		<label> Mot de passe </label>
		<input type="password" id="passwd" class="field" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,12}$"/><br><br>
		<label> Type d'utilisateur </label>
		<select id="type" class="field">
			<option value="prof">Prof</option>
			<option value="student">Etudiant</option>
		</select><br><br><br>
		<input type="submit" class="btn btn-success" value="S'inscrire"/>

	</form>
</center>


<script>


function register(){

	data = {};

	$(".field").each(function(index) {
			
		data[$(this).attr('id')] = $(this).val();
		
	});

	$.ajax({
		url: '/aflokkat5/Controller/LoginController.php',
		dataType: 'json',
		type: 'POST',
		data: {
			request: 'register',
			data: JSON.stringify(data),
		},
		success: function(response) {

            if (response == 1) {

				window.location.href = "/aflokkat5";

			} else {

				alert("Identifiant ou email existant");

			}

		},
		error: function() {
			alert("Error");
		}
	});
    }
</script>
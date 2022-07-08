
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



<form action="javascript:register();">

	<label> Utilisateur</label>
	<input type="text" id="pseudo" class="field"/>
	<label> Email</label>
	<input type="email" id="email" class="field"/>
	<label> Mot de passe </label>
	<input type="password" id="passwd" class="field" />
	<label> Type d'utilisateur </label>
	<select id="type" class="field">
		<option value="prof">Prof</option>
		<option value="student">Etudiant</option>
	</select>
	<input type="submit" value="S'inscrire"/>

</form>


<script>


function register(){

	data = {};

	$(".field").each(function(index) {
			
		data[$(this).attr('id')] = $(this).val();
		
	});

	$.ajax({
		url: '/aflokkat4/Controller/LoginController.php',
		dataType: 'json',
		type: 'POST',
		data: {
			request: 'register',
			data: JSON.stringify(data),
		},
		success: function(response) {

            if (response == 1) {

				window.location.href = "/aflokkat4";

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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="/aflokkat5/bootstrap/js/bootstrap.min.js"></script>

<link href="/aflokkat5/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<center>
	<div class="main">

		<img src="/aflokkat5/aflokkat.jpg">

		<form action="javascript:connect();">

			<label> Email</label>
			<input type="email" id="email" class="fied"/><br><br>
			<label> Mot de passe </label>
			<input type="password" id="passwd" class="fied"/><br><br><br>
			<input type="submit" class="btn btn-success" value="Connexion"/>

		</form>
		<button onclick="forgetPassword();" class="btn btn-warning"> Mot de passe oublié </button>
		<a href="/aflokkat5/createAccount.php"><button class="btn btn-primary"> Créer un compte </button></a>

	</div>
</center>

<script>

function connect(){

    $.ajax({
		url: '/aflokkat5/Controller/LoginController.php',
		dataType: 'json',
		type: 'POST',
		data: {
			request: 'connect',
			mail: $("#email").val(),
            password: $("#passwd").val(),
		},
		success: function(response) {

            if (response['error'] == 1) {

				alert(response['msg']);

			} else {

				$(".main").html(response['msg']);
			}

		},
		error: function() {
			alert("Error !");
		}
	});
}

function changePassword(){

    $.ajax({
		url: '/aflokkat5/Controller/LoginController.php',
		dataType: 'json',
		type: 'POST',
		data: {
			request: 'change_password',
			user: $("#user").val(),
            password: $("#new_password").val(),
		},
		success: function(response) {
            
			$(".main").html(response);

		},
		error: function() {
			alert("Error !");
		}
	});
}


function secondAuth(){

    $.ajax({
		url: '/aflokkat5/Controller/LoginController.php',
		dataType: 'json',
		type: 'POST',
		data: {
			request: 'second_auth',
			user: $("#user").val(),
            sms: $("#sms").val(),
		},
		success: function(response) {
			
            if (response['error'] == 1) {

				alert("Code faux ou expiré");

			} else {

				window.location.href = "/aflokkat5/admin.php";

			}

		},
		error: function() {
			alert("Error !");
		}
	});
}
function forgetPassword(){

	$.ajax({
		url: '/aflokkat5/Controller/LoginController.php',
		dataType: 'json',
		type: 'POST',
		data: {
			request: 'forget_password',
		},
		success: function(response) {
			
			$(".main").html(response);

		},
		error: function() {
			alert("Error !");
		}
	});
}


function sendMail(){

	$.ajax({
	url: '/aflokkat5/Controller/LoginController.php',
	dataType: 'json',
	type: 'POST',
	data: {
		request: 'send_mail',
		email_send: $("#email_send").val(),
	},
	success: function(response) {

		if(response[0]){

			$(".main").html(response[1]);

		}else{

			alert("email inconnu");

		}

	},
	error: function() {
		alert("Error !");
	}
});
}

</script>
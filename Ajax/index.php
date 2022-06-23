<?php session_start();
?> 
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="iziToast.css">
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://kit.fontawesome.com/a1b11d373d.js"
      crossorigin="anonymous"></script>
<script src="iziToast.js" type="text/javascript"></script>


<body class="bg-slate-100">
<div class="container grid justify-items-center mx-auto">
	<form action="javascript:connect();" class="grid justify-items-center w-80 mt-8 space-y-6" method="POST">
	<div class="rounded-3xl shadow-sm -space-y-px">
		<div>
			<label for="nom" class="sr-only">Utilisateur (login)</label>
			<input
			id="login"
			name="nom"
			type="text"
			required
			class="appearance-none rounded-t-xl relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
			placeholder="nom"/>
		</div>
		<div>
			<label for="password" class="sr-only">Password</label>
			<input
			id="passwd"
			name="password1"
			type="password"
			required
			class="appearance-none rounded-b-xl relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
			placeholder="Mot de passe"/>
		</div>
	<!-- <div>
		<label for="password" class="sr-only">Password</label>
		<input
		id="password2"
		name="password2"
		type="password"
		required
		class="appearance-none rounded-none relative block w-full px-3 py-2 rounded-b-md border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
		placeholder="Confirmer Mot de passe"/>
	</div> -->
	</div>
		<div>
			<button
				type="submit"
				value="connexion"
				class="w-48 group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-3xl text-white bg-gradient-to-r from-slate-400 to-neutral-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
				<span class="absolute left-0 inset-y-0 flex items-center pl-3">
				<!-- Heroicon name: solid/lock-closed -->
				<svg
					class="h-5 w-5 text-yellow-500 group-hover:text-indigo-400"
					xmlns="http://www.w3.org/2000/svg"
					viewBox="0 0 20 20"
					fill="currentColor"
					aria-hidden="true">
					<path
					fill-rule="evenodd"
					d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
					clip-rule="evenodd"/>
				</svg>
				</span>
				Se Connecter
			</button>
		</div>
	</div>
</form>
</body>


<script>
function connect(){
	var log = $("#login").val();
	var pass = $("#passwd").val();
    $.ajax({
		url: 'connect.php',
		dataType: 'JSON',
		type: 'POST',
		data: {
			'request': 'connexion',
			'login': log,
			'password': pass
		},

		success: function(response) {
			if(response["status"] == 0){
				iziToast.show({
				backgroundColor: 'red',
				closeOnClick: true,
				messageColor: 'white',
				transitionIn: 'fadeInUp',
    			transitionOut: 'fadeInOut',
				position: 'center',
   				message: response["msg"],
				});
			}
			
			else if (response["status"] == 1){
				window.location.assign('compte.php');
			}	      
		},
		error: function() {	
			console.log("Erreur");		
		}
	});
}
</script>
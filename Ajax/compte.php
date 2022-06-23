<?php session_start();
print_r($_SESSION);
?> 
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="iziToast.css">
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://kit.fontawesome.com/a1b11d373d.js"
      crossorigin="anonymous"></script>
<script src="iziToast.js" type="text/javascript"></script>


<div class="bg-white opacity-80 flex-col shadow overflow-hidden sm:rounded-lg">
  <form action="javascript:disconnect();">
<div class="px-4 py-5 sm:px-6">
    <h3 class="text-lg leading-6 font-medium font-extrabold text-gray-900">
      Mes informations personnelles:
    </h3>
  </div>
  <div class="border-t border-gray-200">
    <dl>
      <div
        class="flex bg-gray-50 px-2 py-5 grid grid-cols-3 gap-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
      >
        <dt class="text-sm font-medium text-black pt-2 font-bold">Nom :</dt>
        <dd class="mt-1 text-sm text-black pt-1">  </dd>
      </div>
      <hr />
      <div
        class="bg-white flex px-2 py-5 grid grid-cols-3 gap-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
      >
        <dt class="text-sm pt-2 font-medium text-black font-bold">
          Adresse E-mail:
        </dt>
        <dd class="text-sm pt-2 text-gray-900">  </dd>
      </div>
      <hr />
      <div
        class="flex flex-row bg-gray-50 px-2 py-5 grid grid-cols-3 gap-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
      >
        <div class="text-sm pt-2 font-medium text-black font-bold">
          Adresse:
        </div>
        <div class="mt-1 text-sm pt-1 text-gray-900">  </div>
      </div>
      <hr />
      <br />
      <div
        class="flex gap-1 sm:gap-5 bg-gray-50 px-3 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
      >
      <hr />
    </dl>
  </div>
  <button
				type="submit"
				value="deconnexion"
				class="w-48 group relative flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-3xl text-white bg-gradient-to-r from-slate-400 to-neutral-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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
				Se Deconnecter
			</button>
      </form>
</div>

<script>

$(document).ready(function() {
	login();
});

function login(){
    $.ajax({
		url: 'connect.php',
		dataType: 'JSON',
		type: 'POST',
		data: {
			'request': 'login',	
		},

		success: function(response) {
      if(response["status"] == 1){
        iziToast.show({
				backgroundColor: 'green',
				closeOnClick: true,
				messageColor: 'white',
				transitionIn: 'fadeInUp',
    		transitionOut: 'fadeInOut',
				position: 'center',
        message: response["msg"],
        });
      }else{
        // window.location.assign('index.php');
        iziToast.show({
				backgroundColor: 'red',
				closeOnClick: true,
				messageColor: 'white',
				transitionIn: 'fadeInUp',
    		transitionOut: 'fadeInOut',
				position: 'center',
        message: response["msg"],
        
      })
    }
    }
  });
}  

function disconnect(){
    $.ajax({
		url: 'connect.php',
		dataType: 'JSON',
		type: 'POST',
		data: {
			'request': 'logout',	
		},

		success: function(response) {
      if(!response){
        window.location.assign('index.php');
        
      }
    }
  });
}
</script>
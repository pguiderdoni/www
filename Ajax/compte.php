<?php session_start();
?> 
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="iziToast.css">
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://kit.fontawesome.com/a1b11d373d.js"
      crossorigin="anonymous"></script>
<script src="iziToast.js" type="text/javascript"></script>


<div class="bg-white opacity-80 flex-col shadow overflow-hidden sm:rounded-lg">
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
        <dd class="mt-1 text-sm text-black pt-1"> </dd>
      </div>
      <hr />
      <div
        class="bg-white flex px-2 py-5 grid grid-cols-3 gap-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
      >
        <dt class="text-sm pt-2 font-medium text-black font-bold">
          Adresse E-mail:
        </dt>
        <dd class="text-sm pt-2 text-gray-900"></dd>
      </div>
      <hr />
      <div
        class="flex flex-row bg-gray-50 px-2 py-5 grid grid-cols-3 gap-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
      >
        <div class="text-sm pt-2 font-medium text-black font-bold">
          Adresse:
        </div>
        <div class="mt-1 text-sm pt-1 text-gray-900"></div>
      </div>
      <hr />
      <br />
      <div
        class="flex gap-1 sm:gap-5 bg-gray-50 px-3 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
      >
      <hr />
    </dl>
  </div>
</div>

<script>

$(document).ready(function() {
	login();
});

function login(){
  console.log(1);
    $.ajax({
		url: 'connect.php',
		dataType: 'JSON',
		type: 'POST',
		data: {
			'request': 'login',	
		},

		success: function(response) {
      console.log(2);
      if($_SESSION['loggedUser']){
        console.log(3);
        iziToast.show({
				backgroundColor: 'green',
				closeOnClick: true,
				messageColor: 'white',
				transitionIn: 'fadeInUp',
    		transitionOut: 'fadeInOut',
				position: 'center',
   			message: response,
        });
      }else{
        console.log(4);
        iziToast.show({
				backgroundColor: 'red',
				closeOnClick: true,
				messageColor: 'white',
				transitionIn: 'fadeInUp',
    		transitionOut: 'fadeInOut',
				position: 'center',
   			message: response,
      })
      }
    }
  });
}  
</script>
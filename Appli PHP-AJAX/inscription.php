<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script
      src="https://kit.fontawesome.com/a1b11d373d.js"
      crossorigin="anonymous"></script>
      <link rel="stylesheet" href="iziToast.css">
      <script src="iziToast.js" type="text/javascript"></script>
      <script src="script.js" type="text/javascript"></script>

</head>
<body class="h-screen bg-no-repeat bg-cover" style="background-image: url(img/blancN.jpg) ;">
      <nav
        class="grid grid-cols-3 content-center h-14 bg-gradient-to-r from-slate-400 to-neutral-900">
            <div
              class="col-span-3 sm:col-span-2 flex justify-around sm:justify-start sm:gap-5 pt-8 sm:pt-1 sm:pl-4">
              <a id="navLink" href="login.php"
                class="text-white md:text-lg hover:text-red-600 hover:underline"
                >Connexion</a>
            </div>
            <div class="flex justify-end invisible sm:visible sm:pr-3 sm:gap-4">
              <div class="text-white sm:pt-1 sm:text-lg">
                <a
                id="logName"
                  data-bs-toggle="tooltip"
                  data-bs-placement="left"
                  title="connexion"
                  href="account.php"></a>
              </div>
              <img
                class="h-10 w-auto"
                src="img/ishi.png"
                alt="Workflow"/>
            </div>
      </nav>
<div class="flex justify-center mr-5 py-12 px-4 sm:px-6 lg:px-8">
    <div class="grid align max-w-md w-full space-y-8">
        <div class="grid">
          <h2 class="mt-2 text-center text-3xl font-extrabold text-black">
            Créez votre compte
          </h2>
        </div>
        <form class="justify-self-center space-y-4 w-80" action="javascript:signup();" method="POST">
          <div class="rounded-md shadow-sm -space-y-px">
              <div>
                <label for="mail" class="sr-only">Email address</label>
                <input
                  id="login"
                  name="mail"
                  type="text"
                  class="appearance-none  rounded-t-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                  placeholder="Adresse Email - vous servira d'identifant"/>
              </div>
              <div>
                <label for="familyName" class="sr-only">Nom</label>
                <input
                  id="familyName"
                  name="familyName"
                  type="text"
                  class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                  placeholder="Nom"/>
              </div>
              <div>
                <label for="surname" class="sr-only">Prénom</label>
                <input
                  id="surname"
                  name="surname"
                  type="text"
                  class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                  placeholder="Prénom"/>
              </div>     
              <div>
                <label for="psswd1" class="sr-only">Password</label>
                <input
                  id="password1"
                  name="psswd1"
                  type="password"
                  required
                  class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                  placeholder="Mot de passe"/>
              </div>
              <div>
                <label for="psswd2" class="sr-only">Password</label>
                <input
                  id="password2"
                  name="psswd2"
                  type="password"
                  required
                  class="appearance-none rounded-b-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                  placeholder="Mot de passe - Vérification"/>
              </div>
            <div class="grid">
              <button
                type="submit"
                value="signup"
                class="group mt-2 relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-xl text-white bg-gradient-to-r from-slate-400 to-neutral-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <span class="absolute left-0 inset-y-0 flex items-center pl-3">
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
                Créer mon Compte
              </button>
              
            </div>
            <a href="login.php"><span class="flex justify-center mt-5 underline hover:text-red-600">Déjà inscrit? Connectez-vous</span></a>
        </form>
        
    </div>
    
  </div>
  
  </div>
  
  
</body>
</html>
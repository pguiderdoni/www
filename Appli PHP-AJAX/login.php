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
        class="flex grid grid-cols-3 content-center rounded-3xl h-14 bg-gradient-to-r from-slate-400 to-neutral-900">
            <div
              class="col-span-3 sm:col-span-2 flex justify-around sm:justify-start sm:gap-5 pt-8 sm:pt-1 sm:pl-4">
              <a id="navLink" href="inscription.php"
                class="text-white text-base md:text-lg hover:text-red-600 hover:underline"
                >Inscription</a>
            </div>
            <div class="flex justify-end invisible sm:visible sm:pr-3 sm:gap-4">
              <div class="text-white text-base sm:pt-1 sm:text-lg">
                <a
                id="logName"
                  data-bs-toggle="tooltip"
                  data-bs-placement="left"
                  title="Vers mes notes"
                  href="account.php"></a>
              </div>
              <img
                class="h-10 w-auto"
                src="img/ishi.png"
                alt="Workflow"/>
            </div>
      </nav>
    <span id="champLogin" class="flex items-center ml-5">
      <div id="loginForm" class="grid justify-items-center mx-auto">
          <h2 class="self-end mb-2 font-bold">Déjà inscrit? connectez-vous:<h2>
          <form action="javascript:login();" class="grid justify-items-center w-80 space-y-6" method="POST">
            <div class="rounded-3xl shadow-sm -space-y-px">
                <div>
                  <label for="nom" class="sr-only">Login (Email)</label>
                  <input
                  id="userLogin"
                  name="login"
                  type="text"
                  required
                  class="appearance-none rounded-t-xl relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                  placeholder="Identifiant (E-mail)"/>
                </div>
              <div>
              <label for="password" class="sr-only">Password</label>
              <input
              id="userPassword"
              name="password1"
              type="password"
              required
              class="appearance-none rounded-b-xl relative w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
              placeholder="Mot de passe"/>
              </div>
                </div>
                  <div>
                  <button
                    type="submit"
                    value="connexion"
                    class="w-48 group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-3xl text-white bg-gradient-to-r from-slate-400 to-neutral-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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
                    Se Connecter
                  </button>
              </div>
            <a id="forgetPassword" class="underline" href="#">Mot de passe oublié?</a>
          </form>
        </div>
    </span>
  <div class="flex items-center ">
  <div id="resetForm" class="hidden grid justify-items-center mx-auto">
    <h2 class="flex text-center self-end mb-2 font-bold ">Mot de passe expiré, <br> veuillez en choisir un nouveau:<h2>
      <form action="javascript:reset_Password();" class="grid justify-items-center w-80 space-y-6" method="POST">
      <input id="id_user" type="hidden" value="" >
      <div class="rounded-3xl shadow-sm -space-y-px">
          <div>
              <label for="nom" class="sr-only">Mot de passe</label>
              <input
              id="resetPassword"
              name="reset_password1"
              type="password"
              required
              class="appearance-none rounded-t-xl relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
              placeholder="Nouveau mot de passe"/>
          </div>
          <div>
            <label for="password" class="sr-only">Mot de passe</label>
              <input
              id="resetPassword2"
              name="reset_password2"
              type="password"
              required
              class="appearance-none rounded-b-xl relative w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
              placeholder="Confirmer mot de passe"/>
          </div>
      </div>
          <div>
              <button
                    type="submit"
                    value="connexion"
                    class="w-48 group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-3xl text-white bg-gradient-to-r from-slate-400 to-neutral-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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
                    Mettre à jour
              </button>
            </div>
        </form>
      </div>
    </div>
</div>
</body>
</html>
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
    <script src="https://kit.fontawesome.com/a1b11d373d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="iziToast.css">
    <script src="iziToast.js" type="text/javascript"></script>
    <script src="script.js" type="text/javascript"></script>
</head>
<body class="h-screen bg-no-repeat bg-cover" style="background-image: url(img/blancN.jpg) ;">
<nav
        class="flex grid grid-cols-3 content-center rounded-3xl h-14 bg-gradient-to-r from-slate-400 to-neutral-900">
        <div
          class="col-span-3 sm:col-span-2 flex justify-around sm:justify-start sm:gap-5 pt-8 sm:pt-1 sm:pl-4">
          <a id="navLink2" href="inscription.php"
            class="text-white text-base md:text-lg hover:text-red-600 hover:underline"
            >Mon Compte</a>
        </div>
        <div class="flex justify-end invisible sm:visible sm:pr-3 sm:gap-4">
          <div class="text-white text-base sm:pt-1 sm:text-lg">
            <a data-bs-toggle="tooltip"
              data-bs-placement="left"
              title="Vers mes notes"
              href="/account"></a>
          </div>
          <span class="text-white self-center" id="welcomeMsg"></span>
          <img
            class="h-10 w-auto"
            src="img/ishi.png"
            alt="Workflow"/>
        </div>
      </nav>
      <?php print_r($_SESSION);?>
<div class="grid opacity-80 shadow sm:rounded-lg">
  <form class="justify-self-center border-black" >
      <div class=" border border-slate-600 rounded-t-xl px-4 py-5 sm:px-6">
        <h3 class="text-lg leading-6 font-medium font-extrabold text-gray-900">
          Mes informations personnelles:
        </h3>
      </div>
    <div class="border border-slate-400 rounded-b-xl overflow-hidden ">
      <dl>
        <div
          class="flex bg-gray-50 px-2 py-5 grid grid-cols-3 gap-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-black pt-2 font-bold">Nom :</dt>
          <dd id="accNom" class="mt-1 text-sm text-black pt-1"> </dd>
        </div>
        <hr />
          <div
            class="flex flex-row px-2 py-5 grid grid-cols-3 gap-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <div class="text-sm pt-2 font-medium text-black font-bold">
                Prénom:
              </div>
          <div id="accPrenom" class="mt-1 text-sm pt-1 text-gray-900">  </div>
        </div>
        <hr />
          <div
            class="bg-gray-50 flex px-2 py-5 grid grid-cols-3 gap-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm pt-2 font-medium text-black font-bold">
              Adresse E-mail:
            </dt>
            <dd id="accMail" class="text-sm pt-2 text-gray-900">  </dd>
          </div>
        </dl>
      </div>
        <br>
          <div class="grid">
            <button button
                id="logout"
                type="submit"
                value="deconnexion"
                class="w-48 group relative justify-self-center flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-3xl text-white bg-gradient-to-r from-slate-400 to-neutral-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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
                Se Deconnecter
            </button>
          </div>
    </form>
  </div>
</body>
</html>
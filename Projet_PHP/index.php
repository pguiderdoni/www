<?php session_start();
print_r($_SESSION);
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script
      src="https://kit.fontawesome.com/a1b11d373d.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="style.css" />
    <title>Document</title>
</head>
<body>
  <?php include 'C:\wamp64\www\Projet_PHP\function.php'; ?>

<?php
$passwordUser = "ppp";
$loginUser = 'pierre@gmail.com';

$log = 'log.txt';
$login = '';
$nom = '';
$password = '';

if (isset( $_POST['login']) && isset($_POST['password1']) && isset($_POST['password2'])) {
  if ($_POST['password1'] == $_POST['password2']){
    if ($_POST['password1'] == $passwordUser && $_POST['login'] = $loginUser){
      $password = $_POST['password1'];
      $login = $_POST['login'];
      $nom = $_POST['nom'];
      $_SESSION['nom'] = $nom;
      $_SESSION['login'] = $login;
      file_put_contents($log, 'ID: '.$_POST['login'].' '.'le'.date(" d-m-Y H:i:s")." Connexion réussie \n", FILE_APPEND);
    } 
    else{
        echo 'Informations incorrectes!';
        file_put_contents($log, 'ID: '.$_POST['login'].' '.'le'.date(" d-m-Y H:i:s")." Connexion échouée: Mots de passe incorrect. \n", FILE_APPEND);         
    } 
  }else{
    echo 'Les mots de passe ne correspondent pas !';
    file_put_contents($log, 'ID: '.$_POST['login'].' '.'le'.date(" d-m-Y H:i:s")." Connexion échouée: Mots de passe différents. \n" , FILE_APPEND);
  }
}
if (isset($_GET['disconnect']) && $_GET['disconnect'] == 0){
    session_destroy();
    header('Location: /Projet_PHP/index.php');
    exit();

}

?>


<?php 
 if(!is_logged()){ ?>
  <div class="mx-96 my-60 flex-auto items-center w-60">
    <form action="index.php" class="mt-8 space-y-6" method="POST">
<div class="rounded-md shadow-sm -space-y-px">
  <div>
    <label for="login" class="sr-only">login (Email)</label>
    <input
      id="login"
      name="login"
      type="email"
      required
      class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
      placeholder="login"/>
  </div>
  <div>
    <label for="nom" class="sr-only">Nom</label>
    <input
      id="nom"
      name="nom"
      type="text"
      required
      class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
      placeholder="nom"/>
  </div>
  <div>
    <label for="password" class="sr-only">Password</label>
    <input
      id="password1"
      name="password1"
      type="password"
      required
      class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
      placeholder="Mot de passe"/>
  </div>
  <div>
    <label for="password" class="sr-only">Password</label>
    <input
      id="password2"
      name="password2"
      type="password"
      required
      class="appearance-none rounded-none relative block w-full px-3 py-2 rounded-b-md border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
      placeholder="Confirmer Mot de passe"/>
  </div>
</div>
<div>
  <button
    type="submit"
    class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-gradient-to-r from-slate-400 to-neutral-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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
</form>
</div>
<?php }else{
    header('Location: /Projet_PHP/compte.php'); 
    echo $_SESSION['login'];  
} ?>

</body>
</html>

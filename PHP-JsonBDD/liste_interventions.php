<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="script.js" type="text/javascript"></script>

</head>
<body class="h-screen bg-no-repeat bg-cover">
<nav
        class="flex grid grid-cols-3 content-center rounded-3xl h-14 bg-gradient-to-r from-slate-400 to-neutral-900">
        <div
          class="col-span-3 sm:col-span-2 flex justify-around sm:justify-start sm:gap-5 pt-8 sm:pt-1 sm:pl-4">
          <a id="navLink2" href="base.php"
            class="text-white text-base md:text-lg hover:text-red-600 hover:underline"
            >Enregistrer un véhicule</a>
        </div>
        <div class="flex justify-end invisible sm:visible sm:pr-3 sm:gap-4">
          <div class="text-white text-base sm:pt-1 sm:text-lg">
            <a data-bs-toggle="tooltip"
              data-bs-placement="left"
              title="Vers mes notes"
              href="/account"></a>
          </div>
        </div>
      </nav>
     
      </table>
      <div class="flex justify-center mr-5 py-12 px-4 sm:px-6 lg:px-8">
    <div class="grid align max-w-md w-full space-y-8">
        <div class="grid">
          <h2 class="mt-2 text-center text-3xl font-extrabold text-black">
            Véhicules en attente
          </h2>
        </div>
        <table class="border-separate border border-slate-500 rounded">
        <thead>
          <tr>
            <th class="border border-slate-600">Marque</th>
            <th class="border border-slate-600">Modele</th>
            <th class="border border-slate-600">Immatriculation</th>
          </tr>
        </thead>
        <tbody id="interventionTab">
          
         
        </tbody>
        
    </div>
  </div>
<script>
  $(document).ready(function () {
  interventionLoad();
});
</script>
</body>
</html>
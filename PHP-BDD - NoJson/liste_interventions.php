<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface technicien</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.tailgrids.com/tailgrids-fallback.css" />
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="script.js" type="text/javascript"></script>
</head>
<body class="h-screen bg-no-repeat bg-cover">
      <nav
        class="flex grid grid-cols-3 content-center h-14 bg-gradient-to-r from-slate-400 to-neutral-900">
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
      <div class="flex justify-start ml-80 mr-5 py-4 px-4 sm:px-6 lg:px-8">
         <div class="grid align max-w-md w-full space-y-4">
            <div class="grid">
               <h2 class="mt-2 text-center text-3xl font-extrabold text-black">
                  Véhicules en attente
               </h2>
               <button onclick="interventionLoad();" class="px-2 w-20 flex self-center align-center border border-transparent text-sm font-medium rounded-full text-white bg-gradient-to-r from-slate-400 to-neutral-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Actualiser
            </button>
            </div>
               <section class="bg-white ">
                  <div class="container">
                     <div class="flex flex-wrap -mx-4">
                        <div class="w-full px-0">
                           <div class="max-w-full overflow-x-auto">
                              <table class="table-auto w-full">
                                 <thead>
                                    <tr class="bg-gradient-to-r from-slate-400 to-neutral-900 text-center">
                                    <th class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-4 px-3 lg:px-4 border-r border-white">
                                          N° d'intervention
                                       </th>
                                       <th class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-4 px-3 lg:px-4 border-r border-white">
                                          Marque
                                       </th>
                                       <th class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-4 px-3 lg:px-4 border-r border-white">
                                          Modèle
                                       </th>
                                       <th class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-4 px-3 lg:px-4 border-l border-white">
                                          Immatriculation
                                       </th>
                                       <th class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-4 px-3 lg:px-4 border-l border-white">
                                          
                                       </th>
                                    </tr>
                                 </thead>
                                 <tbody id="interventionTab">
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </section>
            </div>
      </div>
</body>
</html>
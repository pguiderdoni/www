<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enregistrement intervention</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.tailgrids.com/tailgrids-fallback.css"/>
    <!-- <script src="../js/newVehicule.js" type="text/javascript"></script>
    <script src="../js/loadData.js" type="text/javascript"></script>
    <script src="../js/submits.js" type="text/javascript"></script> -->
</head>
<body class="h-screen bg-no-repeat bg-cover" style="background-image: url(img/blancN.jpg) ;">
<nav class="grid grid-cols-3 content-center h-14 bg-gradient-to-r from-slate-400 to-neutral-900">
    <div
      class="col-span-3 sm:col-span-2 flex justify-around sm:justify-start sm:gap-5 pt-8 sm:pt-1 sm:pl-4">
      <a id="navLink2" href="base.php"
        class="text-white text-base md:text-lg hover:text-red-600 hover:underline"
        >Engregistrer un véhicule</a><a id="navLink3" href="facturation.php"
        class="text-white text-base md:text-lg hover:text-red-600 hover:underline"
        >Facturation</a><a id="navLink4" href="liste_interventions.php"
        class="text-white text-base md:text-lg hover:text-red-600 hover:underline"
        >Interventions en cours</a>
    </div>
</nav>
<div class="flex container mx-auto px-4">
<div class="grid align mt-5 mr-5 ml-40 py-4 px-2 sm:px-6 lg:px-2">
      <div class="grid">
        <h2 class="text-center text-3xl font-extrabold text-black mb-5">
          Nouveau Véhicule
        </h2>
      </div>
      <form class="justify-self-center space-y-4 w-80" action="javascript:newVehicule();" method="POST">    
          <div class="relative inline-flex mb-5">
            <span>Selectionez la marque du véhicule:</span>
            <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero"/></svg>
            <select id="carBrand" onchange="modelesLoad();" class="border border-gray-300 rounded-xl text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none">
          </select>
          </div> 
          <div class="relative inline-flex mb-5">
            <span class="mr-4">Selectionez le modèle: </span>
            <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero"/></svg>
            <select id="carModel"  class="justify-self-end border border-gray-300 rounded-xl text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none">
              <option>Modèle</option>
            </select>
          </div> 
            <div class="mb-5">
              <label for="carImmat" class="sr-only">Immatriculation</label>
              <input
                id="carImmat"
                name="carImmat"
                type="text"
                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                placeholder="Immatriculation"/>
            </div>   
            <div class="mb-5">
              <label for="carPower" class="sr-only">Puissance</label>
              <input
                id="carPower"
                name="carPower"
                type="text"
                required
                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                placeholder="Puissance"/>
            </div>
          <div class="grid">
            <button
              type="submit"
              value="signup"
              class="group mt-2 relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-3xl text-white bg-gradient-to-r from-slate-400 to-neutral-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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
              Enregistrer le véhicule
            </button>
          </div>
      </form> 
  </div>
  <div class="flex justify-center ml-32 mt-5 mr-5 py-4 px-4 sm:px-6 lg:px-8">
         <div class="grid align-start max-w-md w-full space-y-2">
            <div class="grid">
               <h2 class="mt-2 text-center text-3xl font-extrabold text-black">
                  Véhicules terminés
               </h2>
               <button onclick="finishLoad();" class="px-2 w-20 flex self-center border border-transparent text-sm font-medium rounded-full text-white bg-gradient-to-r from-slate-400 to-neutral-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Actualiser
            </button>
            </div>
            <section class="bg-white">
                  <div class="container">
                     <div class="flex flex-wrap -mx-4">
                        <div class="w-full px-0">
                           <div class="max-w-full overflow-x-auto">
                              <table class="table-auto w-full">
                                 <thead>
                                    <tr class="bg-gradient-to-r from-slate-400 to-neutral-900 text-center">
                                    <th class="w-1/6 min-w-[120px] text-sm font-semibold text-white py-3 lg:py-3 px-1 lg:px-2 border-r border-white">
                                       </th>
                                      <th class="w-1/6 min-w-[120px] text-sm font-semibold text-white py-3 lg:py-3 px-1 lg:px-2 border-r border-white">
                                          N° d'intervention
                                       </th>
                                       <th class="w-1/6 min-w-[120px] text-sm font-semibold text-white py-3 lg:py-3 px-1 lg:px-2 border-r border-white">
                                          Marque
                                       </th>
                                       <th class="w-1/6 min-w-[120px] text-sm font-semibold text-white py-3 lg:py-3 px-1 lg:px-2 border-r border-white">
                                          Modèle
                                       </th>
                                       <th class="w-1/6 min-w-[120px] text-sm font-semibold text-white py-3 lg:py-3 px-1 lg:px-2 border-r border-white">
                                          Immatriculation
                                       </th>
                                       <th class="w-1/6 min-w-[120px] text-sm font-semibold text-white py-3 lg:py-3 px-1 lg:px-2 border-r border-white"> 
                                       </th>
                                    </tr>
                                 </thead>
                                 <tbody id="finishTab">
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </section>
           </div>
        </div>
      </div>
</div>
</body>
</html>
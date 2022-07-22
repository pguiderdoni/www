function newVehicule() {
  var marque = $("#carBrand").val();
  var modele = $("#carModel").val();
  var immatriculation = $("#carImmat").val();
  var puissance = $("#carPower").val();
  $.ajax({
    url: "../controller/newVehicule.php",
    dataType: "JSON",
    type: "POST",
    data: {
      request: "new_vehicule",
      marque_vehicule: marque,
      modele_vehicule: modele,
      immat_vehicule: immatriculation,
      puissance_vehicule: puissance,
    },
    success: function (response) {
      if (response["status"] == 1) {
        alert(response["msg"]);
        window.location = window.location;
      } else {
        alert("Erreur 808");
      }
    },
    error: function () {
      console.log("Erreur");
    },
  });
}

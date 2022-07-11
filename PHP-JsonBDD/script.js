function newVehicule() {
  var marque = $("#carBrand").val();
  var modele = $("#carModel").val();
  var immatriculation = $("#carImmat").val();
  var puissance = $("#carPower").val();

  $.ajax({
    url: "connect.php",
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
      } else {
        alert("Erreur 808");
      }
    },
    error: function () {
      console.log("Erreur");
    },
  });
}

function interventionLoad() {
  $.ajax({
    url: "connect.php",
    dataType: "JSON",
    type: "POST",
    data: {
      request: "interventionLoad",
    },
    success: function (response) {
      if (response["status"] == 1) {
        $("#listeInterv").html(response["msg"]);
      } else if (response["status"] == 2) {
        alert(response["msg"]);
      }
    },
    error: function () {
      console.log("Erreur");
    },
  });
}

$(document).ready(function () {
  interventionLoad();
});

function newVehicule() {
  var marque = $("#carBrand").val();
  var modele = $("#carModel").val();
  var immatriculation = $("#carImmat").val();
  var newsLetter = $("#checkNews").is(":checked");
  $.ajax({
    url: "../controller/newVehicule.php",
    dataType: "JSON",
    type: "POST",
    data: {
      request: "new_vehicule",
      marque_vehicule: marque,
      modele_vehicule: modele,
      immat_vehicule: immatriculation,
      news_letter: newsLetter,
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

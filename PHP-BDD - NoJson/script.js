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
        $("#interventionTab").html(response["msg"]);
      } else if (response["status"] == 2) {
        alert(response["msg"]);
      }
    },
    error: function () {
      console.log("Erreur");
    },
  });
}

function interventionOk() {
  var token = "";
  if ($_GET("token") != null) {
  var token = $_GET("token");
  console.log(token);
  }
  $.ajax({
    url: "connect.php",
    dataType: "JSON",
    type: "POST",
    data: {
      request: "interventionFinie",
      idInter: token,
    },
    success: function (response) {
      console.log(response);
      if (response["status"] == 1) {
        alert(response["msg"]);
      }
    },
    error: function () {
      console.log("Erreur");
    },
  });
}
function finishLoad() {
  $.ajax({
    url: "connect.php",
    dataType: "JSON",
    type: "POST",
    data: {
      request: "finishLoad",
    },
    success: function (response) {
      if (response["status"] == 1) {
        $("#finishTab").html(response["msg"]);
      } else if (response["status"] == 2) {
        alert(response["msg"]);
      }
    },
    error: function () {
      console.log("Erreur");
    },
  });
}

function marquesLoad() {
  $.ajax({
    url: "connect.php",
    dataType: "JSON",
    type: "POST",
    data: {
      request: "marquesLoad",
    },
    success: function (response) {
      if (response["status"] == 1) {
        $("#carBrand").html(response["msg"]);
      } else if (response["status"] == 2) {
        alert(0);
      }
    },
    error: function () {
      console.log("Erreur");
    },
  });
}
function modelesLoad() {
  var brand = $("#carBrand").val();
  console.log(brand);
  $.ajax({
    url: "connect.php",
    dataType: "JSON",
    type: "POST",
    data: {
      request: "modelesLoad",
      marque: brand,
    },
    success: function (response) {
      console.log(response);
      if (response["status"] == 1) {
        $("#carModel").html(response["msg"]);
      } else if (response["status"] == 2) {
        alert(0);
      }
    },
    error: function () {
      console.log("Erreur");
    },
  });
}




function $_GET(param) {
  var vars = {};
  window.location.href.replace(location.hash, "").replace(
    /[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
    function (m, key, value) {
      // callback
      vars[key] = value !== undefined ? value : "";
    }
  );

  if (param) {
    return vars[param] ? vars[param] : null;
  }
  return vars;
}

$(document).ready(function () {
  interventionLoad();
  marquesLoad();
  finishLoad();
});

function finishLoad() {
  $.ajax({
    url: "../controller/loadDatas.php",
    dataType: "JSON",
    type: "POST",
    data: {
      request: "finishLoad",
    },
    success: function (response) {
      if (response["status"] == 1) {
        $("#finishTab").html(response["html"]);
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
    url: "../controller/loadDatas.php",
    dataType: "JSON",
    type: "POST",
    data: {
      request: "marquesLoad",
    },
    success: function (response) {
      if (response["status"] == 1) {
        $("#carBrand").html(response["msg"]);
      } else if (response["status"] == 2) {
        alert("Erreur");
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
    url: "../controller/loadDatas.php",
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
function facturesLoad() {
  $.ajax({
    url: "../controller/loadDatas.php",
    dataType: "JSON",
    type: "POST",
    data: {
      request: "facture_load",
    },
    success: function (response) {
      if (response["status"] == 2) {
        $("#facturesTab").html(response["html"]);
      } else {
        alert(0);
      }
    },
    error: function () {
      console.log("Erreur");
    },
  });
}
function interventionLoad() {
  $.ajax({
    url: "../controller/loadDatas.php",
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
$(document).ready(function () {
  facturesLoad();
  interventionLoad();
  marquesLoad();
  finishLoad();
});

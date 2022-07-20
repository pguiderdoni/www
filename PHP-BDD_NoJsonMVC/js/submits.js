function interventionOk(data) {
  var id_int = data;
  $.ajax({
    url: "controller/submits.php",
    dataType: "JSON",
    type: "POST",
    data: {
      request: "interventionFinie",
      idInter: id_int,
    },
    success: function (response) {
      if (response["status"] == 1) {
        console.log(response["msg"]);
      }
    },
    error: function () {
      console.log("Erreur");
    },
  });
}
function interventionNonOk(data) {
  var id_int = data;
  $.ajax({
    url: "controller/submits.php",
    dataType: "JSON",
    type: "POST",
    data: {
      request: "interventionNonFinie",
      idInterv: id_int,
    },
    success: function (response) {
      if (response["status"] == 1) {
        console.log(response["msg"]);
      }
    },
    error: function () {
      console.log("Erreur");
    },
  });
}
function facturation(data) {
  var id_int = data;
  $.ajax({
    url: "controller/submits.php",
    dataType: "JSON",
    type: "POST",
    data: {
      request: "factureOk",
      idInterv: id_int,
    },
    success: function (response) {
      console.log(response);
      if (response["status"] == 1) {
        console.log(response["msg"]);
      }
    },
    error: function () {
      console.log("Erreur");
    },
  });
}

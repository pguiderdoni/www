function disconnect() {
  $.ajax({
    url: "connect.php",
    dataType: "JSON",
    type: "POST",
    data: {
      request: "logout",
    },

    success: function (response) {
      if (!response) {
        window.location.assign("inscription.php");
      }
    },
  });
}

function signup() {
  var log = $("#login").val();
  var nom = $("#familyName").val();
  var prenom = $("#surname").val();
  var pass1 = $("#password1").val();
  var pass2 = $("#password2").val();
  $.ajax({
    url: "connect.php",
    dataType: "JSON",
    type: "POST",
    data: {
      request: "signup",
      login: log,
      nom: nom,
      prenom: prenom,
      password1: pass1,
      password2: pass2,
    },

    success: function (response) {
      if (response["status"] == 0) {
        iziToast.show({
          backgroundColor: 'red',
          closeOnClick: true,
          messageColor: 'white',
          transitionIn: 'fadeInUp',
          transitionOut: 'fadeInOut',
          position: 'topCenter',
          message: response["msg"],
        });
      } else if (response["status"] == 1) {
        window.location.assign("account.php");
      }
    },
    error: function () {
      console.log("Erreur");
    },
  });
}

function login() {
  $.ajax({
    url: "connect.php",
    dataType: "JSON",
    type: "POST",
    data: {
      request: "login",
    },

    success: function (response) {
      if (response["status"] == 1) {
        iziToast.show({
          backgroundColor: "green",
          closeOnClick: true,
          messageColor: "white",
          transitionIn: "fadeInUp",
          transitionOut: "fadeInOut",
          position: "topCenter",
          message: response["msg"],
        });
      } else {
        iziToast.show({
          backgroundColor: "red",
          closeOnClick: true,
          messageColor: "white",
          transitionIn: "fadeInUp",
          transitionOut: "fadeInOut",
          position: "topCenter",
          message: response["msg"],
        });
      }
    },
  });
}

function accountLoad() {
  $.ajax({
    url: "connect.php",
    dataType: "JSON",
    type: "POST",
    data: {
      request: "account",
    },

    success: function (response) {
      $("#accMail").html(response["login"]);
      $("#accPrenom").html(response["prenom"]);
      $("#accNom").html(response["nom"]);
    },
  });
}

$(document).ready(function () {
  accountLoad();
  $("#logout").on("click", disconnect);
});

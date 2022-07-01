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
          backgroundColor: "red",
          closeOnClick: true,
          messageColor: "white",
          transitionIn: "fadeInUp",
          transitionOut: "fadeInOut",
          position: "topCenter",
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
  var userLog = $("#userLogin").val();
  var userPassword = $("#userPassword").val();
  $.ajax({
    url: "connect.php",
    dataType: "JSON",
    type: "POST",
    data: {
      request: "login",
      login: userLog,
      password: userPassword,
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
        window.location.assign("account.php");
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

function accountLink() {
  console.log(1);
  $.ajax({
    url: "connect.php",
    dataType: "JSON",
    type: "POST",
    data: {
      request: "account_link",
    },
    success: function (response) {
      console.log(2);
      if (response["log"] == 1) {
        $("#navLink").html("Mon Compte");
        $("#navLink").attr("href", "account.php");
        $("#navLink2").html("Mon Compte");
        $("#navLink2").attr("href", "account.php");
        $("#welcomeMsg").html(response["msg"]);
      } else if (response["log"] == 0) {
        $("#navLink").html("Inscription / Connexion");
        $("#navLink").attr("href", "inscription.php");
        $("#navLink2").html("Inscription / Connexion");
        $("#navLink2").attr("href", "inscription.php");
      }
    },
  });
}

$(document).ready(function () {
  accountLink();
  accountLoad();
  $("#logout").on("click", disconnect);
});

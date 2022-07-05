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

function modification() {
  var userName = $("#accNom").val();
  var userPname = $("#accPrenom").val();
  var userMail = $("#accMail").val();
  $.ajax({
    url: "connect.php",
    dataType: "JSON",
    type: "POST",
    data: {
      request: "modification",
      nom: userName,
      prenom: userPname,
      login: userMail,
    },
    success: function (response) {
      if (response) {
        iziToast.show({
          backgroundColor: "green",
          closeOnClick: true,
          messageColor: "white",
          transitionIn: "fadeInUp",
          transitionOut: "fadeInOut",
          position: "topCenter",
          message: response["msg"],
        });
        $("#accNom").val(response["nom"]);
        $("#accPrenom").val(response["prenom"]);
        $("#accLogin").val(response["login"]);
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

function deleteAccount() {
  iziToast.question({
    timeout: 20000,
    close: false,
    overlay: true,
    displayMode: "once",
    id: "question",
    zindex: 999,
    title: "Hey",
    message: "Are you sure about that?",
    position: "center",
    buttons: [
      [
        "<button><b>YES</b></button>",
        function (instance, toast) {
          instance.hide({ transitionOut: "fadeOut" }, toast, "button");
        },
        true,
      ],
      [
        "<button>NO</button>",
        function (instance, toast) {
          instance.hide({ transitionOut: "fadeOut" }, toast, "button");
        },
      ],
    ],
    onClosing: function (instance, toast, closedBy) {
      console.info("Closing | closedBy: " + closedBy);
    },
    onClosed: function (instance, toast, closedBy) {
      console.info("Closed | closedBy: " + closedBy);
    },
  });
  $.ajax({
    url: "connect.php",
    dataType: "JSON",
    type: "POST",
    data: {
      request: "deleteAccount",
    },
    success: function (response) {
      if (!response) {
        window.location.assign("inscription.php");
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
      $("#accMail").val(response["login"]);
      $("#accPrenom").val(response["prenom"]);
      $("#accNom").val(response["nom"]);
    },
  });
}

function accountLink() {
  $.ajax({
    url: "connect.php",
    dataType: "JSON",
    type: "POST",
    data: {
      request: "account_link",
    },
    success: function (response) {
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
  $("#deleteAccount").on("click", deleteAccount);
  $("#upDate").on("click", modification);
  $("#logout").on("click", disconnect);
});

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
      } else if (response["status"] == 0) {
        iziToast.show({
          backgroundColor: "red",
          closeOnClick: true,
          messageColor: "white",
          transitionIn: "fadeInUp",
          transitionOut: "fadeInOut",
          position: "topCenter",
          message: response["msg"],
        });
      } else if (response["status"] == 2) {
        $("#id_user").val(response["msg"]);
        $("#loginForm").addClass("hidden");
        $("#resetForm").removeClass("hidden");
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
        $("#accNom").val(response["nom"]);
        $("#accPrenom").val(response["prenom"]);
        $("#accLogin").val(response["login"]);
      } else if (response["status"] == 0) {
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
    message: "confirmez-vous la suppression?",
    position: "center",
    buttons: [
      [
        "<button><b>Oui</b></button>",
        function (instance, toast) {
          instance.hide({ transitionOut: "fadeOut" }, toast, "button");
          $.ajax({
            url: "connect.php",
            dataType: "JSON",
            type: "POST",
            data: {
              request: "deleteAccount",
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
                window.location.assign("inscription.php");
              }
            },
          });
        },
        true,
      ],
      [
        "<button>Non</button>",
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

// function accountLoad() {
//   $.ajax({
//     url: "connect.php",
//     dataType: "JSON",
//     type: "POST",
//     data: {
//       request: "account",
//     },
//     success: function (response) {
//       $("#accMail").val(response["login"]);
//       $("#accPrenom").val(response["prenom"]);
//       $("#accNom").val(response["nom"]);
//     },
//   });
// }

// function accountLink() {
//   $.ajax({
//     url: "connect.php",
//     dataType: "JSON",
//     type: "POST",
//     data: {
//       request: "account_link",
//     },
//     success: function (response) {
//       if (response["log"] == 0) {
//         return 1;
//       } else if (response["log"] == 1) {
//         $("#welcomeMsg").html(response["msg"]);
//       }
//     },
//   });
// }

function reset_Password() {
  var passwd1 = $("#resetPassword").val();
  var passwd2 = $("#resetPassword2").val();
  var idUser = $("#id_user").val();
  console.log(passwd1);
  console.log(passwd2);
  $.ajax({
    url: "connect.php",
    dataType: "JSON",
    type: "POST",
    data: {
      request: "reset_password",
      newPassword: passwd1,
      newPassword2: passwd2,
      user_id: idUser,
    },
    success: function (response) {
      if (response["status"] == 1) {
        window.location.assign("account.php");
      } else if (response["status"] == 0) {
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
function forget_password() {
  $.ajax({
    url: "connect.php",
    dataType: "JSON",
    type: "POST",
    data: {
      request: "forgetPassword",
    },
    success: function (response) {
      $("#loginForm").html(response);
    },
  });
}
function password_recovery() {
  var recovery_login = $("#recoveryLogin").val();
  $.ajax({
    url: "connect.php",
    dataType: "JSON",
    type: "POST",
    data: {
      request: "passwordRecovery",
      login: recovery_login,
    },
    success: function (response) {
      if (response["status"] == 1) {
        $("#loginForm").html(response["msg"]);
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

function new_password_recovery() {
  var token = "";
  if ($_GET("token") != null) {
    var token = $_GET("token");
  }
  var userLogin = $("#changeUserLogin").val();
  var passwordChange1 = $("#newPassword1").val();
  var passwordChange2 = $("#newPassword2").val();
  $.ajax({
    url: "connect.php",
    dataType: "JSON",
    type: "POST",
    data: {
      request: "modifyPassword",
      login: userLogin,
      passwd1: passwordChange1,
      passwd2: passwordChange2,
      token: token,
    },
    success: function (response) {
      if (response["status"] == 3) {
        iziToast.show({
          theme: "dark",
          icon: "icon-person",
          title:
            "Votre mot de passe à été modifié, retour à la page de connexion! ",
          message: "",
          position: "center", // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
          buttons: [
            [
              "<button>Ok</button>",
              function (instance, toast) {
                window.location.assign("login.php");
              },
              true,
            ], // true to focus
          ],
          onOpening: function (instance, toast) {
            console.info("callback abriu!");
          },
          onClosing: function (instance, toast, closedBy) {
            console.info("closedBy: " + closedBy); // tells if it was closed by 'drag' or 'button'
          },
        });
      } else if (response["status"] != 3) {
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
  // accountLink();
  // accountLoad();
  $("#forgetPassword").on("click", forget_password);
  $("#deleteAccount").on("click", deleteAccount);
  $("#upDate").on("click", modification);
  $("#logout").on("click", disconnect);
});

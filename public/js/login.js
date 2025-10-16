$(document).ready(function () {
  $("#loginForm").on("submit", function (event) {
    event.preventDefault();
    var username = $("#username").val();
    var password = $("#password").val();
    if (username == "Admin" && password == "Admin") {
      window.location.href = "/register/index.html";
    } else {
      alert("Password salah!");
      $("#username").val("")
      $("#password").val("")
    }
  });
});

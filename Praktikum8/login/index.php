<?php
session_start();
if (isset($_SESSION['admin'])) {
  if ($_SESSION['admin'] === true) {
    header("Location: ../admin/");
    exit();
  }
  header("Location: ../user/");
  exit();
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container">
    <div class="fs-3 text-center">
      Login
    </div>
    <form class="login-form" action="database/login.php" method="post">
      <div class="username">
        <input id="uname" class="usernameinput" name="username" type="text" required>
        <label class="placeholder1" for="uname">Username</label>
      </div>
      <div class="nrp">
        <input id="nrp" class="nrpinput" name="nrp" type="text" required>
        <label class="placeholder2" for="nrp">NRP</label>
      </div>
      <input class="login" type="submit" value="Login">
      <p class="error"></p>
      <div class="register">Don't have an account? <span onclick="window.location.href='../register'">Let's
          register</span></div>
    </form>
  </div>

  <script src="script.js" defer></script>
</body>

</html>
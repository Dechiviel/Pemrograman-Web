<?php
if (isset($_SESSION['admin'])) {
  if ($_SESSION['admin'] === true) {
    header("Location: admin/");
    exit();
  }
  header("Location: user/");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container">
    <div class="fs-3 text-center">Make an Account</div>
    <form method="POST" action="database/register.php" onsubmit="register(event)">
      <div class="username">
        <input id="uname" class="usernameinput" name="username" type="text" required>
        <label class="placeholder1" for="uname">Username</label>
      </div>
      <div class="nrp">
        <input id="nrp" class="nrpinput" name="nrp" type="nrp" required>
        <label class="placeholder2" for="nrp">NRP</label>
      </div>
      <input class="form-check-input" type="checkbox" name="admin"value="true" id="checkDefault" style="border: 1px solid black;">
      <label class="form-check-label mb-3" for="checkDefault">
        Is Admin
      </label>
      <input class="login" type="submit" value="Register">
      <p class="error"></p>
      <div class="register">Already have an account? <span onclick="window.location.href='../login'">Let's log in</span></div>
    </form>
  </div>
  <script src="script.js"></script>
</body>

</html>
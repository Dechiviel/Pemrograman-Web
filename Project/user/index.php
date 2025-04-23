<?php
session_start();
echo $_SESSION['username'] . "<br>";
echo $_SESSION['nrp'] . "<br>";
echo $_SESSION['admin'] . "<br>";
if (isset($_SESSION['admin'])) {
  if ($_SESSION['admin'] === true) {
    header("Location: ../admin/");
    exit();
  }
} else {
  header("Location: ../login/");
  exit();
}

if (isset($_POST['logout'])) {
  session_destroy();
  header("Location: ../login/");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="" method="post">
    <input type="submit" name="logout" value="Logout">
  </form>
</body>
</html>
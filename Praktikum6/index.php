<?php
session_start();

if (isset($_SESSION['username'])) {
  header("Location: form.php");
}
else {
  header("Location: login.php");
}
?>
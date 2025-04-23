<?php
session_start();

if (isset($_SESSION['admin'])) {
  if ($_SESSION['admin'] === true) {
    header("Location: admin/");
    exit();
  }
  header("Location: user/");
  exit();
} else {
  header("Location: login/");
  exit();
}
?>
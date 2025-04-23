<?php
session_start();
header('Content-Type: application/json');
require_once 'config.php';

try {
  $len = strlen("Faris Akmal Soehartono");
  $regex = "/^[A-D]{2}2\d{3}\W{2}" . $len . "$/";

  if (isset($_POST['username']) && isset($_POST['nrp'])) {
    $username = $_POST['username'];
    $nrp = $_POST['nrp'];
    $admin = isset($_POST['admin']) && $_POST['admin'] === 'true';

    if (preg_match($regex, $nrp)) {
      $sql = "INSERT INTO user_info VALUES (:username, :nrp, :is_admin)";
      $stmt = $pdo->prepare($sql);
      $stmt->bindParam(':username', $username);
      $stmt->bindParam(':nrp', $nrp);
      $stmt->bindParam(':is_admin', $admin, PDO::PARAM_BOOL);
      if ($stmt->execute()) {
        $_SESSION['username'] = $username;
        $_SESSION['nrp'] = $nrp;
        $_SESSION['admin'] = $admin;
        echo json_encode(array("success" => true, "message" => "Registration successful"));
        die();
      } else {
        throw new Exception("Failed to register user");
      }
    } else {
      throw new Exception("Invalid NRP format");
    }
  }
} catch (Exception $e) {
  echo json_encode(array("error" => $e->getMessage()));
  die();
}
?>
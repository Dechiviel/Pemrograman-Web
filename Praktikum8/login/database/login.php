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

    if (preg_match($regex, $nrp)) {
      $sql = "SELECT * FROM user_info WHERE username = :username AND nrp = :nrp";
      $stmt = $pdo->prepare($sql);
      $stmt->bindParam(':username', $username);
      $stmt->bindParam(':nrp', $nrp);
      $stmt->execute();
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      if ($result) {
        $_SESSION['username'] = $username;
        $_SESSION['nrp'] = $nrp;
        $_SESSION['admin'] = (bool) $result['is_admin'];
        echo json_encode(array("success" => true, "message" => "Login successful"));
        die();
      } 
      else {
        throw new Exception("Invalid credential");
      }
    } else {
      throw new Exception("Invalid NRP format");
    }
  }
} 
catch (Exception $e) {
  echo json_encode(array("error" => $e->getMessage()));
  die();
}
?>
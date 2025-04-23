<?php
try {
  $host = 'localhost';
  $db = 'Praktikum8';
  $user = 'postgres';
  $password = 'Tahubulat1';
  $dsn = "pgsql:host=$host;port=5432;dbname=$db;";
  $pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} 
catch (PDOException $e) {
  json_encode(array('error' => 'Failed connect to DB: ' . $e->getMessage()));
  die();
}
?>
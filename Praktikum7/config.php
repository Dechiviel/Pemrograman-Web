<?php
try {
  $host = 'localhost';
  $db = 'Praktikum7';
  $user = 'postgres';
  $password = '';
  $dsn = "pgsql:host=$host;port=5432;dbname=$db;";
  $pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} 
catch (PDOException $e) {
  die($e->getMessage());
}
?>
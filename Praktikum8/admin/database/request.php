<?php
header('Content-Type: application/json');
require_once 'config.php';


$sql = "SELECT * FROM book_base ORDER BY id_book ASC";
$stmt = $pdo->prepare($sql);

$stmt->execute();
$books = $stmt->fetchAll(PDO::FETCH_ASSOC);
if ($books) {
  echo json_encode($books);
} 
else {
  echo json_encode(array('message' => 'No data found'));
}
?>
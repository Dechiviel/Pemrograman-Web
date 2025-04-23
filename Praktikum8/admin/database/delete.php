<?php
require_once 'config.php';

$sql = "DELETE FROM book_base WHERE id_book = :id_book";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id_book', $_POST['id'], PDO::PARAM_INT);

if ($stmt->execute()) {
  echo json_encode(array('message' => 'Data deleted successfully'));
} 
else {
  echo json_encode(array('message' => 'Failed to delete data'));
}
?>
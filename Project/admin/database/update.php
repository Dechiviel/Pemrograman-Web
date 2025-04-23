<?php
require_once 'config.php';

$sql = "UPDATE book_base SET id_book = :id_book, title = :title, author = :author, publication_year = :publication_year WHERE id_book = :origin_id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':origin_id', $_POST['origin_id'], PDO::PARAM_INT);
$stmt->bindParam(':id_book', $_POST['id_book'], PDO::PARAM_INT);
$stmt->bindParam(':title', $_POST['title'], PDO::PARAM_STR);
$stmt->bindParam(':author', $_POST['author'], PDO::PARAM_STR);
$stmt->bindParam(':publication_year', $_POST['year'], PDO::PARAM_STR);
if ($stmt->execute()) {
  echo json_encode(array('message' => 'Data updated successfully'));
} 
else {
  echo json_encode(array('message' => 'Failed to update data'));
}
?>
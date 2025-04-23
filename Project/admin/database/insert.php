<?php
require_once 'config.php';

$id = !empty($_POST['id']) ? $_POST['id'] : null;
$title = !empty($_POST['title']) ? $_POST['title'] : null;
$author = !empty($_POST['author']) ? $_POST['author'] : null;
$year = !empty($_POST['year']) ? $_POST['year'] : null;

$sql = "INSERT INTO book_base VALUES (:id, :title, :author, :publication_year)";
$stmt = $pdo->prepare($sql);

$stmt->bindParam(':id', $id);
$stmt->bindParam(':title', $title);
$stmt->bindParam(':author', $author);
$stmt->bindParam(':publication_year', $year);

if ($stmt->execute()) {
  echo json_encode(array('message' => 'Data inserted successfully'));
} 
else {
  echo json_encode(array('message' => 'Failed to insert data'));
}
?>
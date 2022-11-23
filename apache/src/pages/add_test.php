<?php
require_once("../config/database.php");
$database = new Database();
$db = $database->getConnection();
$stmt = $db->prepare("INSERT INTO tests (title, discipline, author) VALUES (?, ?, ?)");
$res = $stmt->bind_param('ssi', $_POST['title'], $_POST['discipline'], $_POST['author']);
$stmt->execute();

header('Location: /pages/tests.php');
?>
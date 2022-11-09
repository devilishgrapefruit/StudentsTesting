<?php
require_once("../config/Database.php");
$database = new Database();
$db = $database->getConnection();
$stmt = $db->prepare("INSERT INTO users (login, password, email) VALUES (?, ?, ?)");
$res = $stmt->bind_param('sss', $_POST['login'], $_POST['password'], $_POST['email']);
$stmt->execute();

header('Location: /pages/users.php');
?>
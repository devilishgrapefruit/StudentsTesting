<?php
require_once("../config/Database.php");
$database = new Database();
$db = $database->getConnection();

$stmt = $db->prepare("DELETE FROM `users` WHERE `id`=?");
$res = $stmt->bind_param('i', $_GET['id']);
$stmt->execute();

header('Location: /pages/users.php');
?>

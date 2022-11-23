<?php
require_once("../config/database.php");
$database = new Database();
$db = $database->getConnection();

$stmt = $db->prepare("DELETE FROM `tests` WHERE `id`=?");
$res = $stmt->bind_param('i', $_GET['id']);
$stmt->execute();

header('Location: /pages/tests.php');
?>
<?php
require_once 'functions.php';
include "../config/Database.php";

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


$database = new Database();
$db = $database->getConnection();

$body = getBody();
$params = getParams();

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $res = $db->query("SELECT * FROM tests WHERE id = " . $id);
            if ($res == false) {
                header("HTTP/1.1 404 Not Found");
                http_response_code(404);
            }
            echo getJson($res);
        }
        else {
            $result = $db->query("SELECT * FROM tests");

            echo getJson($result);
        }
        break;
    case 'POST':
        $stmt = $db->prepare("INSERT INTO tests (title, discipline, author) VALUES (?, ?, ?)");
        $res = $stmt->bind_param('ssi', $body['title'], $body['discipline'], $body['author']);
        $stmt->execute();

        echo 1;
        break;
    case 'PUT':
        $stmt = $db->prepare("UPDATE tests SET title=?, discipline=?, author=? WHERE id=?");
        $res = $stmt->bind_param('ssii', $body['title'], $body['discipline'], $body['author'], $body['id']);
        $stmt->execute();

        break;
    case 'DELETE':
        $stmt = $db->prepare("DELETE FROM `tests` WHERE `id`=?");
        $res = $stmt->bind_param('i', $params['id']);
        $stmt->execute();

        echo 1;
        break;
    default:
        header("HTTP/1.1 404 Not Found");
        http_response_code(404);
        break;
}
?>

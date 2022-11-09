<html lang="ru">

<head>
    <title>Управление тестами</title>
</head>

<body>
<h1>Управление тестами</h1>

<h2>Тесты</h2>
<form action="/pages/add_test.php" method="post">
    <p>Название: <input type="text" name="title" /></p>
    <p>Дисциплина: <input type="text" name="discipline" /></p>
    <p>Автор: <input type="text" name="author" /></p>
    <p><input type="submit" /></p>
</form>
<?php
require_once("../config/Database.php");
$database = new Database();
$db = $database->getConnection();
$result = $db->query('SELECT * FROM tests');
echo "<ul>";
foreach ($result as $row) {
    echo "<li>";
    echo "<a href=\"/pages/delete_test.php?id={$row['id']}\">";
    echo "Удалить тест ↓";
    echo "</a><br>";

    echo "{$row['id']} {$row['title']} {$row['discipline']}</li>";
}
echo "</ul>";
?>
</body>

</html>


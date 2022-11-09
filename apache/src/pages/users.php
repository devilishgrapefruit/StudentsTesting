<html lang="ru">

<head>
    <title>Управление пользователями</title>
</head>

<body>
<h1>Управление пользователями</h1>

<h2>Пользователи</h2>
<form action="/pages/add_user.php" method="post">
    <p>Логин: <input type="text" name="login" /></p>
    <p>Пароль: <input type="password" name="password" /></p>
    <p>Почта: <input type="text" name="email" /></p>
    <p><input type="submit" /></p>
</form>
<?php
require_once("../config/Database.php");
$database = new Database();
$db = $database->getConnection();
$result = $db->query('SELECT * FROM users');
echo "<ul>";
foreach ($result as $row) {
    echo "<li>";
    echo "<a href=\"/pages/delete_user.php?id={$row['id']}\">";
    echo "Удалить пользователя ↓";
    echo "</a><br>";

    echo "{$row['id']} {$row['login']} {$row['email']}</li>";
}
echo "</ul>";
?>
</body>

</html>

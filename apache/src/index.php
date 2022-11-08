<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Меню</title>
</head>
<body>
<ol>
    <?php
    $mysqli = new mysqli('db', 'root', 'password', 'testsDB');
    $result = $mysqli->query("SELECT login FROM users");
    foreach ($result as $row){
        echo "<li>{$row['login']}</li>";
    }
    ?>
</ol>
<a href="index.html">На главную</a>
</body>
</html>
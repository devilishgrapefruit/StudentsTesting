<?php
require_once '../config/login.php';
require_once '../config/constants.php';
$dictionary = $dict[$_SESSION['language']];
?>
<html lang="<?php echo $_SESSION['language'] ?>">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="icon" href="http://localhost:27/favicon.ico" type="image/x-icon">
  <?php 
        if ($_SESSION['theme'] == THEME::$DARK) {
            echo '<link rel="stylesheet" type="text/css" href="http://localhost:27/dark-style.css">';
        }
        else if ($_SESSION['theme'] == THEME::$LIGHT){
            echo '<link rel="stylesheet" type="text/css" href="http://localhost:27/style.css">';
        }
    ?>
    <title><?php $dictionary->TESTS ?></title>
</head>
<body>
<header class="header">
   <img src="http://localhost:27/logo.png" class="logo">
   <h2 class="mytitle"><a class="home" href="http://localhost:27/index.html"><?php echo $dictionary->TESTINGSTUDENTS?></a></h2>
      <nav class="menu">
          <ul>
          <li class = "headmenu"><a  class="menua" href="profile.php"><?php echo $dictionary->PROFILE?></a></li>
          <li class = "headmenu"><a  class="menua" href="tests.php"><?php echo $dictionary->TESTS?></a></li>
          <li class = "headmenu"><a  class="menua" href="logout.php"><?php echo $dictionary->LOGOUT?></a></li>
          </ul>
      </nav>
</header>

<!-- <h2 class="h_settings"><?php $dictionary->TESTS ?></h2>
<form action="/pages/add_test.php" method="post">
    <p><?php $dictionary->TITLE ?>е: <input type="text" name="title" /></p>
    <p><?php $dictionary->$DISCIPLINE ?>: <input type="text" name="discipline" /></p>
    <p><?php $dictionary->AUTHOR ?>: <input type="text" name="author" /></p>
    <p><input type="submit" /></p>
</form> -->
<?php
// require_once("../config/database.php");
// $database = new Database();
// $db = $database->getConnection();
// $result = $db->query('SELECT * FROM tests');
// echo "<ul>";
// foreach ($result as $row) {
//     echo "<li>";
//     echo "<a href=\"/pages/delete_test.php?id={$row['id']}\">";
//     echo "Удалить тест ↓";
//     echo "</a><br>";

//     echo "{$row['id']} {$row['title']} {$row['discipline']}</li>";
// }
// echo "</ul>";

?>
<div class = "pdfcontainer" >
<div class = "pdf" >
<h2 class="h_settings">PDF</h2>
    <form class = "pdfform" enctype="multipart/form-data" action="../config/save_file.php" method="POST">
        <input type="hidden" name="MAX_FILE_SIZE" value="30000000000" />
        <div>
            <?php echo $dictionary->SEND_THIS_FILE ?>: 
            <label for="uploadbtn" class="uploadButton">
            <?php echo $dictionary->UPLOAD_FILE ?>
            </label>
            <div class="list-pdf"></div>
            <input 
                style="opacity: 0; z-index: -1;" 
                type="file" name="userfile" id="uploadbtn" 
                onchange='document.querySelector(".uploadButton + div").innerHTML = Array.from(this.files).map(f => f.name).join("<br />")' 
            />
        </div>
        <input class = "button_setting" type="submit" value="<?php echo $dictionary->SEND_FILE ?>" />
    </form>
</div>
<div class = "pdf" >
    <h2 class="h_settings" ><?php echo $dictionary->UPLOADING_FILES ?></h2>

    <?php
        $filenames = $redis->keys('*');
        echo "<ul>";
        foreach ($filenames as $filename) {
            echo "<li><a href=\"http://localhost:27/{$filename}\">{$filename}</a></li>";
        }
        echo "</ul>";
    ?>
    
    </div>
    </div>
</body>

</html>


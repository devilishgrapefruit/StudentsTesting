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
    <title><?php echo $dictionary->PROFILE?></title>
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
<?php
//require_once("../config/database.php");
//$database = new Database();
//$db = $database->getConnection();
//$result =  $db->query("SELECT * FROM users");
//foreach($result as $row){
//    if ($_SERVER['PHP_AUTH_USER'] == $row['login']) {
//        if ($row['role'] == 'ADMIN') {
//            echo 'Я учитель!';
//        } else if ($row['role'] == 'USER') {
//            echo 'Я ученик!';
//        } else {
//            echo 'Кто я?';
//        }
//    }
//}
//
?>
    <form class = "settings" action="../config/settings.php" method="post">
    <h2 class="h_settings"><?php echo $dictionary->USER . "\n " . $_SESSION['name'] ?></h2>
    <h2 class="h_settings"><?php echo $dictionary->SETTINGS ?></h2>
        <div class = "setting">
            <?php echo $dictionary->THEME ?>: <br>
            <label>
                <input type="radio" name="theme" 
                    <?php 
                        if ($_SESSION['theme'] == THEME::$LIGHT) {
                            echo "checked";
                        }
                    ?>
                    value="light"
                >
                <?php echo $dictionary->LIGHT ?>
            </label>
            <label>
                <input type="radio" name="theme" 
                    <?php 
                        if ($_SESSION['theme'] == THEME::$DARK) {
                            echo "checked";
                        }
                    ?>
                    value="dark"
                >
                <?php echo $dictionary->DARK ?>
            </label>
        </div>

        <div class = "setting">
            <?php echo $dictionary->LANGUAGE ?>: <br>
            <label>
                <input type="radio" name="language"
                    <?php 
                        if ($_SESSION['language'] == LANGUAGE::$RU) {
                            echo "checked";
                        }
                    ?>
                    value="ru"
                >
                <?php echo $dictionary->RUSSIAN ?>
            </label>
            <label>
                <input type="radio" name="language"
                    <?php 
                        if ($_SESSION['language'] == LANGUAGE::$EN) {
                            echo "checked";
                        }
                    ?>
                    value="en"
                >
                <?php echo $dictionary->ENGLISH ?>
            </label>
        </div>

        <div class = "setting">
            <label>
                <?php echo $dictionary->NAME ?>:
                <input class="input_name" type="text" name="name" >
            </label>
                    </div>
        <div class = "setting">
            <button class = "button_setting" type="submit"> <?php $dictionary->UPDATE ?> </button>
                </div>
    </form>
        </div>
        <footer> 2022 <?php echo $dictionary->STUDENTSTESTINGSERVICE ?></footer>
    
    </body>
</html>

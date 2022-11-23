<?php
require_once 'config/login.php';
require_once 'config/constants.php';
$dictionary = $dict[$_SESSION['language']];
?>
<html lang="<?php echo $_SESSION['language'] ?>">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $dictionary->TESTINGSTUDENTS ?></title>
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
          <li class = "headmenu"><a  class="menua" href="/pages/profile.php"><?php echo $dictionary->PROFILE?></a></li>
          <li class = "headmenu"><a  class="menua" href="/pages/tests.php"><?php echo $dictionary->TESTS?></a></li>
          <li class = "headmenu"><a  class="menua" href="/pages/logout.php"><?php echo $dictionary->LOGOUT?></a></li>
          </ul>
      </nav>
</header>
<footer> 2022 <?php echo $dictionary->STUDENTSTESTINGSERVICE?></footer>
</body>
</html>

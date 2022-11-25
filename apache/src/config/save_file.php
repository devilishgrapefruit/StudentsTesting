<?php 
    require_once 'login.php';
    require_once 'constants.php';
    $dictionary = $dict[$_SESSION['language']];

    if (substr($_FILES['userfile']['name'], -4) == ".pdf"){
        $file_data_redis = json_encode($file_data);
        $redis->set($_FILES['userfile']['name'], file_get_contents($_FILES['userfile']['tmp_name']));
        header('Location: ../pages/tests.php');
    }
    else {
        echo '<pre>';
        echo $dictionary->PDF;
        echo '</pre>';
    }
?>

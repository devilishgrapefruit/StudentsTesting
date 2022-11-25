<?php
require_once '../config/login.php';
require '../vendor/autoload.php';
require 'getFixtures.php';

use CpChart\Data;
use CpChart\Image;
use CpChart\Chart\Stock;

require_once 'drawImage.php';


function getEl($array){
    $el = min($array);
    return (int)$el - random_int(0, 8);
}

function getEl2($array){
    $el = max($array);
    return (int)$el + random_int(0, 15);
}

$points2018 = [];
$points2019 = [];
$points2020 = [];
$points2021 = [];
$points2022 = [];

$mydata = new Data(); 
$count = 0;
foreach ($fixtures->getObjects() as $fixture) {
    array_push($points2018, $fixture->students_groups2018);
    array_push($points2019, $fixture->students_groups2019);
    array_push($points2020, $fixture->students_groups2020);
    array_push($points2021, $fixture->students_groups2021);
    array_push($points2022, $fixture->students_groups2022);
}
$mydata->addPoints(array(getEl($points2018), getEl($points2019), getEl($points2020), getEl($points2021), getEl($points2022)), "Open");
$mydata->addPoints(array(max($points2018), max($points2019), max($points2020), max($points2021), max($points2022)), "Min");
$mydata->addPoints(array(min($points2018), min($points2019), min($points2020), min($points2021), min($points2022)), "Max");
$mydata->addPoints(array(getEl2($points2018), getEl2($points2019), getEl2($points2020), getEl2($points2021), getEl2($points2022)), "Close");
$mydata->addPoints(array("2018","2019","2020","2021","2022"),"years");
$mydata->setAbscissa("years");
$myPicture = new Image(700,250,$mydata);
$myPicture->Antialias = FALSE;
$myPicture->drawRectangle(0,0,699,249,array("R"=>246,"G"=>24,"B"=>255));
$myPicture->setFontProperties(array("FontName"=>"../fonts/pf_arma_five.ttf","FontSize"=>6));
$myPicture->setGraphArea(60,30,650,190);
$scaleSettings = array("GridR"=>246,"GridG"=>24,"GridB"=>255,"CycleBackground"=>TRUE);
$myPicture->drawScale($scaleSettings);
$myPicture->drawText(60,230,"Average number of students in a group",array("FontSize"=>16,"Align"=>TEXT_ALIGN_BOTTOMLEFT));
$mystockChart = new Stock($myPicture,$mydata);
$stockSettings = array("BoxUpR"=>246,"BoxUpG"=>24,"BoxUpB"=>255,"BoxDownR"=>0,"BoxDownG"=>0,"BoxDownB"=>0);
$mystockChart->drawStockChart($stockSettings);
drawImage($myPicture);
?>
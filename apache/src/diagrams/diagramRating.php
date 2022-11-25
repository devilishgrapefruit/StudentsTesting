<?php
require_once '../config/login.php';
require_once 'getFixtures.php';
require '../vendor/autoload.php';

use CpChart\Data;
use CpChart\Image;
use CpChart\Chart\Pie;

require_once 'drawImage.php';


foreach ($fixtures->getObjects() as $fixture) {
    if ($fixture->average_rating_students < 20){
        $count020++;
    }
    else if ($fixture->average_rating_students >= 20 && $fixture->average_rating_students < 40) {
        $count2040++;
    }
    else if ($fixture->average_rating_students >= 40 && $fixture->average_rating_students < 60) {
        $count4060++;
    }
    else if ($fixture->average_rating_students >= 60 && $fixture->average_rating_students < 80) {
        $count6080++;
    }
    else if ($fixture->average_rating_students >= 80 && $fixture->average_rating_students <= 100) {
        $count80100++;
    }

}
$abcissa = "abcissa";
$count = "count";

$data = new Data();
$data->addPoints(array($count020, $count2040, $count4060, $count6080, $count80100), $count);

$data->addPoints(array("0-20 scores", "20-40 scores", "40-60 scores", "60-80 scores", "80-100 scores"), $abcissa);
$data->setAbscissa($abcissa);

$myPicture = new Image(400,233,$data);
$Settings = array("StartR"=>209, "StartG"=>150, "StartB"=>231, "EndR"=>111, "EndG"=>3, "EndB"=>138, "Alpha"=>50);
$myPicture->drawGradientArea(0,0,700,230,DIRECTION_VERTICAL,$Settings);
$myPicture->drawGradientArea(0,0,700,30,DIRECTION_VERTICAL,array("StartR"=>246,"StartG"=>24,"StartB"=>255,"EndR"=>255,"EndG"=>24,"EndB"=>175,"Alpha"=>100));

$myPicture->drawRectangle(0,0,399,232,array("R"=>0,"G"=>0,"B"=>0));

$PieChart = new Pie($myPicture,$data);

$myPicture->setShadow(FALSE);

$myPicture->setFontProperties(array("FontName"=>"../fonts/Forgotte.ttf","FontSize"=>14,"R"=>80,"G"=>80,"B"=>80));
$myPicture->drawText(190, 8, "Pie with a rating students", ["R" => 0, "G" => 0, "B" => 0, "Align" => TEXT_ALIGN_TOPMIDDLE]);
$PieChart->draw3DPie(250,140,array("Radius"=>120,"WriteValues"=>TRUE,"DataGapAngle"=>10,"DataGapRadius"=>6,"Border"=>TRUE));
$PieChart->drawPieLegend(15,80,array("Alpha"=>40));
drawImage($myPicture);

?>
<?php
require_once '../config/login.php';
require_once 'getFixtures.php';
require '../vendor/autoload.php';

use CpChart\Data;
use CpChart\Image;

require_once 'drawImage.php';

$points = [];

$sum = 0;
$count= 0;


foreach ($fixtures->getObjects() as $fixture) {
    $sum += $fixture->activity_for_year;
    $count++;
}
$average = $sum / $count;
$count = 0;
foreach ($fixtures->getObjects() as $fixture){
    if ($count < 12) {
        if ($fixture->activity_for_year > $average and $fixture->activity_for_year>=50) {
            array_push($points, (int)($average - random_int(5, 50)));
            $count++;
        }
        else if ($fixture->activity_for_year<50) {
            array_push($points, (int)($average + random_int(5, 50)));
            $count++;
        }
    }

}
$labels = "labels";
$p = "activity";

$data = new Data();  
$data->addPoints($points,$p);
$data->setAxisName(0,"Activity");
$data->setAxisDisplay(0,AXIS_FORMAT_CURRENCY);
$data->addPoints(array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aou","Sep","Oct","Nov","Dec"),$labels);
$data->setSerieDescription($labels,"Months");
$data->setAbscissa($labels);
$data->setPalette($p,array("R"=>254,"G"=>4,"B"=>1));
$myPicture = new Image(700,230,$data);
$myPicture->drawGradientArea(0,0,700,230,DIRECTION_VERTICAL,array("StartR"=>138,"StartG"=>254,"StartB"=>218,"EndR"=>138,"EndG"=>206,"EndB"=>254,"Alpha"=>100));
$myPicture->drawRectangle(0,0,699,229,array("R"=>200,"G"=>200,"B"=>200));
$myPicture->setFontProperties(array("FontName"=>"../fonts/Forgotte.ttf","FontSize"=>11));
$myPicture->drawText(60,35,"Student activity during the year",array("FontSize"=>20,"Align"=>TEXT_ALIGN_BOTTOMLEFT));
$myPicture->setGraphArea(60,40,670,190);
$myPicture->drawFilledRectangle(60,40,670,190,array("R"=>255,"G"=>255,"B"=>255,"Surrounding"=>-200,"Alpha"=>10));
$myPicture->drawScale(array("GridR"=>180,"GridG"=>180,"GridB"=>180));
$myPicture->setShadow(TRUE,array("X"=>2,"Y"=>2,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>10));
$myPicture->setFontProperties(array("FontName"=>"../fonts/pf_arma_five.ttf","FontSize"=>6));
$myPicture->drawSplineChart();
$myPicture->setShadow(FALSE);
$myPicture->drawLegend(643,210,array("Style"=>LEGEND_NOBORDER,"Mode"=>LEGEND_HORIZONTAL));
drawImage($myPicture);

?>
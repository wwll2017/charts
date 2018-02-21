<?php
include("class/pData.class.php");
include("class/pDraw.class.php");
include("class/pImage.class.php");
 
$MyData = new pData();  
$MyData->addPoints(array(1,1,1,12,8,3),"借用中");
$MyData->addPoints(array(1,12,15,8,5,5),"预约锁定");
$MyData->addPoints(array(1,7,5,18,19,22),"失效");
//$MyData->setPalette("借用中",array("R"=>229,"G"=>11,"B"=>11,"Alpha"=>80));
//$MyData->setPalette("预约锁定",array("R"=>11,"G"=>229,"B"=>11,"Alpha"=>80));
///$MyData->setPalette("失效",array("R"=>11,"G"=>11,"B"=>229,"Alpha"=>80));

$MyData->setAxisName(0,"部件数量");
$MyData->addPoints(array("厂家1","厂家2","厂家3","厂家4","厂家5","厂家6"),"Labels");
//$MyData->setSerieDescription("Labels","Months");
$MyData->setAbscissa("Labels");
 
//$MyData->normalize(100,"%");
 
$myPicture = new pImage(700,230,$MyData);
$myPicture->drawGradientArea(0,0,700,230,DIRECTION_VERTICAL,array("StartR"=>240,"StartG"=>240,"StartB"=>240,"EndR"=>180,"EndG"=>180,"EndB"=>180,"Alpha"=>100));
$myPicture->drawGradientArea(0,0,700,230,DIRECTION_HORIZONTAL,array("StartR"=>240,"StartG"=>240,"StartB"=>240,"EndR"=>180,"EndG"=>180,"EndB"=>180,"Alpha"=>20));
 
$myPicture->setFontProperties(array("FontName"=>"fonts/simfang.ttf","FontSize"=>8));
 
$myPicture->setGraphArea(60,40,680,190);
//$myPicture->drawScale(array("DrawSubTicks"=>TRUE,"Mode"=>SCALE_MODE_START0));
$myPicture->drawScale(array("Pos"=>SCALE_POS_TOPBOTTOM,"DrawSubTicks"=>TRUE,"Mode"=>SCALE_MODE_START0));

$myPicture->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>10));
$myPicture->drawStackedBarChart(array("DisplayValues"=>TRUE,"DisplaySize"=>5,"DisplayColor"=>DISPLAY_AUTO,"Rounded"=>false,"Surrounding"=>-15));
$myPicture->setShadow(FALSE);
 

$myPicture->setFontProperties(array("FontName"=>"fonts/simfang.ttf","FontSize"=>12));
$myPicture->drawLegend(480,210,array("Style"=>LEGEND_NOBORDER,"Mode"=>LEGEND_HORIZONTAL));

 
$pic = "./img/barcode.png";
$myPicture->Render($pic);
// echo'<img src="'.$pic.'">';
//readfile($pic);
echo file_get_contents($pic);

?>
<?php
$gif = new Imagick('banner.gif');

$drawColorHex = new ImagickPixel('#808080');

$draw = new ImagickDraw();    
$draw->setFont('AmericanGothic-Bold.otf');
$draw->setFontSize(80);
$draw->setFillColor($drawColorHex);
$draw->setFillOpacity(0.8);

$countJsonUrl = "https://img.gcrp.cc/api/count.php";

$responseJson = file_get_contents($countJsonUrl);
$countData = json_decode($responseJson, true);

foreach($gif as $frame){
  $gif->annotateImage($draw, $x = 1155, $y = 200, $angle = 0, $countData["Players_ALTV"]);   
  $gif->annotateImage($draw, $x = 1155, $y = 365, $angle = 0, $countData["Players_TS3"]);         
} 

   

header('Content-Type: image/gif');
print $gif->getImagesBlob();
?>

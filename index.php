<?php
$gif = new Imagick('banner.gif'); //Filename/Path to

$drawColorHex = new ImagickPixel('#808080'); //Change Color Hex Code here

$draw = new ImagickDraw();    
$draw->setFont('AmericanGothic-Bold.otf'); //Change Font
$draw->setFontSize(80); //Change Font Size
$draw->setFillColor($drawColorHex); //Fill the Text with the colorHex above
$draw->setFillOpacity(0.8); //Set some opacity to the Text

$countJsonUrl = "https://api.bennisengine.de/api"; //Replace Json Request Url here

$responseJson = file_get_contents($countJsonUrl); //Getting file contents
$countData = json_decode($responseJson, true); //Just decode the file content to json

foreach($gif as $frame){ //Setting text Every Frame of $gif
  $gif->annotateImage($draw, $x = 1155, $y = 200, $angle = 0, $countData["players_game-altv"]); //Applying count Data to text 
  $gif->annotateImage($draw, $x = 1155, $y = 365, $angle = 0, $countData["players_voip-ts3"]);  //Applying count Data to text       
} 

   

header('Content-Type: image/gif'); //Set Header for Final gif if website has been opended
print $gif->getImagesBlob(); //Printing Image blobs
?>

<?php

use PHPImageWorkshop\ImageWorkshop;

require(__DIR__ . '/../vendor/autoload.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);

$imageDir = __DIR__ . '/../images/catalog/vent/1';

$layer = ImageWorkshop::initFromPath($imageDir . '/104829-970-jpg.jpg');

$oldWidth = $layer->getWidth();
$oldHeight = $layer->getHeight();

$newWidth = $oldWidth - 4; // px
$newHeight = $oldHeight - 2; // px
$positionX = 2; // left translation of 0px
$positionY = 1; // top translation of 0px
$position = "LT";

$layer->cropInPixel($newWidth, $newHeight, $positionX, $positionY, $position);

$layerLogo = ImageWorkshop::initFromPath($imageDir . '/104829-970-jpg.jpg');

////
$dirPath = $imageDir;
$filename = "104829-970-jpg.jpg";
$createFolders = true;
$backgroundColor = null;    // transparent, only for PNG (otherwise it will be white if set null)
$imageQuality = 90;         // useless for GIF, usefull for PNG and JPEG (0 to 100%)

$layer->save($dirPath, $filename, $createFolders, $backgroundColor, $imageQuality);

echo 'DONE';
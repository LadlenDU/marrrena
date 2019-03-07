<?php

use PHPImageWorkshop\ImageWorkshop;

require(__DIR__ . '/../vendor/autoload.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);

function getDirContents($dir, &$results = array())
{
    $files = scandir($dir);

    foreach ($files as $key => $value) {
        $path = realpath($dir . DIRECTORY_SEPARATOR . $value);
        if (!is_dir($path)) {
            //$results[] = $path;
            modImage($dir, $value);
        } else if ($value != "." && $value != "..") {
            getDirContents($path, $results);
            //$results[] = $path;
        }
    }

    //return $results;
}

function modImage($imageDir, $imageName)
{
    $layer = ImageWorkshop::initFromPath($imageDir . '/' . $imageName);

    $oldWidth = $layer->getWidth();
    $oldHeight = $layer->getHeight();

    $newWidth = $oldWidth - 4; // px
    $newHeight = $oldHeight - 2; // px
    $positionX = 2; // left translation of 0px
    $positionY = 1; // top translation of 0px
    $position = "LT";

    $layer->cropInPixel($newWidth, $newHeight, $positionX, $positionY, $position);

    $layerLogo = ImageWorkshop::initFromPath(__DIR__ . '/logo.png');
    if ($newWidth < $newHeight) {
        $layerLogo->resizeInPixel($newWidth / 2, null, false);
    } else {
        $layerLogo->resizeInPixel(null, $newHeight / 2, false);
    }

    $emptyLayer = ImageWorkshop::initVirginLayer($newWidth, $newHeight);
    $emptyLayer->addLayerOnTop($layer, 0, 0, 'LT');
    $emptyLayer->addLayerOnTop($layerLogo, 0, 0, 'MM');

    ////
    $dirPath = $imageDir;
    $filename = $imageName;
    $createFolders = true;
    $backgroundColor = null;    // transparent, only for PNG (otherwise it will be white if set null)
    $imageQuality = 90;         // useless for GIF, usefull for PNG and JPEG (0 to 100%)

    $emptyLayer->save($dirPath, $filename, $createFolders, $backgroundColor, $imageQuality);

    file_put_contents('conv.log', $filename . "\n", FILE_APPEND);
    echo $filename . "\n";
}

$imageDir = __DIR__ . '/../images/catalog/vent';
getDirContents($imageDir);

echo 'DONE';

<?php

namespace INUtils\Helper;

class PictureHelper
{
    const PERCENT = 10;
    const PATH = "/thumbnails/";
    const PATH_TO_HERE = "/wp-content/plugins/in_utils/Helper";

    public static function getThumbnail($url) {
        
//         $fileName = self::getImageName($url);
//         //header('Content-type: image/jpeg');

//         list($widthOrig, $heightOrig) = getimagesize($url);

//         $width = ceil($widthOrig*self::PERCENT/100);
//         $height = ceil($heightOrig*self::PERCENT/100);

//         // This resamples the image
//         $imageR = \imagecreatetruecolor($width, $height);
//         $image = \imagecreatefromjpeg($url);
//         \imagecopyresampled($imageR, $image, 0, 0, 0, 0, $width, $height, $widthOrig, $heightOrig);
        
//         $destinationPath = __DIR__.self::PATH.$fileName;
//         if(!file_exists($destinationPath)){
//             imagejpeg($imageR, $destinationPath);
//         }
//         return self::PATH_TO_HERE.self::PATH.$fileName;
        return $url;
    }
    
    public static function getImageName($url){
        $urlPaths = explode("/", $url);
        return $urlPaths[count($urlPaths)-1];
    }
}
?>
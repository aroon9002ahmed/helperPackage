<?php

namespace Qit\Helper\functions;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
// or use Intervention\Image\Drivers\Imagick\Driver;


class HelperGeneral
{
 
    /**
     * Generate an embedded YouTube video iframe from a given link [Youtube].
     *
     * @param string $link
     * @param int $width
     * @param int $height
     * @param string $title
     * @param bool $iframe 'Whether to return an iframe or just the YouTube link'
     * @return string 
     */

    public static function Youtube($link, $width = 560, $height = 315,$title = 'YouTube video player',$iframe = true)
    {
        preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $link, $match);
        $youtube_id = $match[1];

        if($iframe) {
            return '<iframe width="'.$width.'" height="'.$height.'" src="https://www.youtube.com/embed/'.$youtube_id.'" title="'.$title.'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>';
        }else{
            return "<a href='https://www.youtube.com/watch?v=" . $youtube_id . "' target='_blank'>".$title."</a>"; // This will return a clickable link to the YouTube video
        }


    }

    /**
     * Resize an image and create a cache and small version of it.
     *
     * @param string $filename The name of the image file.
     * @param string $path The path where the image is stored.
     * @param string $cacheFolder The folder where the resized image will be saved.
     * @param string $smallFolder The folder where the small version of the image will be saved.
     * @param int|null $weight The width to resize the image to, or null to keep original width.
     * @param int|null $height The height to resize the image to, or null to keep original height.
     * @param int|null $smallweight The width for the small version, or null to skip small version.
     * @param int|null $smallheight The height for the small version, or null to skip small version.
     */
    public static function ImgResize($filename, $path,$cacheFolder='cache',$smallFolder='small', $weight = null, $height = null, $smallweight = null, $smallheight = null)
    {
        $imgManager = new ImageManager(new Driver());
        $image = $imgManager->read('storage/' . $path . '/' . $filename);

        //create cache image
        $image->resize($weight, $height);
        $image->save('storage/' . $path . '/'.$cacheFolder.'/' . $filename);

        if ($smallweight !== null || $smallheight !== null) {
            //create small image
            $smallImage = $imgManager->read('storage/' . $path . '/' . $filename);
            $smallImage->resize($smallweight, $smallheight);
            $smallImage->save('storage/' . $path . '/'.$smallFolder.'/' . $filename);
        }
    }

}


<?php

namespace Qit\Helper\functions;

class HelperGen
{
    /**
     * Generate a helper function result from a given string.
     *
     * @param string $string
     * @return string
     */
    public static function generateSlug($string)
    {
        // You can customize this helper function as needed
        return "Helper: " . \Illuminate\Support\Str::slug($string, '-');
    }


    /**
     * Generate an embedded YouTube video iframe from a given link [Youtube].
     *
     * @param string $link
     * @param int $width
     * @param int $height
     * @param string $title
     * @return string
     */

    public static function Youtube($link, $width = 560, $height = 315,$title = 'YouTube video player',$iframe = true)
    {
        preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $link, $match);
        $youtube_id = $match[1];

        if($iframe) {
            return '<iframe width="'.$width.'" height="'.$height.'" src="https://www.youtube.com/embed/'.$youtube_id.'" title="'.$title.'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>';
        }else{
            return "https://www.youtube.com/embed/" . $youtube_id; // This will return the YouTube embed link only
        }


    }
}


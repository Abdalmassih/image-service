<?php

require_once APPROOT . '/libraries/Model.php';
class Image extends Model
{
    public function resize($file, $w, $h, $crop = FALSE)
    {
        list($width, $height) = getimagesize($file);
        $r = $width / $height;
        if ($crop) {
            if ($width > $height) {
                $width = ceil($width - ($width * abs($r - $w / $h)));
            } else {
                $height = ceil($height - ($height * abs($r - $w / $h)));
            }
            $newwidth = $w;
            $newheight = $h;
        } else {
            if ($w / $h > $r) {
                $newwidth = $h * $r;
                $newheight = $h;
            } else {
                $newheight = $w / $r;
                $newwidth = $w;
            }
        }
        ini_set('memory_limit', '-1');
        $src = imagecreatefromjpeg($file);
        $dst = imagecreatetruecolor(ceil($newwidth), ceil($newheight));
        imagecopyresampled($dst, $src, 0, 0, 0, 0, (int) $newwidth, (int) $newheight, $width, $height);

        return $dst;
    }
}
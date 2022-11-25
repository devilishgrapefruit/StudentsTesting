<?php
    function drawImage($image) {
        $filename_whater_mark = "water_mark.png";
        $filename = "example.png";
        $image->Render($filename);

        $stamp = imagecreatefrompng($filename_whater_mark);
        $im = imagecreatefrompng($filename);

        $marge_right = -65;
        $marge_bottom = 83;
        $sx = imagesx($stamp);
        $sy = imagesy($stamp);

        imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));

        header('Content-type: image/png');
        imagepng($im);
        imagedestroy($im);

        unlink($filename);
    }

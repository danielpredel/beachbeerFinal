<?php
    session_start();
    header("Content-Type: image/png");
    $im = @imagecreatetruecolor(110, 50);
    $color_fondo = imagecolorallocate($im, 102, 102, 153);
    $color_texto = imagecolorallocate($im, 255, 255, 255);
    $key="";
    for($i=15; $i<=95; $i+=20){
        //$key .= $pattern[rand(0,35)];
        $key .=($pattern=rand(0,9));
        imagechar($im,rand(3,5),$i,rand(2,14),$pattern,$color_texto);
    }

    imagepng($im);
    imagedestroy($im);
    $_SESSION['img_number']=$key;
?>
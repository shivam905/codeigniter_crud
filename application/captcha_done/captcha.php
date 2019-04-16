<?php

$str = md5(microtime());;

$str = substr($str,0,6);

session_start();
$_SESSION['cap_code'] = $str;

$img = imagecreate(80,40);

imagecolorallocate($img,2,200,200);

$txtcol = imagecolorallocate($img,0,0,0);

imagestring($img,10,10,12,$str,$txtcol);

header('content:image/jpeg');

imagejpeg($img);

?>
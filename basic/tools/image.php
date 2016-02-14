<?php
/**
 * Created by PhpStorm.
 * User: lcc
 * Date: 16/2/14
 * Time: 上午10:45
 */

$img=imagecreate(400,300);
imagecolorallocate($img,255,255,255);
imageellipse($img,200,200,50,50,imagecolorallocate($img,255,0,0));
header('Content-type: image/png');
imagepng($img);
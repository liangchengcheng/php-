<?php
/**
 * Created by PhpStorm.
 * User: lcc
 * Date: 16/2/14
 * Time: 上午10:54
 */
$img=imagecreatefromjpeg('psb.jpg');
imagestring($img,2,5,5,'jikexueyuan.com',imagecolorallocate($img,255,255,0));
header('Content-type: image/jpg');
imagejpeg($img);
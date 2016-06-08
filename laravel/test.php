<?php

$content = "<p2222><im src=ueditor我222222.jpg /><ig src='ueditor我222222.jpg'/><ig src='ueditor我222222.jpg'/>";

$content_arr = ($content != null ? explode('src=', $content) : array());
foreach ($content_arr as $key => $value) {
    if (strpos($value, 'ued') !== false) {
        $content_arr[$key] = 'src=' . 'http://www.tengxungame.pub:8080/' . $value;
    }
}
$s2=implode(',',$content_arr);
echo $s2;
//foreach ($content_arr as $key => $value)
//    echo $key . "=>" . $value;
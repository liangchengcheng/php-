<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>控制流程</title>
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: lcc
 * Date: 16/2/12
 * Time: 下午6:29
 */

function getLevel($score){
    if($score>90){
        return '优秀';
    }else if($score>80){
        return '良好';
    }
    else if($score>60){
        return '及格';
    }else{
        return '不及格';
    }
}

function getLevelbySwitch($score){
    $result='差';
    switch($score/10){
        case 10:
        case 9:
            $result= '优秀';
            break;
        case 8:
            $result= '良好';
            break;
        case 6:
            $result ='可以';
            break;
        default:
            $result ='差';
            break;
    }
    return $result;
}

echo getLevel(91);
?>
</body>
</html>

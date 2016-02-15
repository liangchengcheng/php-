<?php
/**
 * Created by PhpStorm.
 * User: lcc
 * Date: 16/2/15
 * Time: 下午9:29
 */

//链接数据库的语句
function connectDB(){
    return mysql_connect(MYSQL_HOST,MYSQL_USER,MYSQL_PWD);
}


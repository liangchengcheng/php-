<?php
return array(
    //'配置项'=>'配置值'
    'DB_TYPE'               	     =>  	'mysql',     	// 数据库类型
    'DB_HOST'               	     =>  	'localhost', 	// 服务器地址
    'DB_NAME'               	     =>  	'jike',          	// 数据库名
    'DB_USER'               	     => 	 'user',      	// 用户名
    'DB_PWD'                	       =>  	'123',          	// 密码
    'DB_PORT'                   	   =>  	'3306',        	// 端口
    'DB_PREFIX'                     =>  	'jike_',    	// 数据库表前缀
    'LOAD_EXT_CONFIG'	  =>	'user,upload',	//加载扩展配置
    //'ACTION_SUFFIX'	        =>	'Action'	//操作方法后缀
    //'ACTION_BIND_CLASS'	  =>	true 		//操作绑定到类
    'URL_MODEL'                  =>     2,              //Rewrite：URL模式
    'URL_HTML_SUFFIX'        =>    'shtml'        //伪静态后缀
    
);

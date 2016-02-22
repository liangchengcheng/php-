<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>极客学院-ThinkPHP</title>
        <!-- Bootstrap CSS -->
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <nav class="navbar navbar-default" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">极客学院-ThinkPHP</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">主页</a></li>
                    <li><a href="#">Link</a></li>
                </ul>
                <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Link</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">主题 <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{:U('index',array('t'=>'default'))}">默认主题</a></li>
                            <li><a href="{:U('index',array('t'=>'jike'))}">极客主题</a></li>
                        </ul>
                    </li>
                </ul>
                </div><!-- /.navbar-collapse -->
            </nav>
            <div class="container">
            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>default</strong> 默认主题
            </div>

                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <td>用户名</td>
                            <td><?php echo (strtoupper($user["user"])); ?></td>
                        </tr>
                        <tr>
                            <td>电子邮件</td>
                            <td><?php echo (strtoupper(str_replace('jike','jikexueyuan',$user["mail"]))); ?></td>
                        </tr>
                        <tr>
                            <td>电子邮件php</td>
                            <td><?php echo strtoupper(str_replace('jike','jikexueyuan_php',$user['mail']));?></td>
                        </tr>
                        <tr>
                            <td>年龄</td>
                            <td><?php echo ($user['age']-1); ?></td>
                        </tr>
                        <tr>
                            <td>计算年龄</td>
                            <td><?php echo (getAge($birthday_year)); ?></td>
                        </tr>
                        <tr>
                            <td>手机号码</td>
                            <td><?php echo ((isset($mobile) && ($mobile !== ""))?($mobile):'没有手机号码'); ?></td>
                        </tr>
                        <tr>
                            <td>项目目录</td>
                            <td><?php echo ($_SERVER['DOCUMENT_ROOT']); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- jQuery -->
            <script src="//code.jquery.com/jquery.js"></script>
            <!-- Bootstrap JavaScript -->
            <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

            <!-- import -->
            <script type="text/javascript" src="/htdocs/thinkphp/Public/Js/bootstrap.js"></script>

            <!-- load -->
            <script type="text/javascript" src="/htdocs/thinkphp/Public/js/jquery.js"></script>

            <!-- css -->
            <link rel="stylesheet" type="text/css" href="/htdocs/thinkphp/Public/css/bootstrap.css" />

            <!-- js -->
            <script type="text/javascript" src="./Cdn/js/bootstrap.js"></script>
        </body>
    </html>
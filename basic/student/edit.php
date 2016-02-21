<html>
<head>
    <meta charset="UTF-8">
    <title>修改学生</title>
</head>
<body>
<center>
    <?php include "menu.php";

    try{
        //连接数据库
        $pdo=new PDO("mysql:host=localhost;dbname=test","root","");
    }catch(PDOException $e){
        die("数据库连接失败".$e->getMessage());
    }

    $sql="select * from user where id=".$_GET['id'];

    $stmt=$pdo->query($sql);
    if($stmt->rowCount()>0){
        $stu=$stmt->fetch(PDO::FETCH_ASSOC);
        print_r($stu);
    }else{
        die("没有要修改的信息");
    }
    ?>
    <h3>修改学生的信息</h3>
    <form action="action.php?action=edit" method="post">
        <table>
            <tr>
                <td>id</td>
                <td><input type="text" name="id" value="<?php echo $stu['id']?>" ></td>
            </tr>
            <tr>
                <td>名字</td>
                <td><input type="text" name="name" value="<?php echo $stu['name']?>" ></td>
            </tr>
            <tr>
                <td>密码</td>
                <td><input type="text" name="pwd" value="<?php echo $stu['pwd']?> "></td>
            </tr>
            <tr>
                <td>&nbsp</td>
                <td>
                    <input type="submit" value="修改">
                </td>
            </tr>
        </table>
    </form>
</center>
</body>
</html>
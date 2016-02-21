<html>
<head>
    <meta charset="UTF-8">
    <title>添加学生</title>
</head>
<body>
    <center>
        <?php include "menu.php"; ?>
        <h3>增加学生的信息</h3>
        <form action="action.php?action=add" method="post">
        <table>
            <tr>
                <td>id</td>
                <td><input type="text" name="id"></td>
            </tr>
            <tr>
                <td>名字</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td>密码</td>
                <td><input type="text" name="pwd"></td>
            </tr>
            <tr>
                <td>&nbsp</td>
                <td>
                    <input type="submit" value="增加">
                    <input type="reset" value="重置">
                </td>
            </tr>
        </table>
        </form>
    </center>
</body>
</html>
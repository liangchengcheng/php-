<html>
<head>
    <meta charset="UTF-8">
    <title>学生信息管理</title>
    <script>
        function doDel(id){
            if (confirm("确定要删除么")){
                window.location='action.php?action=del&id='+id;
            }
        }
    </script>
</head>
<body>
    <center><?php
        include 'menu.php';
        ?>
        <h3>浏览学生信息</h3>
      <table width="600" border="1">
          <tr>
              <th>id</th>
              <th>名字</th>
              <th>密码</th>
              <th>操作</th>
          </tr>
          <?php
            try{
                //连接数据库
                $pdo=new PDO("mysql:host=localhost;dbname=test","root","");
            }catch(PDOException $e){
                die("数据库连接失败".$e->getMessage());
            }

          //执行sql查询并且解析遍历
          $sql="select * from user";
          foreach($pdo->query($sql) as $row){
              echo "<tr>";
              echo "<td>{$row['id']}</td>";
              echo "<td>{$row['name']}</td>";
              echo "<td>{$row['pwd']}</td>";

              echo "<td>
                <a href='javascript:doDel({$row['id']})'>删除</a>
                <a href='edit.php?id={$row['id']}'>修改</a>
                </td>";

              echo "</tr>";
          }
          ?>
      </table>
    </center>
</body>
</html>
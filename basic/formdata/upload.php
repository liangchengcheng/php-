<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<?php

//print_r($_FILES);
$file=$_FILES['file'];
$fileName=$file['name'];
move_uploaded_file($file['tmp_name'],$fileName);
echo "<img src='$fileName'>";
?>

</body>
</html>
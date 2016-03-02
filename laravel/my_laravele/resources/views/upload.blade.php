<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 16px;
        }
    </style>
</head>
<body>
<form method="post" action="test" enctype="multipart/form-data">
    <div class="container" >
        <input type="file" name="profile" multiple>
    </div>
    <button type="submit">提交</button>
</form>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .main {
        border: 1px solid black;
        width: 200px;
        padding: 0 8px;
    }

    h2 {
        color: blue;
        margin: 0;
        margin-bottom: 12px;
    }

    h3 {
        color: #1800AB;
        margin: 0;
        margin-bottom: 8px;
    }
</style>
<body>
    <?php
    $user = $_GET["user"];
    $password = $_GET["password"];
    ?>
    <div class="main">
        <h2>Thông tin sinh viên</h2>
        <h3>Tên: <?php echo $user ?></h3>
        <h3>Mật khẩu: <?php echo $password ?></h3>
    </div>
</body>
</html>
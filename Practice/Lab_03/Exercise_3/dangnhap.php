<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    h3 {
        text-align: center;
        margin: 8px 0;
    }

    .main {
        width: 300px;
        border: 1px solid black;
        padding: 0 8px;
        background-color: #FFCBCB;
    }

    .input__user {
        margin-left: 12px;
    }

    .input__password {
        margin-left: 46px;
    }

    input[type="submit"] {
        margin: 4px 120px;
        border-radius: 5px;
    }
</style>
<body>
    <div class="main">
        <form method="get" action="bangdiem.php">
            <h3>Đăng nhập hệ thống xem điểm</h3>
            Tên đăng nhập <input class='input__user' type="text" name="user"></br>
            Mật khẩu <input class='input__password' type="text" name="password"></br>
            <input type="submit" value='Đăng nhập' name="login">
        </form>
    </div>
</body>
</html>

<?php
if(isset($_GET['login']) && $_GET['login'] == 'Đăng nhập') {
    session_start();
    $_SESSION["user"] = $user;
    $_SESSION["password"] = $password;
}
?>
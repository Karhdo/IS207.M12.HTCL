<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, tr, td {
            border: 1px solid #FF9600;
            border-collapse: collapse;
        }

        p {
            margin : 0;
        }

        .header__title {
            font-size: 20px;
            font-weight: 600;
        }

        .header__name {
            color: blue;
            font-size: 18px;
            font-weight: 500;
        }

        table {
            width: 350px;
            background-color: #FFCC88;
            font-size: 18px;
            font-weight: 500;
        }

        a {
            display: block;
            margin-top: 20px;
            font-size: 18px;
            font-weight: 500;
            color: blue;
        }

        .main {
            border: 1px solid black;
            padding: 8px;
            width: 350px;
        }
    </style>
</head>
<body>
    <?php
    session_start();
    $user = $_GET["user"];
    $password = $_GET["password"];
    ?>
    <div class="main">
        <header class='header__title'>BẢNG ĐIỂM</header>
        <p class="header__name">Tên: <?php echo $user ?></p>
        <table>
            <tr>
                <td>STT</td>
                <td>Tên môn</td>
                <td>Điểm</td>
            </tr>
            <tr>
                <td>1</td>
                <td>Cơ sở dũ liệu</td>
                <td>7</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Phát triển ứng dụng Web</td>
                <td>8</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Lập trình Java</td>
                <td>7.5</td>
            </tr>
        </table>
        <a href="thongtinsinhvien.php?user=<?php echo $user ?>&password=<?php echo $password ?>">Xem thông tin sinh viên</a>
    </div>
</body>
</html>
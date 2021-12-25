<?php
    include "./connect.php";
    $userName = $_GET["userName"];
    $password = $_GET["password"];
    $str = "SELECT * FROM login WHERE (username='$userName' and password='$password')";
    $rows = $connect->query($str);
    if($rows->fetch_row() == 0) {
        echo "Đăng nhập không thành công. Vui lòng đăng nhập lại !!!";
    } else {
        echo "Chúc mừng bạn bạn đã đăng nhập thành công!!!";
    }
?>
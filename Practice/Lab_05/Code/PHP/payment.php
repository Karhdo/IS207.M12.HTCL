<?php
include "./connect.php";
date_default_timezone_set('Asia/Ho_Chi_Minh');

$reciptId = random_int(1, 999999999);
$reciptDay = date("Y-m-d")." ".date("h:i:s");
$name = $_GET["name"];
$phoneNumber = $_GET["phoneNumber"];
$email = $_GET["email"];
$address = $_GET["address"];
$city = $_GET["city"];
$district = $_GET["district"];
$commune = $_GET["commune"];

$isSuccess = $connect->query("INSERT INTO HOADON VALUES ('$reciptId', '$reciptDay', '$name', '$phoneNumber', '$email', '$address', '$city', '$district', '$commune', '0')");

if($isSuccess == true) {
    echo "Thanh toán THÀNH CÔNG";
} else {
    echo "Thanh toán THẤT BẠI";
}

session_start();
if(isset($_SESSION["my_cart"]) > 0) {
    foreach($_SESSION["my_cart"] as $key => $value) {
        $row = $connect->query("SELECT * FROM SANPHAM WHERE MASP='$key'")->fetch_row();
    
        $productQnt = $value['productQnt'];
        $totalMoney = $row[4]*$productQnt;
    
        $connect->query("INSERT INTO QLSP VALUES ('$reciptId', '$key', '$productQnt', '$totalMoney')");
    }
}
session_destroy();
?>
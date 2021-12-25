<?php
include "./../connect.php";
$idProduct = $_GET['idProduct'];
$nameProduct = $_GET['nameProduct'];
$country = $_GET['country'];
$unit = $_GET['unit'];
$price = $_GET['price'];
$type = $_GET['type'];
$linkImage = $_GET['linkImage'];

$isSuccess = $connect->query("INSERT INTO SANPHAM VALUES ('$idProduct', '$nameProduct', '$unit', '$country', $price, '$linkImage', '$type')");

if($isSuccess == true) {
    echo "Thêm sảm phẩm THÀNH CÔNG";
} else {
    echo "Thêm sản phẩm THẤT BẠI";
}
?>
<?php
include "./connect.php";
session_start();
$totalMoneyProducts = 0;
$html = '';

foreach($_SESSION["my_cart"] as $key => $value) {
    $row = $connect->query("SELECT * FROM SANPHAM WHERE MASP='$key'")->fetch_row();

    $totalMoney = $row[4]*$value['productQnt'];
    $totalMoneyProducts += $totalMoney;
    $html .= "
        <tr>
            <td class='product-name'>
                <span>$row[1]<span>
            </td>
            <td class='product-qnt'>
                <span>$value[productQnt]</span>
            </td>
            <td class='product-total'>$totalMoney</td>
        </tr>
    ";
}

$html .= "|".$totalMoneyProducts;
echo($html);
?>
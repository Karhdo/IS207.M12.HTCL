<?php
include "./connect.php";
session_start();
$totalMoneyProducts = 0;
$html = '';

if(count($_SESSION["my_cart"]) > 0) {
    foreach($_SESSION["my_cart"] as $key => $value) {
        $row = $connect->query("SELECT * FROM SANPHAM WHERE MASP='$key'")->fetch_row();

        $totalMoney = $row[4]*$value['productQnt'];
        $totalMoneyProducts += $totalMoney;
        $html .= "
            <tr>
                <td class='product-name'>
                    <image src='$row[5]' />
                    <span>$row[1]<span>
                </td>
                <td class='product-price'>
                    $row[4]
                </td>
                <td class='product-qnt'>
                    <input min='1'  masp='$key' type='number' value='$value[productQnt]' />
                </td>
                <td class='product-total'>$totalMoney</td>
                <td class='product-del'>
                    <button masp='$key'>Xoá</button>
                </td>
            </tr>
        ";
    }
}

$html .= "|".$totalMoneyProducts;
echo($html);
?>
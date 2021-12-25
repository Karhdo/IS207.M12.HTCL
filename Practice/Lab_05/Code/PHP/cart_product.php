<?php
include "./connect.php";
session_start();
// session_destroy();

if(isset($_GET["productId"]))
{
    $productId = $_GET["productId"];
    $productQnt = $_GET["productQnt"];

    if(isset($_SESSION["my_cart"][$productId])) {
        $preProductQnt = $_SESSION["my_cart"][$productId]["productQnt"];
        $_SESSION["my_cart"][$productId] = array("productId" => $productId, "productQnt" => $preProductQnt + $productQnt);
    } else {
        $_SESSION["my_cart"][$productId] = array("productId" => $productId, "productQnt" => $productQnt);
    }
}

if(isset($_SESSION["my_cart"])) {
    echo(count($_SESSION["my_cart"]));
}
?>
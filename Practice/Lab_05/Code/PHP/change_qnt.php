<?php
    session_start();
    $productId = $_GET["productId"];
    $productQnt = $_GET["productQnt"];

    $_SESSION["my_cart"][$productId] = array("productId" => $productId, "productQnt" => $productQnt);
?>
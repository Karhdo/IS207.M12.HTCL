<?php
    session_start();
    $productId = $_GET["productId"];

    unset($_SESSION["my_cart"][$productId]);
?>
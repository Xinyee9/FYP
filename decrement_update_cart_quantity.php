<?php
require_once('./php/dbconnect.php');
session_start();

if (!empty($_POST["cart_id"])) {
    $cart_id = $_POST["cart_id"]; {
        mysqli_query($con, "UPDATE cart SET cart_qty = cart_qty - 1 , subtotal = (cart_qty*ori_price) WHERE cart_id = $cart_id;");
    }
}

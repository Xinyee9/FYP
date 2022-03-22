<?php
    require_once('./php/dbconnect.php');
    session_start();
    // $cart->updateCartQuantity($_POST["cart_qty"], $_POST["cart_id"]);
    // updateCartQuantity($_POST["cart_qty"], $_POST["cart_id"]);
    // $updateQuantity = mysqli_query($con, "UPDATE cart SET cart_qty = $cart_qty WHERE cart_id = $cart_id;");
    if(!empty($_POST["cart_id"]))
    {
        $cart_id = $_POST["cart_id"];
        {
            mysqli_query($con, "UPDATE cart SET cart_qty = $cart_qty WHERE cart.cart_id = $cart_id;");
        }
    }
?>
<?php
require_once('./php/dbconnect.php');

// echo $_POST["cart_id"];
if (!empty($_POST["cart_id"])) {
	$cart_id = $_POST["cart_id"]; {
		mysqli_query($con, "DELETE FROM cart WHERE cart_id = $cart_id;");
	}
}
    // header("Location: cart.php");

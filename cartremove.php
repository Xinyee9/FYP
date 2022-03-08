<?php
    require_once('./php/dbconnect.php');

    // echo $_POST["cart_id"];
    if(!empty($_POST["cart_id"]))
    {
        $cart_id = $_POST["cart_id"];
        {
            mysqli_query($con, "DELETE FROM cart WHERE cart_id = $cart_id;");
        }
        // echo '<div class="Cart-Items">
		// 	<div class="image-box">
		// 		<img src="Food/'.$row["food_image"].'" style={{ height="120px" }} />
		// 	</div>
		// 	<div class="about">
		// 		<h4 class="title">'.$row["food_name"].'</h4>
		// 	</div>
		// 	<div class="counter">
		// 		<div class="btn">+</div>
		// 		<div class="count">'.$row["cart_qty"].'</div>
		// 		<div class="btn">-</div>
		// 	</div>
		// 	<div class="prices">
		// 		<div class="amount">RM '.$subtotal.'</div>
		// 		<div class="remove"><span onclick="remove('.$row["cart_id"].')"><u>Remove</u></span></div>
		// 	</div>
	  	// 	</div>';
    }
    // header("Location: cart.php");
?>
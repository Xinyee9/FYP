<?php
require_once('./php/dbconnect.php');
session_start();

// if (isset($_POST['remove'])){
// 	if ($_GET['action'] == 'remove'){
// 		foreach ($_SESSION['cart'] as $key => $value){
// 			if($value["cart_id"] == $_GET['id']){
// 				unset($_SESSION['cart'][$key]);
// 				echo "<script>alert('Product has been Removed!')</script>";
// 				echo "<script>window.location = 'cart.php'</script>";
// 			}
// 		}
// 	}
//   }
?>

<!DOCTYPE html>
<style>
	/* .j {
	text-decoration: blue;
	font-size: 45px;
	display: inline-block;
	padding: 10px 16px 10px 10px;
} */
	body {
		margin: 0;
		padding: 0;
		background: linear-gradient(to bottom right, #ffe3e3, #FAFCFF);
		/* height: 100vh; */
		display: flex;
		justify-content: center;
		align-items: center;
	}

	.CartContainer {
		width: 70%;
		margin-top: 2%;
		margin-bottom: 2%;
		padding-bottom: 25px;
		/* height: 90%; */
		/* height: 300px; */
		background-color: #ffffff;
		border-radius: 20px;
		box-shadow: 0px 10px 20px #1687d933;
	}

	.Header {
		margin: auto;
		width: 90%;
		height: 15%;
		display: flex;
		justify-content: space-between;
		align-items: center;
	}

	.Heading {
		font-size: 50px;
		font-family: 'Open Sans';
		font-weight: 700;
		color: #2F3841;
	}

	/* .Action{
	font-size: 14px;
	font-family: 'Open Sans';
	font-weight: 600;
	color: #E44C4C;
	cursor: pointer;
	border-bottom: 1px solid #E44C4C;
} */

	.Cart-Items {
		margin: auto;
		width: 90%;
		height: 30%;
		display: flex;
		justify-content: space-between;
		align-items: center;
	}

	.image-box {
		/* width: 15%; */
		/* width: 100px;
	height: 100px; */
		/* text-align: center; */
	}

	.about {
		height: 100%;
		width: 50%;
	}

	.title {
		padding-top: 10px;
		line-height: 30px;
		font-size: 32px;
		font-family: 'Open Sans';
		/* font-weight: 800; */
		color: #202020;
	}

	.subtitle {
		line-height: 10px;
		font-size: 18px;
		font-family: 'Open Sans';
		font-weight: 600;
		color: #909090;
	}

	.counter {
		width: 15%;
		display: flex;
		justify-content: space-between;
		align-items: center;
	}

	.btn {
		width: 40px;
		height: 40px;
		border-radius: 50%;
		background-color: #d9d9d9;
		display: flex;
		justify-content: center;
		align-items: center;
		font-size: 20px;
		font-family: 'Open Sans';
		font-weight: 900;
		color: #202020;
		cursor: pointer;
	}

	.count {
		font-size: 20px;
		font-family: 'Open Sans';
		font-weight: 600;
		color: #202020;
	}

	.prices {
		height: 100%;
		text-align: right;
	}

	.amount {
		padding-top: 20px;
		font-size: 26px;
		font-family: 'Open Sans';
		font-weight: 800;
		color: #202020;
	}

	.save {
		padding-top: 5px;
		font-size: 14px;
		font-family: 'Open Sans';
		font-weight: 600;
		color: #1687d9;
		cursor: pointer;
	}

	.remove {
		padding-top: 5px;
		font-size: 14px;
		font-family: 'Open Sans';
		font-weight: 600;
		color: #E44C4C;
		cursor: pointer;
	}

	.pad {
		margin-top: 5px;
	}

	hr {
		width: 66%;
		float: right;
		margin-right: 5%;
	}

	.checkout {
		float: right;
		margin-right: 5%;
		width: 28%;
	}

	.total {
		width: 100%;
		display: flex;
		justify-content: space-between;
	}

	.Subtotal {
		font-size: 22px;
		font-family: 'Open Sans';
		font-weight: 700;
		color: #202020;
	}

	/* .items{
	font-size: 16px;
	font-family: 'Open Sans';
	font-weight: 500;
	color: #909090;
	line-height: 10px;
} */
	.total-amount {
		font-size: 36px;
		font-family: 'Open Sans';
		font-weight: 900;
		color: #202020;
	}

	.button {
		margin-top: 10px;
		/* padding-bottom: 25px; */
		width: 100%;
		height: 40px;
		border: none;
		background: linear-gradient(to bottom right, #B8D7FF, #eb8e8e);
		border-radius: 20px;
		cursor: pointer;
		font-size: 16px;
		font-family: 'Open Sans';
		font-weight: 600;
		color: #202020;
	}

	a {
		text-decoration: blue;
		font-size: 45px;
		display: inline-block;
		/* margin-left: 50px; */
		/* float: left; */
		padding: 10px 16px 10px 10px;
	}

	a:hover {
		background-color: #99e6ff;
		color: black;
	}

	.previous {
		background-color: #99e6ff;
		color: black;
	}
</style>

<html>

<head>
	<title>Cart</title>
	<link rel="stylesheet" type="text/css" href="">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,900" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
	<a href="menu.php" class="previous round">&#8249;</a>

	<div class="CartContainer">
		<div class="Header">
			<h3 class="Heading">Cart</h3>
			<!-- <h5 class="Action">Remove all</h5> -->
		</div>

		<?php
		$count = 0;
		if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1) { //check login
			$userid = $_SESSION['id'];
		}
		// if (isset($_POST['btn-submit'])) {
		// 	$total = $_POST['total'];

		// 	$query = "INSERT INTO carttotal (total, userid) VALUES ('$total','$userid')";
		// 	$rlt = mysqli_query($con, $query);
		// }
		// else{
		// 	$userid = 0;
		// }

		// $qry = "UPDATE cart set subtotal = $subtotal where cart_id = $cart_id";
		// $rlt = mysqli_query($con, $qry);

		$sql = "SELECT * FROM `cart` , food WHERE cart.food_id = food.food_id AND userid = $userid";
		// echo $sql;
		$result = mysqli_query($con, $sql);
		$total = 0;
		while ($row = mysqli_fetch_assoc($result)) {
			$cart_qty = $row['cart_qty'];
			$cart_id = $row['cart_id'];
			// echo '<script>
			// console.log('.$cart_qty.');
			// console.log('.$cart_id.');
			// </script>';
			if ($cart_qty < 1) {
		?>
				<script>
					// var cart_id = document.getElementById($cart_id ?>);
					// var cart_id = $(this).attr("cart_id");
					var cart_id = "<?php echo "$cart_id" ?>";
					// alert(cart_id);
					// remove(cart_id);
					$.ajax({
						method: "POST",
						url: "cartremove.php",
						data: {
							cart_id: cart_id
						},
						success: (response) => {
							console.log(response);
							// console.log(cart_id);
							location.reload();
						}
					})
					alert("The item has been removed!");
				</script>
				<!-- <script>
				alert("Welcome to Geeks for Geeks")
				</script> -->
				<!-- // echo '<script>function remove(cart_id) {
				// 	$.ajax({
				// 			method: "POST",
				// 			url: "cartremove.php",
				// 			data: {cart_id: cart_id},
				// 		success: (response) =>
				// 		{
				// 			console.log(response);
				// 			location.reload();
				// 		}
				// 	});
		
				// }</script>';
				// </script>'; -->
		<?php
			}
			// echo '<input type="hidden" id="cart_id" value="'.$row["cart_id"].'">';
			$subtotal = $row['food_price'] * $row['cart_qty'];
			$total += $subtotal;
			echo '<div class="Cart-Items">
					<div class="image-box">
						<img src="Food/' . $row["food_image"] . '" style={{ height="180px" width="180px"}} />
					</div>
					<div class="about">
						<h4 class="title">' . $row["food_name"] . '</h4>
					</div>
					<div class="counter">
						<div class="btn"><span onclick="increment_quantity(' . $row["cart_id"] . ')"><u>+</u></span></div>
						<div class="count" name="qty">' . $row["cart_qty"] . '</div>
						<div class="btn"><span onclick="decrement_quantity(' . $row["cart_id"] . ')"><u>-</u></span></div>
					</div>
					<div class="prices">

						<div class="amount" name="subtotal">RM ' . number_format($subtotal, 2) . '</div>

						<div class="remove"><span onclick="remove(' . $row["cart_id"] . ')"><u>Remove</u></span></div>
					</div>
	  			</div>';
		}

		echo '<hr> 
			  <div class="checkout">
			  	<div class="total">
					<div class="Subtotal">Total</div>

				  	<div class="total-amount" name="total">RM ' . number_format($total, 2) . '</div>

			  	</div>';
		?>

		<script>
			function increment_quantity(cart_id) {
				$.ajax({
					method: "POST",
					url: "increment_update_cart_quantity.php",
					data: {
						cart_id: cart_id
					},
					success: (response) => {
						console.log(response);
						location.reload();
					}
				});

			}

			function decrement_quantity(cart_id) {
				$.ajax({
					method: "POST",
					url: "decrement_update_cart_quantity.php",
					data: {
						cart_id: cart_id
					},
					success: (response) => {
						console.log(response);
						location.reload();
					}
				});

			}
		</script>

		<script>
			function remove(cart_id) {
				$.ajax({
					method: "POST",
					url: "cartremove.php",
					data: {
						cart_id: cart_id
					},
					success: (response) => {
						// var get = document.getElementsByClassName("Cart-Items")
						console.log(response);
						// document.getElementById("rmv").innerHTML = response;
						location.reload();
					}
				});
				// 	$dlt = "DELETE FROM cart WHERE cart_id =''";

			}
		</script>
		<button class="button" name="btn-submit" onclick="btn()">Check Out</button>
		<script>
			function btn() {
				<?php
				// $qry = "INSERT trans set subtotal = ($total * $foodqty) where cart_id = $cart_id and userid = $userid";
				// $res = mysqli_query($con, $qry);

				// $subtotal = $_POST["subtotal"];
				// $qry = "UPDATE cart set subtotal = ($total * $foodqty) where cart_id = $cart_id and userid = $userid";
				// $res = mysqli_query($con, $qry);

				// $total = $_POST['total'];
				// $query = "INSERT INTO carttotal (total, userid) VALUES ('$total','$userid')";
				// $rlt = mysqli_query($con, $query);
				// echo $total;
				echo	'if (confirm("Do you want proceed to Check Out?\nYour total is RM ' . number_format($total, 2) . '"))
						{
							window.location.href = "transaction.php";
						}
						else
						{
							window.location.href = "cart.php";
						}';
				?>
				// alert("Do you want proceed to Check Out?");

				// if (confirm("Do you want proceed to Check Out?\nYour total is RM$total"))
				// {
				// 	window.location.href = "transaction.php";
				// }
				// else
				// {
				// 	window.location.href = "cart.php";
				// }
			}
		</script>
		<!-- <script>
        if (confirm('Do you want proceed to Check Out?'))
        {
            console.log('Thing was saved to the database.');
        }
        else
        {
            console.log('Thing was not saved to the database.');
        }
    </script> -->
	</div>
</body>

</html>
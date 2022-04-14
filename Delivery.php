<?php
require_once('./php/dbconnect.php');
session_start();
?>

<!DOCTYPE html>
<html>

<head>
	<title>Status</title>

	<link rel="shortcut icon" href="./image/delivery.ico" rel="icon" type="image/x-icon" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		body {
			/* background-color: #C0C0C0; */
			background-image: url("https://foundersguide.com/wp-content/uploads/2019/09/delivery.jpg");
			background-repeat: no-repeat;
			background-size: cover;
			background-attachment: fixed;
		}

		.btn {
			cursor: pointer;
			float: right;
			overflow: auto;
			font-size: 20px;
			font-family: Arial, Helvetica, sans-serif;
			margin-top: 5px;
			text-decoration: none;
			outline: none;
			color: #fff;
			border: none;
			border-radius: 15px;
			box-shadow: 0 9px #999;
		}

		.right j {
			display: block;
			color: #5E6977;
			padding: 15px 15px;
		}

		.btn:hover {
			background-color: #ddd;
			color: black;
		}

		.title {
			text-align: center;
			height: 60px;
			border-bottom: 1px solid #E1E8EE;
			margin-top: 20px;
			padding: 20px 30px;
			color: #5E6977;
			font-size: 30px;
			font-weight: 400;
			color: rgb(207, 207, 207);
			color: #ffe6ff;
			text-shadow: 0 0 0.6rem #ffe6ff, 0 0 1.5rem #ff65bd,
				-0.2rem 0.1rem 1rem #ff65bd, 0.2rem 0.1rem 1rem #ff65bd,
				0 -0.5rem 2rem #ff2483, 0 0.5rem 3rem #ff2483;
			animation: shine 2s forwards, flicker 2s infinite;
		}

		@keyframes blink {

			0%,
			22%,
			36%,
			75% {
				color: #ffe6ff;
				text-shadow: 0 0 0.6rem #ffe6ff, 0 0 1.5rem #ff65bd,
					-0.2rem 0.1rem 1rem #ff65bd, 0.2rem 0.1rem 1rem #ff65bd,
					0 -0.5rem 2rem #ff2483, 0 0.5rem 3rem #ff2483;
			}

			28%,
			33% {
				color: #ff65bd;
				text-shadow: none;
			}

			82%,
			97% {
				color: #ff2483;
				text-shadow: none;
			}
		}

		.flicker {
			animation: shine 2s forwards, blink 3s 2s infinite;
		}

		.fast-flicker {
			animation: shine 2s forwards, blink 2s 1s infinite;
		}

		@keyframes shine {
			0% {
				color: #6b1839;
				text-shadow: none;
			}

			100% {
				color: #ffe6ff;
				text-shadow: 0 0 0.6rem #ffe6ff, 0 0 1.5rem #ff65bd,
					-0.2rem 0.1rem 1rem #ff65bd, 0.2rem 0.1rem 1rem #ff65bd,
					0 -0.5rem 2rem #ff2483, 0 0.5rem 3rem #ff2483;
			}
		}

		@keyframes flicker {
			from {
				opacity: 1;
			}

			4% {
				opacity: 0.9;
			}

			6% {
				opacity: 0.85;
			}

			8% {
				opacity: 0.95;
			}

			10% {
				opacity: 0.9;
			}

			11% {
				opacity: 0.922;
			}

			12% {
				opacity: 0.9;
			}

			14% {
				opacity: 0.95;
			}

			16% {
				opacity: 0.98;
			}

			17% {
				opacity: 0.9;
			}

			19% {
				opacity: 0.93;
			}

			20% {
				opacity: 0.99;
			}

			24% {
				opacity: 1;
			}

			26% {
				opacity: 0.94;
			}

			28% {
				opacity: 0.98;
			}

			37% {
				opacity: 0.93;
			}

			38% {
				opacity: 0.5;
			}

			39% {
				opacity: 0.96;
			}

			42% {
				opacity: 1;
			}

			44% {
				opacity: 0.97;
			}

			46% {
				opacity: 0.94;
			}

			56% {
				opacity: 0.9;
			}

			58% {
				opacity: 0.9;
			}

			60% {
				opacity: 0.99;
			}

			68% {
				opacity: 1;
			}

			70% {
				opacity: 0.9;
			}

			72% {
				opacity: 0.95;
			}

			93% {
				opacity: 0.93;
			}

			95% {
				opacity: 0.95;
			}

			97% {
				opacity: 0.93;
			}

			to {
				opacity: 1;
			}
		}

		.status {
			position: absolute;
			top: 180px;
			left: 2;
		}

		#wcu h2 {
			margin: auto;
			width: 33.33%;
			text-shadow: #eeccff 2px 1px;
			text-align: center;
			padding: 3px;
			font-size: 14pt;
			font-family: Bungee Inline;
			font-weight: bold;
			margin-top: 350px;
		}

		#delivery-name h1 {
			font-family: "OCR A Extended", monospace;
			margin-top: 2px;
			font-size: 18pt;
			font-weight: bold;
			font-style: italic;
		}


		#delivery-image img {
			margin-top: 10px;
			width: 250px;
			height: 200px;
		}

		#delivery td {
			width: 300px;
		}

		.container {
			margin-left: 200px;
			background-color: rgba(255, 255, 255, .8);
			padding: 5px 20px 15px 20px;
			border: 1px solid lightgrey;
			border-radius: 3px;
			margin-top: -50px;
			font-family: "Times New Roman", Times, serif;
			font-size: 16px;
			width: 100%;
		}

		.total {
			text-align: right;
			font-weight: bold;
			font-size: 20px;
		}

		.image {
			margin-top: -30px;
		}

		.text {
			font-style: italic;
			font-weight: bold;
			font-size: 14px;
		}

		.details {
			font-size: 14px;
			font-weight: 500;
		}

		.p1 {
			font-style: italic;
			font-weight: bold;
			font-size: 16px;
		}
	</style>
</head>

<body>
	<div class="title">
		Order Status
	</div>
	<div class="right">
		<button class="btn" onclick="window.location.href='index.php'">
			<j class="fa fa-home"> HOME</j>
		</button>
	</div>
	<div class="status">
		<?php
		if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1) { //check login
			$userid = $_SESSION['id'];
		}

		$sql = "SELECT * FROM trans WHERE userid = $userid ORDER BY transaction_id DESC LIMIT 1";
		$result4 = mysqli_query($con, $sql);
		while ($row = mysqli_fetch_assoc($result4)) {
			$id = $row["transaction_id"];

			echo '<div class="container">
					<p>Delivery ID          : ' . $id . '</p>
					<p>Delivery Date          : ' . $row["transaction_date"] . '</p>
					<p>Delivery Time          : ' . $row["transaction_time"] . '</p>
					<p>Estimate Delivery Time : ' . $row["e_d_time"] . '</p>
					<p>Delivery Status        : ' . $row["delivery_status"] . '</p>
					<p>Delivery Address       : ' . $row["Trans_Address"] . ',' . $row["City"] . ',' . $row["Zip"] . ',' . $row["Trans_State"] . '</p>';
			echo '<hr>';
			echo '<pre>';
			echo '<div class = "text">';
			echo "Item\t\t\tQuantity\t\t\tPrice(Quantity)\t\t\tSubtotal";
			echo '</div>';
			echo '</pre>';
			// echo '</div>';
		}

		$total = 0;
		$sql1 = "SELECT * from real_cart WHERE transaction_id = $id";
		$result5 = mysqli_query($con, $sql1);
		while ($row = mysqli_fetch_assoc($result5)) {
			$qty = $row["cart_qty"];
			$oriprice = $row["ori_price"];
			$subtotal = $row["cart_qty"] * $row["ori_price"];
			$total += $row["subtotal"];
			$food_id = $row['food_id'];

			$sql2 = "SELECT * FROM food WHERE food_id = $food_id";
			$result6 = mysqli_query($con, $sql2);

			while ($row = mysqli_fetch_array($result6)) {

				$food_name = $row['food_name'];
				$food_image = $row['food_image'];

		?>
				<tr>
					<td>
						<?php
						if ($food_image == "") {
							echo "<div class='error'>Image not added.</div>";
						} else {
						?>
							<?php echo '<pre>';
							echo '<div class = "details">';
							echo "\t\t\t$qty\t\t\t\t", "RM " . number_format($oriprice, 2) . "\t\t\t", "RM " . number_format($subtotal, 2) . "";
							echo '</div>';
							echo '</pre>';
							?>
							<div class="image">
								<img src="Food/<?php echo $food_image; ?>" style={{ height="100px" width="100px"}}>
							</div>
						<?php
						}
						?>
					</td>
					<td>
						<p class="p1"><?php echo $food_name ?></p>
					</td>
				</tr>
		<?php
			}
		}
		echo '<hr>';
		echo '<div class = "total">
					Total : RM ' . number_format($total, 2) . '
				</div>';
		echo '<hr>';
		echo '</div>';
		?>
	</div>
	<!-- <script>
		var userid = $("#userid").val();
            $.ajax({
                method: "POST",
                url: "pdf.php",
                data: {userid: userid},
            success: (response) =>
            { 
                response();
            }
            });

		function response()
		{
			window.alert("Payment successful! \nWe have sent an invoice to your email.");
			// window.location.href = "index.php";
		}
	</script> -->
</body>

</html>
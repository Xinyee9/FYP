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
			background-color: #C0C0C0;
		}

		.btn {
			cursor: pointer;
			float: right;
			overflow: auto;
			font-size: 20px;
			font-family: Arial, Helvetica, sans-serif;
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
			height: 60px;
			border-bottom: 1px solid #E1E8EE;
			margin-top: 20px;
			padding: 20px 30px;
			color: #5E6977;
			font-size: 30px;
			font-weight: 400;
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
			if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1)
			{ //check login
				$userid = $_SESSION['id'];
			}

			// $qqqqq = "SELECT * FROM real_cart, trans WHERE real_cart.transaction_id = trans.transaction_id and real_cart.userid = $userid and trans.userid = $userid";
			// $rrrlll = mysqli_query($con, $qqqqq);
			// while ($row = mysqli_fetch_assoc($rrrlll))
			// {
			// 	$real_cart_id = $row["real_cart_id"];
			// 	$trans_id = $row["transaction_id"];
			// 	// echo $real_cart_id;
			// 	// echo $trans_id;
			// 	$que = "UPDATE real_cart set transaction_id = $trans_id where real_cart_id = $real_cart_id AND userid = $userid";
			// 	$rltt = mysqli_query($con, $que);

			// 	// $qq = "SELECT * FROM trans where userid = $userid";
			// 	// $rl = mysqli_query($con, $qq);
			// 	// // $trans_id = $_POST["transaction_id"];
			// 	// while ($row = mysqli_fetch_assoc($rl))
			// 	// {
			// 	// 	$trans_id = $row["transaction_id"];
			// 	// 	// UPDATE real_cart set transaction_id = 60 where real_cart_id = 37 and userid = 1;
			// 	// 	$que = "UPDATE real_cart set transaction_id = $trans_id where real_cart_id = $real_cart_id AND userid = $userid";
			// 	// 	$rltt = mysqli_query($con, $que);
			// 	// }
			// }

			// include 'transaction.php';
			$query = "SELECT * FROM `real_cart` where userid = $userid";
			$result = mysqli_query($con, $query);
			while ($row = mysqli_fetch_assoc($result))
			{
				$real_cart_id = $row["real_cart_id"];
			}
			$query1 = "SELECT * FROM `real_cart` where real_cart_id = $real_cart_id and userid = $userid";
			$result1 = mysqli_query($con, $query1);
			while ($row = mysqli_fetch_assoc($result1))
			{
				// $real_cart_id = $row["real_cart_id"];

				$query2 = "SELECT * FROM trans where userid = $userid";
				$result2 = mysqli_query($con, $query2);
				// $trans_id = $_POST["transaction_id"];
				while ($row = mysqli_fetch_assoc($result2))
				{
					$trans_id = $row["transaction_id"];
					// echo $trans_id;
					// echo $real_cart_id;
					// UPDATE real_cart set transaction_id = 60 where real_cart_id = 37 and userid = 1;
					$query3 = "UPDATE real_cart set transaction_id = $trans_id where real_cart_id = $real_cart_id AND userid = $userid";
					// $que = "UPDATE real_cart SET transaction_id = CONCAT(transaction_id, ' ', '$trans_id') WHERE userid = $userid";
					$result3 = mysqli_query($con, $query3);
				}
			}

			// $qq = "SELECT * FROM trans where userid = $userid";
			// $rl = mysqli_query($con, $qq);
			// // $trans_id = $_POST["transaction_id"];
			// while ($row = mysqli_fetch_assoc($rl))
			// {
			// 	$trans_id = $row["transaction_id"];
			// 	// UPDATE real_cart set transaction_id = 60 where real_cart_id = 37 and userid = 1;
			//     $que = "UPDATE real_cart set transaction_id = $trans_id where userid = $userid";
			//     $rltt = mysqli_query($con, $que);
			// }

			$sql = "SELECT * FROM trans WHERE userid = $userid ORDER BY transaction_id DESC LIMIT 1";
			$result4 = mysqli_query($con, $sql);
			while ($row = mysqli_fetch_assoc($result4))
			{
				$id = $row["transaction_id"];

				echo '<p>Delivery ID          : '.$id.'</p>
					<p>Delivery Date          : '.$row["transaction_date"].'</p>
					<p>Delivery Time          : '.$row["transaction_time"].'</p>

					<p>Estimate Delivery Time : '.$row["e_d_time"].'</p>
					<p>Delivery Status        : '.$row["delivery_status"].'</p>
					<p>Delivery Address       : '.$row["Trans_Address"].','.$row["City"].','.$row["Zip"].','.$row["Trans_State"].'</p>';
					echo '<hr>';
					echo '<pre>';
					echo "Item\t\t\tQuantity\t\t\tPrice(Quantity)\t\t\tSubtotal";
					echo '</pre>';
			}
			
			$total = 0;
			$sql1 = "SELECT * from real_cart WHERE transaction_id = $id and userid = $userid";
			$result5 = mysqli_query($con, $sql1);
			while ($row = mysqli_fetch_assoc($result5)) {
				$qty = $row["cart_qty"];
				$oriprice = $row["ori_price"];
				$subtotal = $row["cart_qty"]*$row["ori_price"];
				$total += $row["subtotal"];
				$food_id = $row['food_id'];
				
				$sql2 = "SELECT * FROM food WHERE food_id = $food_id";
                $result6 = mysqli_query($con, $sql2);
                
                while($row = mysqli_fetch_array($result6))
            	{
                                    
					$food_name = $row['food_name'];
                    $food_image = $row['food_image'];
                                    
                    ?>
						<tr>
                            <td>
								<?php
									if ($food_image == "") 
									{
										echo "<div class='error'>Image not added.</div>";
									} 
									else {
								?>
								<?php echo '<pre>';
									echo "\t\t\t$qty\t\t\t\t","RM ".number_format($oriprice, 2)."\t\t\t","RM ".number_format($subtotal, 2)."";
									echo '</pre>';
								?>
                                    <img src="Food/<?php echo $food_image; ?>" style={{ height="100px" width="100px"}}>
                                <?php
                						}
                                ?>
                            </td>
							<td>
								<p><?php echo $food_name ?></p>
                            </td>
						</tr>
					<?php
				}
			}
			echo 'Total : RM '.number_format($total, 2).'';
		?>
	</div>
</body>
</html>
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

		/* img
	{ 
		width: 30%;
		height: auto;
	}

	.container1
	{
  		position: relative;
		position: absolute;
		bottom: 8px;
		left: 16px;
		font-size: 18px;
	}

	.container2
	{
  		position: relative;
		position: absolute;
		bottom: 8px;
		left: 16px;
	}

	.container3
	{
  		position: relative;
		position: absolute;
		right: 0px;
		bottom: 0px;
	}

	.container1 p
	{
		font-style:italic;
		text-align: center;
	} */

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
	<!-- <form method="POST">
		<?php
			// if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1) { //check login
			// 	$userid = $_SESSION['id'];
			// }
			// $sqli = "SELECT * FROM trans where userid = $userid";
			// $r = mysqli_query($con, $sqli);
			// if(isset($_POST['transaction_id'])){
			// 	$transid = $_POST['transaction_id'];
			// }
		?>
		</form> -->
	<div class="status">
		<?php
		if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1) { //check login
            $userid = $_SESSION['id'];
        }

		$qq = "SELECT * FROM trans where userid = $userid";
        $rl = mysqli_query($con, $qq);
		// $trans_id = $_POST["transaction_id"];
		while ($row = mysqli_fetch_assoc($rl))
        {
			$trans_id = $row["transaction_id"];
			// UPDATE real_cart set transaction_id = 60 where real_cart_id = 37 and userid = 1;
            $que = "UPDATE real_cart set transaction_id = $trans_id where userid = $userid";
            $rltt = mysqli_query($con, $que);
        }
			// $sqli = "SELECT transaction_id FROM trans where userid = $userid";
			// $r = mysqli_query($con, "SELECT transaction_id FROM trans where userid = $userid");
			// if($r && mysqli_num_rows($r)>0)
			// {
			// 	while($row = mysqli_fetch_assoc($r))
			// 	{
			// 		echo 'ID: '.$row["transaction_id"];
			// 		retrieveData($row["transaction_id"]);
			// 	}
			// }
			// function retrieveData($id){
			// 	$result = mysqli_query($con,"SELECT * FROM trans WHERE id=".mysqli_real_escape_string($con,$id));
			// 	if($result && mysqli_num_rows($result)==1){
			// 		$row = mysqli_fetch_assoc($result);
			// 		// echo $row;
			// 	}
			// }
			// $transid = $_POST['transaction_id'];
			// if(isset($_POST['transaction_id'])){
			// 	$transid = $_POST['transaction_id'];
			// }

		// $sqli = "SELECT * FROM `trans` WHERE userid = $userid";
		// $result = mysqli_query($con, $sqli);
		// while ($row = mysqli_fetch_assoc($result)) {
		// 	echo '<p>Delivery Time &nbsp &nbsp &nbsp: '.$row["transaction_time"].'</p>
		// 		<p>Delivery Date &nbsp &nbsp &nbsp: '.$row["transaction_date"].'</p>';
		// }
		// $delivery_id = $row["transaction_id"];
		// $sql = "SELECT * from delivery WHERE userid = $userid";
		// $sql = "SELECT * FROM trans ORDER BY userid = $userid DESC LIMIT 1";
		$sql = "SELECT * FROM trans WHERE userid = $userid ORDER BY transaction_id DESC LIMIT 1";
		$rlt = mysqli_query($con, $sql);
		// $edt = $row["transaction_time"] + 1800;
		while ($row = mysqli_fetch_assoc($rlt)) {
			$id = $row["transaction_id"];
			// $select = "SELECT * from real_cart WHERE transaction_id = $id and userid = $userid";
			// $rrr = mysqli_query($con, $select);
			// while ($row = mysqli_fetch_assoc($rrr)) {
			// 	$qty = $row["cart_qty"];
			// 	$oriprice = $row["ori_price"];
			// 	$stotal = $row["cart_qty"]*$row["ori_price"];
			// 	$tt += $stotal;
			// 	// <p>Item\t\t\tQuantity\t\t\tPrice(Quantity)\t\t\tSubtotal: '.$id.','.$oriprice.','.$stotal.','.$tt.'</p>
			// }

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
				// echo 'Total : RM ';

			// echo '<p>Delivery ID : '.$row["cart_qty"].','.$row["food_id"].','.$row["user_id"].'</p>';
		}
		$tt = 0;
			$select = "SELECT * from real_cart WHERE transaction_id = $id and userid = $userid";
			$rrr = mysqli_query($con, $select);
			while ($row = mysqli_fetch_assoc($rrr)) {
				$qty = $row["cart_qty"];
				$oriprice = $row["ori_price"];
				$stotal = $row["cart_qty"]*$row["ori_price"];
				$tt += $row["subtotal"];
				$food_id = $row['food_id'];
				
				$sql2 = "SELECT * FROM food WHERE food_id = $food_id";
                $res2 = mysqli_query($con, $sql2);
                
                while($row = mysqli_fetch_array($res2))
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
									echo "\t\t\t$qty\t\t\t\t","RM ".number_format($oriprice, 2)."\t\t\t","RM ".number_format($stotal, 2)."";
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
				// echo '<p>Item Quantity Price(Quantity) Subtotal</p>';
				// echo '<pre>';
				// echo "\t\t\t$qty\t\t\t\t","RM ".number_format($oriprice, 2)."\t\t\t","RM ".number_format($stotal, 2)."";
				// echo '</pre>';
				// echo 'Total : RM '.$tt.'';
			}
			echo 'Total : RM '.number_format($tt, 2).'';
			// $slt = "SELECT * FROM real_cart WHERE transaction_id = $id and userid = $userid";
			// $rrrr = mysqli_query($con, $slt);
			// while ($row = mysqli_fetch_assoc($rrrr)) {
			// 	// $stotal = $row["subtotal"];
			// 	$total = $total + $row["subtotal"];
			// 	echo 'Total : RM '.number_format($total, 2).'';
			// }
		?>
		<!-- <p>Delivery Time &nbsp &nbsp &nbsp: </p>
		<p>Delivery Date &nbsp &nbsp &nbsp: </p> -->
		<!-- <p>Delivery Status &nbsp &nbsp: </p>
		<p>Delivery Address : <br><textarea name="address" placeholder="Please enter your dellivery address here" rows="5" cols="30"></textarea></p> -->
	</div>
	<!-- <div class="container1">
		<p>Why choose us?</p>
		<p>Fast Delivery</p>
		<p>Delivery in Time</p>
		<p>Responsibility Rider</p>
		<img src="delivery1.jpg" alt="" width="300" height="300">
	</div>
	<div class="container2">
		<img src="delivery2.jpg" alt="" width="300" height="300">
	</div>
	<div class="container3">
		<img src="delivery3.jpeg" alt="" width="300" height="300">
	</div> -->

	<!-- <div id="wcu">
		<h2>Why choose us?</h2>
	</div>

	<table id="delivery" align="center" cellpadding="15px" cellspacing="20px">
		<tr>
			<td>
				<div id="delivery-name">
					<h1>Fast Delivery</h1>
				</div>
				<div id="delivery-image"><img src="./image/delivery1.jpg"></div>
				<br />
				<br />
			</td>

			<td>
				<div id="delivery-name">
					<h1>Delivery in Time</h1>
				</div>
				<div id="delivery-image"><img src="./image/delivery2.jpg"></div>
				<br />
				<br />
			</td>

			<td>
				<div id="delivery-name">
					<h1>Responsibility Rider</h1>
				</div>
				<div id="delivery-image"><img src="./image/delivery3.jpeg"></div>
				<br />
				<br />
			</td>
		</tr>
	</table> -->
</body>

</html>
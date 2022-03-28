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
body{
	margin: 0;
	padding: 0;
	background: linear-gradient(to bottom right, #ffe3e3, #FAFCFF);
	height: 100vh;
	display: flex;
	justify-content: center;
	align-items: center;
}

.CartContainer{
	width: 70%;
	height: 90%;
	background-color: #ffffff;
    border-radius: 20px;
    box-shadow: 0px 10px 20px #1687d933;
}

.Header{
	margin: auto;
	width: 90%;
	height: 15%;
	display: flex;
	justify-content: space-between;
	align-items: center;
}

.Heading{
	font-size: 50px;
	font-family: 'Open Sans';
	font-weight: 700;
	color: #2F3841;
}

.Action{
	font-size: 14px;
	font-family: 'Open Sans';
	font-weight: 600;
	color: #E44C4C;
	cursor: pointer;
	border-bottom: 1px solid #E44C4C;
}

.Cart-Items{
	margin: auto;
	width: 90%;
	height: 30%;
	display: flex;
	justify-content: space-between;
	align-items: center;
}
.image-box{
	width: 15%;
	text-align: center;
}
.about{
	height: 100%;
	width: 50%;
}
.title{
	padding-top: 10px;
	line-height: 10px;
	font-size: 32px;
	/* font-size: 150%; */
	font-family: 'Open Sans';
	font-weight: 800;
	color: #202020;
}
.subtitle{
	line-height: 10px;
	font-size: 18px;
	font-family: 'Open Sans';
	font-weight: 600;
	color: #909090;
}

.counter{
	width: 15%;
	display: flex;
	justify-content: space-between;
	align-items: center;
}
.btn{
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
.count{
	font-size: 20px;
	font-family: 'Open Sans';
	font-weight: 600;
	color: #202020;
}

.prices{
	height: 100%;
	text-align: right;
}
.amount{
	padding-top: 20px;
	font-size: 26px;
	font-family: 'Open Sans';
	font-weight: 800;
	color: #202020;
}
.save{
	padding-top: 5px;
	font-size: 14px;
	font-family: 'Open Sans';
	font-weight: 600;
	color: #1687d9;
	cursor: pointer;
}
.remove{
	padding-top: 5px;
	font-size: 14px;
	font-family: 'Open Sans';
	font-weight: 600;
	color: #E44C4C;
	cursor: pointer;
}

.pad{
	margin-top: 5px;
}

hr{
	width: 66%;
	float: right;
	margin-right: 5%;
}
.checkout{
	float: right;
	margin-right: 5%;
	width: 28%;
}
.total{
	width: 100%;
	display: flex;
	justify-content: space-between;
}
.Subtotal{
	font-size: 22px;
	font-family: 'Open Sans';
	font-weight: 700;
	color: #202020;
}
.items{
	font-size: 16px;
	font-family: 'Open Sans';
	font-weight: 500;
	color: #909090;
	line-height: 10px;
}
.total-amount{
	font-size: 36px;
	font-family: 'Open Sans';
	font-weight: 900;
	color: #202020;
}
.button{
	margin-top: 10px;
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
</style>

<html>
<head>
	<title>Cart</title>
	<link rel="stylesheet" type="text/css" href="">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,900" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<!-- <j href="index.php" class="previous round">&#8249;</j> -->
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
		$sql = "SELECT * FROM `cart` , food WHERE cart.food_id = food.food_id AND userid = $userid";
		// echo $sql;
		$result = mysqli_query($con, $sql);
		$total = 0;
		while ($row = mysqli_fetch_assoc($result)) {
			// echo '<input type="hidden" id="cart_id" value="'.$row["cart_id"].'">';
			$subtotal = $row['food_price'] * $row['cart_qty'];
			$total += $subtotal;
			echo '<div class="Cart-Items">
			<div class="image-box">
				<img src="Food/'.$row["food_image"].'" style={{ height="120px" }} />
			</div>
			<div class="about">
				<h4 class="title">'.$row["food_name"].'</h4>
			</div>
			<div class="counter">
				<div class="btn"><span onclick="increment_quantity('.$row["cart_id"].')"><u>+</u></span></div>
				<div class="count">'.$row["cart_qty"].'</div>
				<div class="btn"><span onclick="decrement_quantity('.$row["cart_id"].')"><u>-</u></span></div>
			</div>
			<div class="prices">
				<div class="amount">RM '.$subtotal.'</div>
				<div class="remove"><span onclick="remove('.$row["cart_id"].')"><u>Remove</u></span></div>
			</div>
	  		</div>';
		}

		echo '<hr> 
			  <div class="checkout">
			  <div class="total">
				  <div>
					  <div class="Subtotal">Total</div>
				  </div>
				  <form method="POST">
				  <div class="total-amount" name="total">RM '.$total.'</div>
				  </form>
			  </div>';

			//   <form method="post" action="">
			//   <select name="quantity" class="quantity" onclick="editquantity('.$row["cart_qty"].')">
			// 	  <option if('.$row["cart_qty"].' == 1) value="1">1</option>
			// 	  <option if('.$row["cart_qty"].' == 2) value="2">2</option>
			// 	  <option if('.$row["cart_qty"].' == 3) value="3">3</option>
			// 	  <option if('.$row["cart_qty"].' == 4) value="4">4</option>
			// 	  <option if('.$row["cart_qty"].' == 5) value="5">5</option>
			//   </select>
			//   </form>

			// <td>
            //     <div class="qty">                                                         
            //         <button class="btn-minus" id="minus" onclick="ButtonMinus('.$count.')"><i class="fa fa-minus"></i></button>
            //         <input type="text" disabled id="quantity_'.$count++.'" value="'.$row["cart_qty"].'" onchange="GetValue('.$row["cart_id"].')"">
            //         <button class="btn-plus" onclick="ButtonPlus('.$count.')"><i class="fa fa-plus"></i></button>                                                                
            //     </div>
            // </td>

			// <div class="counter">
			// 	<div class="btn"><span onclick="increment_quantity('.$row["cart_qty"].')"><u>+</u></span></div>
			// 	<div class="count">'.$row["cart_qty"].'</div>
			// 	<div class="btn"><span onclick="decrement_quantity('.$row["cart_qty"].')"><u>-</u></span></div>
			// </div>

		// $result = mysqli_query($con, $sql);
		// $rlt = mysqli_query($con, $qwe);

   	   	// echo "<div class='Cart-Items'></div>
   	   	//   <div class='about'>
   	   	//   	<h1 class='title'>".$_POST['food_name']."</h1>
   	   	//   </div>
   	   	//   <div class='counter'>
   	   	//   	<div class='btn'>+</div>
   	   	//   	<div class='count'>".$_POST['food_quantity']."</div>
   	   	//   	<div class='btn'>-</div>
   	   	//   </div>
   	   	//   <div class='prices'>
   	   	//   	<div class='amount'>RM</div>
   	   	//   	<div class='remove'><u>Remove</u></div>
		// 	<hr> 
   	 	// 	<div class='checkout'>
		// 		<div class='total'>
		// 			<div>";
		// 				while ($row = mysqli_fetch_assoc($result)) {
		// 					echo "<span class='price'>RM ". $row['food_price'] . "</span>";
		// 					$total = $row['food_price'] * $foodqty;
		// 					echo "<div class='Subtotal'><p>Total <span class='price' style='color:black'><b>RM ". $total ."</b></span></p></div>";
		// 				}
		// 				// <!-- <div class='items'>2 foods</div> -->
		// 			echo"</div>
		// 			<div class='total-amount'>RM </div>
		// 		</div>
		// 	</div>
   	  	// </div>
		// ";
		// if (isset($_POST['btn-submit'])) {
		// 	// $total = $_POST['total'];

		// 	$query = "INSERT INTO carttotal (total, userid) VALUES ('$total','$userid')";
		// 	$rlt = mysqli_query($con, $query);
		// }
	?>

	<script>
		function increment_quantity(cart_id) {
			$.ajax({
                    method: "POST",
                    url: "increment_update_cart_quantity.php",
                    data: {cart_id: cart_id},
                success: (response) =>
                {
					console.log(response);
					location.reload();
                }
            });

		}

		function decrement_quantity(cart_id) {
			$.ajax({
                    method: "POST",
                    url: "decrement_update_cart_quantity.php",
                    data: {cart_id: cart_id},
                success: (response) =>
                {
					console.log(response);
					location.reload();
                }
            });

		}
		// function ButtonMinus(count)
        //     {               
        //         var num;
        //         var quantity = [];
        //         for(var i = 0; i < cartItemNumber; i++)
        //         {
        //             quantity[i] = $("#quantity_" + i).val(); 
                                                       
        //         }  
        //         minusQuantity = quantity[count] - 1;
        //         $("#minus").click(function(){
        //             if(minusQuantity == 0)
        //             {
        //                 $("#quantity_" + count).val(1);
        //             }
        //         });
                
        //         // if(minusQuantity == 0)
        //         // {    
        //         //     num = count;
        //         // }  
                

        //         if(minusQuantity == 0)
        //         {
        //             var cartid = [];
        //             cartid = getCartID();                    
        //             window.alert("Item quantity cannot be 0!");
        //             // console.log(num);
                   
        //             // var confirm = window.confirm("Are you sure you want to remove the item?");
        //             // if(confirm == true)
        //             // {
        //             //     removeFromCart(cartid[count]);
        //             // }
        //             // else
        //             // {
        //             //     //do nothing
        //             //     if(minusQuantity == 0)
        //             //     {
        //             //         $("#quantity_" + count).val('1');
        //             //     }
        //             // }
                    
        //         }
        //         else
        //         {
        //             quantity[count] = minusQuantity;
                    
        //             PostQuantity(quantity);
        //         }             
        //     }

        //     function ButtonPlus(count)
        //     {
        //         count = count - 1;
        //         var quantity = [];
        //         for(var i = 0; i < cartItemNumber; i++)
        //         {
        //             quantity[i] = $("#quantity_" + i).val();
        //         }     
                               
        //         addQuantity = parseInt(quantity[count]) + parseInt("1");

        //         quantity[count] = addQuantity;                                             
                                
        //         PostQuantity(quantity);
        //     }

        //     function GetValue(cartid)
        //     {
        //         var quantity = [];
        //         for(var i = 0; i < cartItemNumber; i++)
        //         {
        //             quantity[i] = $("#quantity_" + i).val();
        //         }                               
                
        //         PostQuantity(quantity);
        //     }

        //     function PostQuantity(quantity)
        //     {
        //         allquantity = quantity;
        //     }

        //     function getCartID()
        //     {
        //         var cartID = [];
        //         for(var i = 0; i < cartItemNumber; i++)
        //         {
        //             cartID[i] = $("#cartid_" + i).val();  
        //         }

        //         return cartID;
        //     }

        //     function updateCart()
        //     {
        //         var storageids = [];
        //         var cartID = [];
                
        //         storageids = storageSelected();
        //         cartID = getCartID();

        //         if(cartItemNumber == 0)
        //         {
        //             alert("No item to update!");
        //         }else{
        //             $.ajax({
        //             method: "POST",
        //             url: "update_cart_quantity.php",
        //             data: {quantity: allquantity, updateCartID: cartID},
        //             success: (response) =>
        //             {                 
        //                 var results = response; 
        //                 if(results == "Stock Not Available")
		// 				{
		// 					window.alert("Not Enough Stock. Maximum quantity applied.");
		// 					window.location.href = "cart.php";
		// 				}
		// 				else
		// 				{
		// 					window.alert("Success! Cart updated.");
		// 					window.location.href = "cart.php";
		// 				}
        //             }
        //             });
        //         }

                
        //     }

		// function increment_quantity(cart_qty)
		// {
		// 	var inputQuantityElement = "";
		// 	console.log(inputQuantityElement);

		// 	// var newQuantity = parseInt($(inputQuantityElement).val()) + 1;
		// 	// console.log(newQuantity);
		// 	// save_to_db(cart_qty);
		// }

		// function decrement_quantity(cart_qty)
		// {
		// 	var inputQuantityElement = $(cart_qty);

		// 	if($(inputQuantityElement).val() > 1) 
		// 	{
		// 		var newQuantity = parseInt($(inputQuantityElement).val()) - 1;
		// 		save_to_db(cart_qty);
		// 	}
		// }

		// function save_to_db(cart_qty)
		// {
		// 	var inputQuantityElement = $(cart_qty);

		// 	$.ajax({
		// 		method: "POST",
		// 		url : "update_cart_quantity.php",
		// 		data : {cart_id: cart_id},
		// 		success : (response) =>
		// 		{
		// 			$(inputQuantityElement).val(cart_qty);
		// 			console.log(response);
		// 			location.reload();
		// 		}
		// 	});
		// }

		// function editquantity(cart_qty) {
		// 	$.ajax({
        //             method: "POST",
        //             url: "update_cart_quantity.php",
        //             data: {cart_qty: cart_qty},
        //         success: (response) =>
        //         {
		// 			console.log(response);
		// 			// location.reload();
        //         }
        //     });

		// }
	</script>

	<script>
		// function increment_quantity(count)
        //     {
        //         count = count - 1;
        //         var quantity = [];
        //         for(var i = 0; i < cart_qty; i++)
        //         {
        //             quantity[i] = $("#quantity_" + i).val();
        //         }     
                               
        //         addQuantity = parseInt(quantity[count]) + parseInt("1");

        //         quantity[count] = addQuantity;                                             
                                
        //         PostQuantity(quantity);
        //     }

		// function decrement_quantity(count)
        //     {               
        //         var num;
        //         var quantity = [];
        //         for(var i = 0; i < cart_qty; i++)
        //         {
        //             quantity[i] = $("#quantity_" + i).val(); 
                                                       
        //         }  
        //         minusQuantity = quantity[count] - 1;
        //         $("#minus").click(function(){
        //             if(minusQuantity == 0)
        //             {
        //                 $("#quantity_" + count).val(1);
        //             }
        //         });
                
        //         // if(minusQuantity == 0)
        //         // {    
        //         //     num = count;
        //         // }  
                

        //         if(minusQuantity == 0)
        //         {
        //             var cartid = [];
        //             cartid = getCartID();                    
        //             window.alert("Item quantity cannot be 0!");
        //             // console.log(num);
                   
        //             // var confirm = window.confirm("Are you sure you want to remove the item?");
        //             // if(confirm == true)
        //             // {
        //             //     removeFromCart(cartid[count]);
        //             // }
        //             // else
        //             // {
        //             //     //do nothing
        //             //     if(minusQuantity == 0)
        //             //     {
        //             //         $("#quantity_" + count).val('1');
        //             //     }
        //             // }
                    
        //         }
        //         else
        //         {
        //             quantity[count] = minusQuantity;
                    
        //             PostQuantity(quantity);
        //         }             
        //     }

		// 	function PostQuantity(quantity)
        //     {
        //         allquantity = quantity;
        //     }

		function remove(cart_id) {
			$.ajax({
                    method: "POST",
                    url: "cartremove.php",
                    data: {cart_id: cart_id},
                success: (response) =>
                {
					// var get = document.getElementsByClassName("Cart-Items")
					console.log(response);
					// document.getElementById("rmv").innerHTML = response;
					location.reload();
                }
            });
			// 	$dlt = "DELETE FROM cart WHERE cart_id =''";

		}
	</script>
   	<!-- //    <div class="Cart-Items pad">
   	//    	  <div class="image-box">
   	//    	  	<img src="" style={{ height="120px" }} />
   	//    	  </div>
   	//    	  <div class="about">
   	//    	  	<h1 class="title"></h1>
   	//    	  </div>
   	//    	  <div class="counter">
   	//    	  	<div class="btn">+</div>
   	//    	  	<div class="count">1</div>
   	//    	  	<div class="btn">-</div>
   	//    	  </div>
   	//    	  <div class="prices">
   	//    	  	<div class="amount">RM</div>
   	//    	  	<div class="remove"><u>Remove</u></div>
   	//    	  </div> -->
   	   <!-- </div> -->
   	 <!-- <hr> 
   	 <div class="checkout">
   	 <div class="total">
   	 	<div>
   	 		<div class="Subtotal">Total</div>
   	 		<div class="items">2 foods</div>
   	 	</div>
   	 	<div class="total-amount">RM </div>
   	 </div> -->
        <!-- <button onclick="btn()">Check Out</button>
        <script>
            function btn()
            {
                alert("Do you want proceed to Check Out?");
            }
        </script> -->
   	 <!-- <button class="button"><a href="transaction.php">Check Out</button></div> -->
		<button class="button" name="btn-submit" onclick="btn()">Check Out</button>
		<script>
            function btn()
            {
				<?php
						$query = "INSERT INTO carttotal (total, userid) VALUES ('$total','$userid')";
						$rlt = mysqli_query($con, $query);
				echo	'if (confirm("Do you want proceed to Check Out?\nYour total is RM '.$total.'"))
						{
							window.location.href = "transaction.php";
						}
						else
						{
							window.location.href = "cart.php";
						}';
				?>
                // alert("Do you want proceed to Check Out?");

				// if (confirm("Do you want proceed to Check Out?\nYour total is RM<?php $total ?>"))
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
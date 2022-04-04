<?php
require_once('./php/dbconnect.php');

session_start();

if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1) { //check login
    $userid = $_SESSION['id'];
}

$sql = "SELECT * FROM `cart` WHERE userid = $userid";
$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_assoc($result))
{
    $cart_qty = $row["cart_qty"];
    $price = $row["ori_price"];
    $sub = $row["subtotal"];
    $food_id = $row["food_id"];

    $insert = "INSERT INTO real_cart (cart_qty, ori_price, subtotal, food_id, userid) VALUES ('$cart_qty','$price','$sub','$food_id','$userid')";
    $r = mysqli_query($con, $insert);
    if($r)
    {
        $dlt = "DELETE FROM cart WHERE userid = $userid";
        $re = mysqli_query($con, $dlt);

        $qqqq = "SELECT * FROM `real_cart` where userid = $userid";
        $rrll = mysqli_query($con, $qqqq);
        while ($row = mysqli_fetch_assoc($rrll))
        {
            $real_cart_id = $row["real_cart_id"];
        }
    }
}

if (isset($_POST['btn-submit'])) {
    // echo '<script>alert("Thank You for your order! Your payment is SUCCESSFUL!");</script>';
    // $message = $_POST['message'];
    $fullname = $_POST['firstname'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $date = date('Y-m-d');
    $time = date('h:i:sa');
    $timet = date('h:i:sa', strtotime('+30 minutes', strtotime($time)));
    // $status = $_POST['status'];

    // $qry = "UPDATE trans set delivery_status = 'Preparing' where userid = $userid";
    // $rlt = mysqli_query($con, $qry);

    // $qqqq = "SELECT * FROM `real_cart` where userid = $userid";
	// $rrll = mysqli_query($con, $qqqq);
	// while ($row = mysqli_fetch_assoc($rrll))
	// {
	// 	$real_cart_id = $row["real_cart_id"];

    //     $query = "INSERT INTO trans (transaction_date, transaction_time, e_d_time, Full_Name, Trans_Address, City, Trans_State, Zip, real_cart_id, userid) VALUES ('$date','$time','$timet','$fullname','$address','$city','$state','$zip','$real_cart_id','$userid')";
    //     $result = mysqli_query($con, $query);
    //     if ($result) {
    //         // $rl = "SELECT * FROM trans where userid = $userid";
    //         // mysqli_query($con, $rl);

    //         // $trans_id = $row["transaction_id"];

    //         // if($rl)
    //         // {
    //         //     $rr = "UPDATE real_cart set transaction_id = $trans_id where userid = $userid";
    //         //     mysqli_query($con, $rr);
    //         // }
    //         // echo '<script>alert("Thank You for your order! Your payment is SUCCESSFUL!");</script>';
    //         $qry = "UPDATE trans set delivery_status = 'Order Confirm' where userid = $userid";
    //         $rlt = mysqli_query($con, $qry);
    //         header("Location: delivery.php");
    //     }
    // }

    $query = "INSERT INTO trans (transaction_date, transaction_time, e_d_time, Full_Name, Trans_Address, City, Trans_State, Zip, userid) VALUES ('$date','$time','$timet','$fullname','$address','$city','$state','$zip','$userid')";
    $result = mysqli_query($con, $query);
    if ($result) {
        // $rl = "SELECT * FROM trans where userid = $userid";
        // mysqli_query($con, $rl);

        // $trans_id = $row["transaction_id"];

        // if($rl)
        // {
        //     $rr = "UPDATE real_cart set transaction_id = $trans_id where userid = $userid";
        //     mysqli_query($con, $rr);
        // }
        // echo '<script>alert("Thank You for your order! Your payment is SUCCESSFUL!");</script>';
        $qry = "UPDATE trans set delivery_status = 'Order Confirm' where userid = $userid";
        $rlt = mysqli_query($con, $qry);
        header("Location: delivery.php");
    }

    // if ($result) {
    //     // $to = $email;
    //     // $subject = "Thank You for Contacting Us";
    //     // $message = "Your information has been received. Just a moment, our team will get back to you as soon as possible.\n\n";
    //     // $message .= "<br/>\nBest regards,<br/>Aurora Team";

    //     // $headers = "From: Aurora Admin <auroracutie2022@gmail.com>\r\n";
    //     // $headers .= "Reply-To: auroracutie2022@gmail.com\r\n";
    //     // $headers .= "Content-type: text/html\r\n";
    //     // $headers .= "MIME-Version: 1.0\r\n";

    //     // if ($subject) {
    //     echo'<script>
    //     function input() {
    //         window.alert("Thank You for your order! Your payment is SUCCESSFUL!");

    //         display();

    //         // showAlert();
    //     }

    //     function display() {
    //         window.location.href = "delivery.php";
    //     }
    // </script>';
    //     // }
    // }
}

// if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1) { //check login
//         $userid = $_SESSION['id'];
//     }
// if (isset($_POST["foodcode"])) {
//     echo "
//     <script>
//     console.log('" . $_POST["foodcode"] . "');
//     console.log('" . $_POST["foodquantity"] . "');
//     </script>
//     ";
// }
// session_start();
// require_once('./php/dbconnect.php');
// if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1) { //check login
//     $userid = $_SESSION['id'];
// }

// if (isset($_POST['btn-submit'])) {
//     // $name = $_POST['fname'];
//     // $cardname = $_POST['cname'];
//     // $email = $_POST['email'];
//     // $card_exp_year = $_POST['expyear'];
//     // $address = $_POST['address'];
//     // $city = $_POST['city'];
//     // $state = $_POST['state'];
//     // $zip = $_POST['zip'];
//     // $card_exp_month = $_POST['expmonth'];
//     // $cvv = $_POST['cvv'];

//     // date_default_timezone_set("Asia/Kuala_Lumpur");
//     // $datetime = date('Y-m-d h:i:sa');

//     // $query = "INSERT INTO trans (transactiondatetime, userid) VALUES ('$datetime', '$userid')";
//     // $result = mysqli_query($con, $query);

//     // date_default_timezone_set("Asia/Kuala_Lumpur");
//     // $date = date('Y-m-d');
//     // // $time = date('h:i:sa');

//     // // echo 'abc';

//     // // $sql = "INSERT INTO trans (transaction_date, transaction_time, userid) VALUES ($date, $time, $userid)";
//     // $result = mysqli_query($con, "INSERT INTO trans (transaction_date, userid) VALUES ($date, $userid)");
//     // if($result)
//     // {
//     //     echo '<span onclick="input()"></span>';
//     // }

//     // if($result)
//     // {
//     //     echo "<input type='button' name='btn-submit' value='Submit and Pay' class='btn' onclick='input()'>";
//     // }

//     // $query = "INSERT INTO `transaction` (tran_date, tran_time, tran_name, tran_email ,tran_card_expiry_year, tran_address, tran_city, tran_card_name, tran_state, tran_zip, tran_card_expiry_month, tran_card_cvv) VALUE ('$date','$time','$name','$email','$card_exp_year','$address','$city','$cardname','$state','$zip','$card_exp_month','$cvv')";
//     // $result = mysqli_query($con, $query);

//     // if ($result)
//     // {
//     //     echo "<script>
//     //     alert('Thank You for your order! Your payment is SUCCESSFUL!');
//     //     window.location.href='./delivery.php';
//     //     </script>";
//     // }
// }
?>

<!DOCTYPE html>

<html>

<head>
    <title>Payment</title>

    <link rel="shortcut icon" href="./image/transaction.ico" rel="icon" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .header {
            padding: 30px;
            text-align: center;
            background-color: rgba(255, 255, 255, .5);
        }

        body {
            background-image: url("./image/transaction.png");
            /* filter: brightness(125%); */
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            position: relative;
            font-family: Arial;
            font-size: 17px;
            padding: 8px;
        }

        * {
            box-sizing: border-box;
        }

        .row {
            display: -ms-flexbox;
            /* IE10 */
            display: flex;
            -ms-flex-wrap: wrap;
            /* IE10 */
            flex-wrap: wrap;
            margin: 0 -16px;
        }

        .col-25 {
            -ms-flex: 25%;
            /* IE10 */
            flex: 25%;
        }

        .col-50 {
            -ms-flex: 50%;
            /* IE10 */
            flex: 50%;
        }

        .col-75 {
            -ms-flex: 75%;
            /* IE10 */
            flex: 75%;
        }

        .col-25,
        .col-50,
        .col-75 {
            padding: 0 16px;
        }

        .container {
            background-color: rgba(255, 255, 255, .8);
            padding: 5px 20px 15px 20px;
            border: 1px solid lightgrey;
            border-radius: 3px;
        }

        input[type=text] , input[type=password]{
            width: 100%;
            margin-bottom: 20px;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        label {
            margin-bottom: 10px;
            display: block;
        }

        .icon-container {
            margin-bottom: 20px;
            padding: 7px 0;
            font-size: 24px;
        }

        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 12px;
            margin: 10px 0;
            border: none;
            width: 100%;
            border-radius: 3px;
            cursor: pointer;
            font-size: 17px;
        }

        .btn:hover {
            background-color: #45a049;
        }

        a {
            color: #2196F3;
        }

        hr {
            border: 1px solid lightgrey;
        }

        span.price {
            float: right;
            color: grey;
        }

        @media (max-width: 800px) {
            .row {
                flex-direction: column-reverse;
            }

            .col-25 {
                margin-bottom: 20px;
            }
        }

        a {
            text-decoration: none;
            display: inline-block;
            padding: 8px 16px;
            border: 1px solid;
            color: black;
        }

        a:hover {
            background-color: #ddd;
            color: white;
        }
    </style>
</head>

<body>
    <div class="header">
        <div id="title">
            <h1>&#127800; WELCOME TO Aurora Restaurant &#127800;</h1>
        </div>
    </div>
    <p align="right">
        <!-- <button href="menu.php">
            Back</button> -->
        <!-- <button onclick="menu.php">Back</button> -->
        <button onclick="window.location.href='cart.php'">Back</button>
    </p>
    <h2>Transaction</h2>
    <div class="row">
        <div class="col-75">
            <div class="container">
                <form method="POST">
                    <div class="row">
                        <div class="col-50">
                            <h3>Delivery Address</h3>
                            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                            <input type="text" id="fname" name="firstname" required id= "firstname" title="Please Enter your name" placeholder="Joshua">
                            <label for="email"><i class="fa fa-envelope"></i> Email</label>
                            <input type="text" id="email" name="email" required id="email" placeholder="example@gmail.com">
                            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                            <input type="text" id="adr" name="address" required id="address" placeholder="123 Jalan D1">
                            <label for="city"><i class="fa fa-institution"></i> City</label>
                            <input type="text" id="city" name="city" required id="city" placeholder="Ayer Keroh">

                            <div class="row">
                                <div class="col-50">
                                    <label for="state">State</label>
                                    <input type="text" id="state" name="state" required id="state" placeholder="Malacca">
                                </div>
                                <div class="col-50">
                                    <label for="zip">Zip</label>
                                    <input type="text" id="zip" name="zip" required id="zip" placeholder="75450">
                                </div>
                            </div>
                        </div>

                        <div class="col-50">
                            <h3>Payment</h3>
                            <label for="fname">Accepted Cards</label>
                            <div class="icon-container">
                                <i class="fa fa-cc-visa" style="color:navy;"></i>
                                <i class="fa fa-cc-amex" style="color:blue;"></i>
                                <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                <i class="fa fa-cc-discover" style="color:orange;"></i>
                            </div>
                            <label for="cname">Cardholder Name</label>
                            <input type="text" id="cname" name="cardname" required id="cardname" pattern="[A-Z].{3,}" title="Please enter capital letter for your card FULL NAME" placeholder="JOSHUA">
                            <label for="ccnum">Card number</label>
                            <input type="text" id="ccnum" name="cardnumber" required id="cardnumber" minlength="16" maxlength= "16" placeholder="1234123412341234">
                            <label for="expmonth">Exp Month</label>
                            <input type="text" id="expmonth" name="expmonth" required id="expmonth" pattern="[A-Za-z]{3,}" title="Please enter the correct month" placeholder="April">
                            <div class="row">
                                <div class="col-50">
                                    <label for="expyear">Exp Year</label>
                                    <input type="text" id="expyear" name="expyear" required id="expyear" minlength="4" maxlength= "4" placeholder="2022">
                                </div>
                                <div class="col-50">
                                    <label for="cvv" >CVV<i class="fa fa-eye" id="eye" onclick="ShowCVV();"></i></label>
                                    <input type="password" id="cvv" name="cvv" required id="cvv" minlength="3" maxlength= "3" placeholder="888">
                                </div>
                            </div>
                        </div>

                        <!-- <form method="POST" name="status">echo 'Preparing'</form> -->

                    </div>
                    <label>
                        <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
                    </label>

                    <!-- // $dt1 = date("Y-m-d");
                        // $dt2 = date("Y-m-d H:i:s");

                        // $sql = "INSERT INTO transaction(tran_date) VALUES ('$dt1', '$dt2')";
                        // if(isset($_POST['btn']))
                        // {
                        //     $date_clicked = date('Y-m-d H:i:s');
                        //     $sql = "INSERT INTO transaction(tran_date) VALUE $date_clicked";
                        // } -->

                    <!-- <input type="button" name="btn-submit" value="Submit and Pay" class="btn" onclick="input()"> -->
                    <input type="submit" name="btn-submit" value="Submit and Pay" class="btn" onclick="input()">
                </form>
            </div>
        </div>

    </div>
    <script>
        // function ValidateCard()
        // {
        //     let isValidCardHolderName = false;
        //     let isValidCreditDebitCard   = false;
        //     let isValidCVV = false;
        //     let isValidCardPlatform = false;
        //     let isValidDate = false;

        //     var name = $("#cardHolderName").val();
        //     var card = $("#creditDebitCardNum").val();
        //     var cvv = $("#bankCVV").val();
        //     var cardplatform = $("#creditDebitPlatform").val();
        //     var date = $("#startDate").val();

        //     var numbers = /^[0-9]+$/;
        //     var letters = /^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/;
        //     // var cardno = /^(?:4[0-9]{12}(?:[0-9]{3})?)$/;
        //     // var masterno = /^(?:5[1-5][0-9]{14})$/;
        //     var cardno =/^4[0-9]{12}(?:[0-9]{3})?$/;
        //     var masterno = /^(5[1-5][0-9]{14}|2(22[1-9][0-9]{12}|2[3-9][0-9]{13}|[3-6][0-9]{14}|7[0-1][0-9]{13}|720[0-9]{12}))$/;

        //     if(cardplatform == 0)
        //     {
        //         $("#errorcreditdebit").show();
        //         $('#errorcreditdebit').attr("style", "display: inline !important; color: red;");
        //         isValidCardPlatform = false;
        //     }
        //     else
        //     {
        //         $("#errorcreditdebit").hide();
        //         isValidCardPlatform = true;
        //     }

        //     if(date == "")
        //     {
        //         $("#errorexpirydate").show();
        //         $('#errorexpirydate').attr("style", "display: inline !important; color: red;");
        //         isValidDate = false;
        //     }
        //     else
        //     {
        //         $("#errorexpirydate").hide();
        //         isValidDate = true;
        //     }
                
        //     if(name == "")
        //     {
        //         $("#errorcardholder").text("The Name field is required!");
        //         $("#errorcardholder").show();
        //         $('#errorcardholder').attr("style", "display: inline !important; color: red;");
        //         isValidCardHolderName = false;
        //     }
        //     else
        //     {
        //         if(name.match(letters) && name != "")
        //         {
        //             $("#errorcardholder").hide();
        //             isValidCardHolderName = true;
        //         }
        //         else
        //         {
        //             if(name == "")
        //             {
        //                 $("#errorcardholder").text("The Name field is required!");
        //                 $("#errorcardholder").show();
        //                 $('#errorcardholder').attr("style", "display: inline !important; color: red;");
        //                 isValidCardHolderName = false;
        //             }
        //             else if(!(name.match(letters)))
        //             {
        //                 $("#errorcardholder").text("Invalid cardholder name format");
        //                 $("#errorcardholder").show();
        //                 $('#errorcardholder').attr("style", "display: inline !important; color: red;");
        //                 isValidCardHolderName = false;
        //             }
        //         }
        //     }

        //     if(card == "")
        //     {
        //         $("#errorcardno").text("The Credit / Debit Card field is required!");
        //         $("#errorcardno").show();
        //         $('#errorcardno').attr("style", "display: inline !important; color: red;");
        //         isValidCreditDebitCard = false;
        //     }
        //     else
        //     {
        //         if(!card.match(numbers))
        //         {
        //             $("#errorcardno").text("Invalid format, input numbers only!");
        //             $("#errorcardno").show();
        //             $('#errorcardno').attr("style", "display: inline !important; color: red;");
        //             isValidCreditDebitCard = false;
        //         }
        //         else
        //         {
        //             if(card.match(cardno)||card.match(masterno) && card != "")
        //             {
        //                 $("#errorcardno").hide();
        //                 isValidCreditDebitCard = true;
        //             }
        //             else
        //             {
        //                 if(card == "")
        //                 {
        //                     $("#errorcardno").show();
        //                     $('#errorcardno').attr("style", "display: inline !important; color: red;");
        //                     isValidCreditDebitCard = false;
        //                 }
        //                 else if(!card.match(cardno) || !card.match(masterno))
        //                 {
        //                     $("#errorcardno").text("Invalid Card Number format.");
        //                     $("#errorcardno").show();
        //                     $('#errorcardno').attr("style", "display: inline !important; color: red;");
        //                     isValidCreditDebitCard = false;

        //                     if(card.match(/^4/))
        //                     {
        //                         $("#errorcardno").text("Invalid Visa Card Number format.");
        //                         $("#errorcardno").show();
        //                         $('#errorcardno').attr("style", "display: inline !important; color: red;");
        //                         isValidCreditDebitCard = false;
        //                     }
        //                     else if(card.match(/^5/))
        //                     {
        //                         $("#errorcardno").text("Invalid Master Card Number format.");
        //                         $("#errorcardno").show();
        //                         $('#errorcardno').attr("style", "display: inline !important; color: red;");
        //                         isValidCreditDebitCard = false;
        //                     }
                            
        //                 }
        //             }
        //         }
                
        //     }
        //     if(cvv == "")
        //     {
        //         $("#errorcardcvv").text("The CVV field is required!");
        //         $("#errorcardcvv").show();
        //         $('#errorcardcvv').attr("style", "display: inline !important; color: red;");
        //         isValidCVV = false;
        //     }
        //     else
        //     {
        //         if(cvv.match(numbers) && cvv != "")
        //         {
        //             $("#errorcardcvv").hide();
        //             isValidCVV = true;
        //         }
        //         else
        //         {
        //             if(cvv == "")
        //             {
        //                 $("#errorcardcvv").show();
        //                 $('#errorcardcvv').attr("style", "display: inline !important; color: red;");
        //                 isValidCVV = false;
        //             }
        //             else if(!(cvv.match(numbers)))
        //             {
        //                 $("#errorcardcvv").text("Invalid CVV format");
        //                 $("#errorcardcvv").show();
        //                 $('#errorcardcvv').attr("style", "display: inline !important; color: red;");
        //                 isValidCVV = false;
        //             }
        //         }
        //     }

        //     if(isValidCardHolderName && isValidCreditDebitCard && isValidCVV && isValidCardPlatform && isValidDate)
        //     {
        //         return true;            
        //     }
        //     else
        //     {
        //         return false;
        //     }
        // }

        function ShowCVV()
        {
            var cvv = document.getElementById("cvv");

            if (cvv.type === "password") {
                cvv.type = "text";
                document.getElementById("eye").className = "fa fa-eye-slash";
            } else {
                cvv.type = "password";
                document.getElementById("eye").className = "fa fa-eye";
            }
        }

        // function input() {
        //     window.alert("Thank You for your order! Your payment is SUCCESSFUL!");

        //     // display();

        //     // showAlert();
        // }

        // function display() {
        //     window.location.href = "delivery.php";
        // }
    </script>
</body>

</html>
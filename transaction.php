<?php
require_once('./php/dbconnect.php');

session_start();

if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1) { //check login
    $userid = $_SESSION['id'];
}

if (isset($_POST['btn-submit'])) {
    // $message = $_POST['message'];
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $date = date('Y-m-d');
    $time = date('h:i:sa');


    $query = "INSERT INTO trans (transaction_date, transaction_time, userid) VALUES ('$date','$time','$userid')";
    $result = mysqli_query($con, $query);
    if($result)
    {
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

        input[type=text] {
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
                            <input type="text" id="fname" name="firstname" placeholder="Joshua">
                            <label for="email"><i class="fa fa-envelope"></i> Email</label>
                            <input type="text" id="email" name="email" placeholder="example@gmail.com">
                            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                            <input type="text" id="adr" name="address" placeholder="123 Jalan D1">
                            <label for="city"><i class="fa fa-institution"></i> City</label>
                            <input type="text" id="city" name="city" placeholder="Ayer Keroh">

                            <div class="row">
                                <div class="col-50">
                                    <label for="state">State</label>
                                    <input type="text" id="state" name="state" placeholder="Malacca">
                                </div>
                                <div class="col-50">
                                    <label for="zip">Zip</label>
                                    <input type="text" id="zip" name="zip" placeholder="75450">
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
                            <label for="cname">Name on Card</label>
                            <input type="text" id="cname" name="cardname" placeholder="JOSHUA">
                            <label for="ccnum">Card number</label>
                            <input type="text" id="ccnum" name="cardnumber" placeholder="1234123412341234">
                            <label for="expmonth">Exp Month</label>
                            <input type="text" id="expmonth" name="expmonth" placeholder="April">
                            <div class="row">
                                <div class="col-50">
                                    <label for="expyear">Exp Year</label>
                                    <input type="text" id="expyear" name="expyear" placeholder="2022">
                                </div>
                                <div class="col-50">
                                    <label for="cvv">CVV</label>
                                    <input type="text" id="cvv" name="cvv" placeholder="888">
                                </div>
                            </div>
                        </div>

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
        function input() {
            window.alert("Thank You for your order! Your payment is SUCCESSFUL!");

            // display();

            // showAlert();
        }

        // function display() {
        //     window.location.href = "delivery.php";
        // }
    </script>
</body>

</html>
<?php
require_once('./php/dbconnect.php');
session_start();

// $food_id = $_POST['food_id'];
?>
<!DOCTYPE html>
<html>

<head>
    <title>MENU</title>

    <link rel="shortcut icon" href="./image/menu.ico" rel="icon" type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&family=Bubblegum+Sans&family=Creepster&family=Fredericka+the+Great&family=Indie+Flower&family=Sigmar+One&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
</head>

<body>

    <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

    <div class="header">
        <div id="title">
            <h1>&#127800; WELCOME TO Aurora Restaurant &#127800;</h1>
        </div>
        <br />
        <div id="title">
            <h1>&#127800; MENU &#127800;</h1>
        </div>

    </div>

    <div id="menu">FOOD &#127812;</div>

    <a href="index.php" class="previous round">&#8249;</a>

    <form action="iteminfo.php" name="toSubmit" method="post">
        <input type="hidden" name="food_price" value="">
        <input type="hidden" name="food_id" value="">
        <input type="hidden" name="food_quantity" value="" id="food_quantity">
    </form>

    <table id="food" align="center" cellpadding="15px" cellspacing="20px">
        <?php
        if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1) {
            $userid = $_SESSION['id'];
            // echo ("<script LANGUAGE='JavaScript'>
            // window.alert('Please Login to view menu.');
            // window.location.href='login.php';
            // </script>");
            // header('Location:login.php');
            // exit();
        } else {
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('Please Login to view menu.');
            window.location.href='login.php';
            </script>");
        }
        // if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1) { //check login
        //     $userid = $_SESSION['id'];
        //     echo ("<script LANGUAGE='JavaScript'>
        //     window.location.href='menu.php';
        //     </script>");
        // }
        // else{
        //     echo ("<script LANGUAGE='JavaScript'>
        //     window.alert('Please Login to view menu.');
        //     window.location.href='login.php';
        //     </script>");
        //     // $message = "Please Login to view menu.";
        //     // echo "<script type='text/javascript'>alert('$message');</script>";
        //     // function_alert("Please Login to view menu.");
        //     // echo "<script>alert('Please Login to view menu.')</script>";
        //     // header("Location: login.php");
        // }

        // if (isset($_POST["food_id"])) {
        //     $food_id = $_POST["food_id"];

        //     $result = mysqli_query($con, "SELECT * FROM cart WHERE food_id = $food_id and userid = $userid");
        //     $numrow = mysqli_num_rows($result);
        //     if ($numrow > 0) {
        //         echo ('Item already in cart!');
        //     } else {
        //         header("Location: cart.php");
        //     }
        // } 
        $result = mysqli_query($con, "SELECT * FROM food WHERE active='Yes' ");
        $counter = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $counter;
            if ($counter % 3 == 0) {
                echo "<tr>";
            }
            // echo "<td style='height: 500px;'>
            //     <div class='row'>
            //         <div class='leftcolumn'>
            //             <div class='card'>
            //                 <div id='menu-name'><h2>" . $row["food_name"] . "</h2></div>
            //                 <div class='fake-image'><img src='Food/" . $row["food_image"] . "'></div>
            //                 <p>RM" . number_format((float)$row['food_price'], 2, '.', '') . "</p>
            //                 <p>".$row['food_description'] . "</p>
            //                 <button class='button' value='" . $row["food_id"] . ",," . $row["food_name"] . "'  onclick='select(this)'>SELECT</button>
            //             </div>
            //         </div>
            //     </div>
            // </td>";
            echo "<td style='height: 700px;'>
                    <div class='leftcolumn'>
                        <div class='card'>
                            <div id='menu-name'><h2>" . $row["food_name"] . "</h2></div>
                            <div class='fake-image'><img src='Food/" . $row["food_image"] . "'></div>
                            <p>RM" . number_format((float)$row['food_price'], 2, '.', '') . "</p>
                            <p>" . $row['food_description'] . "</p>
                            <button class='button' value='" . $row["food_id"] . ",," . $row["food_name"] . "'  onclick='select(this)'>SELECT</button>
                        </div>
                    </div>
            </td>";
            // function function_alert($message) {

            //     // Display the alert box 
            //     echo "<script>alert('$message');</script>";
            // }
            // if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1) { //check login
            //     $userid = $_SESSION['id'];
            // }
            // else{
            //     // $message = "wrong answer";
            //     // echo "<script type='text/javascript'>alert('$message');</script>";
            //     // function_alert("Please Login to view menu.");
            //     // echo "<script>alert('Please Login to view menu.')</script>";
            //     header("Location: login.php");
            // }
            if ($counter - 2 % 3 == 0) {
                echo "</tr>";
            }
            $counter++;
        }
        ?>
    </table>

    <script>
        //Get the button
        var mybutton = document.getElementById("myBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }

        function select(selButton) {
            var foodinfo = selButton.value.split(",,");
            // console.log(foodinfo);
            quantity = prompt("You have selected " + foodinfo[1] + ".\nHow many quantity you want?", 1);
            // console.log(isNaN(quantity));
            while (isNaN(quantity)) {
                alert("Please enter quantity in numbers only!");
            }

            if (quantity != null && quantity != isNaN(quantity)) {
                // $("#foodquantity").val(quantity);
                // console.log($("#foodquantity").val());
                document.toSubmit.food_price.value = quantity;
                document.toSubmit.food_id.value = foodinfo[0];
                document.toSubmit.food_quantity.value = quantity;
                document.toSubmit.submit();
            }

            // <?php
                //     $check_item = msqli_query($con, "SELECT * FROM cart WHERE food_id = $food_id and userid = $userid");
                //     if(mysqli_num_rows($check_item) > 0)
                //     {
                //         echo('Item already in cart!');
                //     }
                // 
                ?>

        }
    </script>

</body>

</html>
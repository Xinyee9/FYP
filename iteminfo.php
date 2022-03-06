<?php
    require_once('./php/dbconnect.php');

    session_start();
    if (isset($_POST["food_id"])) {
        $food_id = $_POST["food_id"];
        $food_quantity = $_POST["food_quantity"];

        if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1) { //check login
            $userid = $_SESSION['id'];
        }

        $result = mysqli_query($con, "INSERT INTO cart (cart_qty, food_id, userid) VALUES ($food_quantity, '$food_id', $userid)");
        echo $userid;
        echo $_POST['food_id'];
        echo $_POST['food_quantity'];

        header("Location: cart.php");
    }
?>
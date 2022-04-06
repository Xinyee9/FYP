<?php

//include constants.php file here
include('config/constants.php');

if (isset($_GET['ID'])) {
    //1.get the value and delete 
    $ID = $_GET['ID'];
    $sql = "UPDATE food SET block = 1 WHERE food_id = $ID";
    $res = mysqli_query($conn, $sql);

    //check whether the query executed successfully or not
    if ($res == true) {

        $_SESSION['delete'] = "<div class='success'>Food Blocked Successfully.</div>";
        header('location:' . SITEURL . 'admin/food.php');
    } else {

        $_SESSION['delete'] = "<div class='error'>Failed to Block Food. Try Again Later.</div>";
        header('location:' . SITEURL . 'admin/food.php');
    }
} else {
    header('location:' . SITEURL . 'admin/food.php');
}

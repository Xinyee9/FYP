<?php

//include constants.php file here
include('config/constants.php');

if (isset($_GET['ID'])) {
    //1.get the value and delete 
    $ID = $_GET['ID'];
    $sql = "UPDATE category SET block = 1 WHERE category_id = $ID";
    $res = mysqli_query($conn, $sql);

    //check whether the query executed successfully or not
    if ($res == true) {

        $_SESSION['delete'] = "<div class='success'>Category Blocked Successfully.</div>";
        header('location:' . SITEURL . 'admin/category.php');
    } else {

        $_SESSION['delete'] = "<div class='error'>Failed to Block Category. Try Again Later.</div>";
        header('location:' . SITEURL . 'admin/category.php');
    }
} else {
    header('location:' . SITEURL . 'admin/category.php');
}

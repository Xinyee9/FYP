<?php

//include constants.php file here
include('config/constants.php');

if (isset($_GET['ID'])) {
    //1.get the value and delete 
    $ID = $_GET['ID'];
    $sql = "UPDATE users SET block = 1 WHERE userid = $ID";
    $res = mysqli_query($conn, $sql);

    //check whether the query executed successfully or not
    if ($res == true) {

        $_SESSION['adminblock'] = "<div class='success'>Admin Blocked Successfully.</div>";
        header('location:' . SITEURL . 'admin/userstest.php');
    } else {

        $_SESSION['adminblock'] = "<div class='error'>Failed to Block Admin. Try Again Later.</div>";
        header('location:' . SITEURL . 'admin/userstest.php');
    }
} else {
    header('location:' . SITEURL . 'admin/userstest.php');
}

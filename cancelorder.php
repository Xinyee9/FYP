<?php
require_once('./php/dbconnect.php');
session_start();

if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1) { //check login
    $userid = $_SESSION['id'];
}

if (isset($_GET['ID'])) {
    $trans_id = $_GET['ID'];

    $sql = "SELECT * FROM trans WHERE transaction_id = $trans_id and userid = $userid";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $trans_id = $row["transaction_id"];

        $sql1 = "UPDATE trans set delivery_status = 'Cancelled by Admin' where transaction_id = $trans_id and userid = $userid";
        $result1 = mysqli_query($con, $sql1);
    }
}
header("Location: orderhistory.php");

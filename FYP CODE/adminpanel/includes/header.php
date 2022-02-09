<!DOCTYPE html>

<?php include('../config/constants.php'); ?>

<html>
    <head>
        <meta name= "viewport" content="width=device-width,initial-scale=1.0">
        <title>Responsive Admin Dashboard</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="style.css">
        
    </head>

    <body>
        <div class="container">
            <div class="navigation">
                <ul>
                    <li>
                        <a href="../admin/index.php">
                            <span class ="icon"><i class="fa fa-home" aria-hidden="true"></i></span>
                            <span class="title"><h2>Food</h2></span>
                        </a>
                    </li>
                    <li>
                        <a href="index.php">
                            <span class ="icon"><i class="fa fa-tachometer" aria-hidden="true"></i></span>
                            <span class="title">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="manage-food.php">
                            <span class ="icon"><i class="fa fa-cutlery" aria-hidden="true"></i></span>
                            <span class="title">Product</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class ="icon"><i class="fa fa-bell" aria-hidden="true"></i></span>
                            <span class="title">Order</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class ="icon"><i class="fa fa-car" aria-hidden="true"></i></span>
                            <span class="title">Delivery</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class ="icon"><i class="fa fa-commenting" aria-hidden="true"></i></span>
                            <span class="title">Message</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class ="icon"><i class="fa fa-question-circle" aria-hidden="true"></i></span>
                            <span class="title">Help</span>
                        </a>
                    </li>
                    <li>
                        <a href="manage.php">
                            <span class ="icon"><i class="fa fa-user" aria-hidden="true"></i></span>
                            <span class="title">Admin</span>
                        </a>
                    </li>
                    <li>
                        <a href="logout.php">
                            <span class ="icon"><i class="fa fa-sign-out" aria-hidden="true"></i></span>
                            <span class="title">Sign Out</span>
                        </a>
                    </li>
                    
                </ul>
            </div>
            <div class="main">
                <div class="topbar">
                    <div class="toggle " onclick="toggleMenu();"></div>
                    <div class="search">
                        <label>
                            <input type="text" placeholder="Search here">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </label>
                    </div>
                    <div class="user">
                        <img src="user.jpg">
                    </div>
                </div>
                
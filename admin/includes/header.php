<?php 
include('config/constants.php'); ?>

<!DOCTYPE html>

<html>
    <head>
        <link rel="shortcut icon" href="./image/cherry.ico" rel="icon" type="image/x-icon" />
        <meta name= "viewport" content="width=device-width,initial-scale=1.0">
        <title>Responsive Admin Dashboard</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="apstyle.css">
        
    </head>

    <body>
        <div class="container">
            <div class="navigation">
                <ul>
                    <li>
                        <a href="../index.php">
                            <span class ="icon"><i class="fa fa-home" aria-hidden="true"></i></span>
                            <span class="title"><h2>Food</h2></span>
                        </a>
                    </li> 

                    <li>
                        <a href="adminpanel.php">
                            <span class ="icon"><i class="fa fa-tachometer" aria-hidden="true"></i></span>
                            <span class="title">Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="food.php">
                            <span class ="icon"><i class="fa fa-cutlery" aria-hidden="true"></i></span>
                            <span class="title">Product</span>
                        </a>
                    </li>                 

                    <li>
                        <a href="category.php">
                            <span class ="icon"><i class="fa fa-pie-chart" aria-hidden="true"></i></span>
                            <span class="title">Category</span>
                        </a>
                    </li>

                    <li>
                        <a href="contactus.php">
                            <span class ="icon"><i class="fa fa-phone" aria-hidden="true"></i></span>
                            <span class="title">Contact Us</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <span class ="icon"><i class="fa fa-car" aria-hidden="true"></i></span>
                            <span class="title">Delivery</span>
                        </a>
                    </li>

                    <li>
                        <a href="admin-pro.php">
                            <span class ="icon"><i class="fa fa-user" aria-hidden="true"></i></span>
                            <span class="title">Admin</span>
                        </a>
                    </li>

                    <li>
                        <a href="./php/logout.php">
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
                
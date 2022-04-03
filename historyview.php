<?php
session_start();
require_once('./php/dbconnect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('user/include/header.php');
    ?>
    <title>User Information</title>
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
</head>

<body>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <style>
    /* The sidebar menu */
    @media screen and (max-height: 450px) {
        .sidenav {
            padding-top: 15px;
        }

        .sidenav a {
            font-size: 18px;
        }
    }

    .sidenav {
        height: 100%;
        /* Full-height: remove this if you want "auto" height */
        width: 240px;
        /* Set the width of the sidebar */
        position: fixed;
        /* Fixed Sidebar (stay in place on scroll) */
        z-index: 1;
        /* Stay on top */
        top: 0;
        /* Stay at the top */
        left: 0;
        background-color: #111;
        /* Black */
        overflow-x: hidden;
        /* Disable horizontal scroll */
        padding-top: 20px;

    }

    /* The navigation menu links */
    .sidenav a {
        padding: 6px 8px 6px 16px;
        text-decoration: none;
        font-size: 20px;
        color: #818181;
        display: block;
        transition: all 0.3s;
    }

    /* When you mouse over the navigation links, change their color */
    .sidenav a:hover {
        color: #f1f1f1;

    }

    .button {
        background-color: #008cba;
    }

    button {
        border: none;
        color: white;
        padding: 20px 32px;
        text-align: center;
        text-decoration: none;
        display: outline-block;
        font-size: 16px;
        margin: 10px 8px;
        cursor: pointer;
    }

    header {
        color: white;
        font-size: 40px;
        text-align: center;
        padding: 18px 20px;
        margin-bottom: 5px;
        cursor: pointer;
        transition: all 0.3s;
    }

    header:hover {
        padding-left: 25px;
    }

    .sidenav p {
        color: white;
        margin: 0 1.0rem;
        font-size: 16pt;
    }

    .sidenav span {
        color: white;
        margin-left: 1.0rem;
        font-size: 12pt;
        text-indent: 10px;
    }
    table {
        width: 100%;
        /*border-collapse: collapse;
        margin-top: 10px;*/
    }
    table td {
        font-weight: 600;
    }
    table tr {
        border-bottom: 1px solid rgba(0, 0, 0, 0.2); 
    }
    table tr td {
        padding: 9px 5px;
    }
    table tr td img {
        display: inline-block;
        width: 80px;
        height: 70px;
        object-fit: cover;
        border-radius: 50%;
        box-shadow: 0 2px 6px #0003;
    }
</style>

<head>
    <script src="https://use.fontawesome.com/37d1b5f99d.js"></script>

</head>

<div class="sidenav sidebar col-2">

    <header onclick="location.href ='index.php'">
        <span style="color: White;font-size:30px; ">
            <i class="fa fa-home pull-left" aria-hidden="true"> Food</i>
        </span>
    </header>

    <a href="orderhistory.php">Order history</a>
</div>

        <div class="container-fluid">

            <div class="row">
                <div class="col-10">

                    <span class="display-1 ">Order history</span>
                    <hr>
                    <h5>Your order information</h5>
                    <hr>
                </div>
            </div>
            <div class="row">
                <!--/col-3-->
                <div class="col-sm-12">
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="first_name">
                                    <h4>Order Details</h4>
                                </label>   
                                <table>
                       
                       <?php
                           if(isset($_GET['ID'])) {
                           //1.get the id of selected admin
                           $ID = $_GET['ID'];
                           
                           //2.create sql query to get the details
                           $sql = "SELECT * FROM trans WHERE transaction_id =$ID";
                           //Execute the query
                           $res = mysqli_query($con, $sql);
                           //get the value based on query executed
                           $row = mysqli_fetch_assoc($res);
           
                           //$tran_id = $row['transaction_id'];
                           $tran_date = $row['transaction_date'];
                           $tran_time = $row['transaction_time'];
                           //$name = $row['Full_Name'];
                           $adress = $row['Trans_Address'];
                           $city = $row['City'];
                           $zip = $row['Zip'];
                           $tran_state = $row['Trans_State'];
                           $status = $row['delivery_status'];

                           }
                           
                           ?>
                           <tr>
                               <td>       
                               <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                               <p><b>Date : </b><?php echo $tran_date ?><p>
                               <p><b>Time :</b> <?php echo $tran_time;?></p>
                               <p><b>Delivery Status : </b> <?php echo $status; ?> </p>
                               <p><b>Address: </b> <?php echo $adress,', ',$city,', ',$zip,' ',$tran_state; ?> </p>
                               </td>
                           </tr>
                           
                           <?php 
                           $sql1 = "SELECT * FROM real_cart WHERE transaction_id = $ID";
                           $subtotal = 0;
                           $res1 = mysqli_query($con, $sql1);
                           ?>
                           <?php
                           while($row1 = mysqli_fetch_assoc($res1))
                           {
                           $food_id = $row1['food_id'];
                           $qty = $row1['cart_qty']; 
                           $total = $row1['subtotal'];
                           // $subtotal = $row4['subtotal'];
                           $subtotal += $row1['subtotal'];
                           
                           $sql2 = "SELECT * FROM food WHERE food_id = $food_id";
                           $res2 = mysqli_query($con, $sql2);
                           
                           while($row2=mysqli_fetch_array($res2))
                           {
                               
                               $food_name = $row2['food_name'];
                               //$food_price = $row2['food_price'];
                               $food_image = $row2 ['food_image'];
                               
                           ?>
                           <tr>
                               
                               <td>
                               <p> <?php echo $food_name ?></p><br>
                               </td>
                               <td>
                               <?php
                               if ($food_image == "") 
                               {
                                   echo "<div class='error'>Image not added.</div>";
                               } 
                               else {
                                   //display image
                               ?>
                                   <img src="Food/<?php echo $food_image; ?>">
                                   <?php
                               }
                               ?> 
                               </td>
                               <td>
                               <p> <?php echo $qty ?> Quantity</p><br>
                               </td>
                               <td>
                               <p>RM <?php echo number_format($total, 2); ?></p><br>
                               </td> 
                           </tr>
                           <?php 
                       } 
                   }
                       ?> 
                           <tr>
                               <td></td>
                               <td></td>
                               <td></td>
                               <td>
                                   <p >Total: RM <?php echo number_format($subtotal, 2); ?></p><br>
                               </td>   
                           </tr>        
</table>
                            </div>
                        </div>
                </div>
                <!--/tab-content-->
            </div>

            <!--/col-9-->
        </div>
        <!--/row-->
    </main>
</body>

</html>

<?php
include('user/include/footer.php');
?>
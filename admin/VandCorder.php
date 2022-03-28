<?php
include('config/constants.php'); ?>

<!DOCTYPE html>

<html>

<head>
    <link rel="shortcut icon" href="./image/admin.ico" rel="icon" type="image/x-icon" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="apstyle.css">

</head>
<body>

    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="../index.php">
                        <span class="icon"><i class="fa fa-home" aria-hidden="true"></i></span>
                        <span class="title">
                            <span style="font-family:Algerian">
                                <span style="font-size:x-large ,">
                                    Food
                                </span>
                            </span>
                        </span>
                    </a>
                </li>

                <li>
                    <a href="adminpanel.php">
                        <span class="icon"><i class="fa fa-tachometer" aria-hidden="true"></i></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="food.php">
                        <span class="icon"><i class="fa fa-cutlery" aria-hidden="true"></i></span>
                        <span class="title">Product</span>
                    </a>
                </li>

                <li>
                    <a href="category.php">
                        <span class="icon"><i class="fa fa-pie-chart" aria-hidden="true"></i></span>
                        <span class="title">Category</span>
                    </a>
                </li>

                <li>
                    <a href="contactus.php">
                        <span class="icon"><i class="fa fa-phone" aria-hidden="true"></i></span>
                        <span class="title">Contact Us</span>
                    </a>
                </li>

                <li>
                    <a href="orders.php">
                        <span class="icon"><i class="fa fa-car" aria-hidden="true"></i></span>
                        <span class="title">Orders</span>
                    </a>
                </li>

                <li>
                    <a href="userstest.php">
                        <span class="icon"><i class="fa fa-user" aria-hidden="true"></i></span>
                        <span class="title">Admin & User</span>
                    </a>
                </li>

                <li>
                    <a href="../php/logout.php">
                        <span class="icon"><i class="fa fa-sign-out" aria-hidden="true"></i></span>
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
                <div class="details">
                    <div class="recentOrders">
                        <div class="cardHeader">                    
                            <h2>Order view</h2>
                            <a href ="../admin/orders.php"  class="btn-add ">Back </a> 
                        </div>
                        <form action="" method="POST" >
                        <table >
                       
                            <tbody> 
                            <?php
                                if(isset($_GET['ID'])) {
                                //1.get the id of selected admin
                                $ID = $_GET['ID'];
                                
                                //2.create sql query to get the details
                                $sql = "SELECT * FROM trans WHERE transaction_id =$ID";
                                //Execute the query
                                $res = mysqli_query($conn, $sql);
                                //get the value based on query executed
                                $row = mysqli_fetch_assoc($res);
                
                                //$tran_id = $row['transaction_id'];
                                $tran_date = $row['transaction_date'];
                                $tran_time = $row['transaction_time'];
                                $name = $row['Full_Name'];
                                $adress = $row['Trans_Address'];
                                $tran_state = $row['Trans_State'];
                                $status = $row['status'];

                                }
                                
                                ?>
                                <tr>
                                    <td>       
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <p><b>Order No.</b> <?php echo $ID; ?><p>
                                    <p><b>Date : </b><?php echo $tran_date ?><p>
                                    <p><b>Time :</b> <?php echo $tran_time;?></p>
                                    <p><b>State : </b> <?php echo $tran_state; ?> </p>
                                    
                                    <p><b>Status : </b>
                                     
                                    <select name="status" >
                                        <option value="" >--Select--</option>
								        <option value="Yet to be delivered" 
                                        <?php
                                        if($row["status"] == 'Yet to be delivered')
                                        {
                                            echo "selected";
                                        }
                                        ?>
                                        >Yet to be delivered</option>
								        <option value="Delivered" 
                                        <?php
                                        if($row["status"] == 'Delivered')
                                        {
                                            echo "selected";
                                        }
                                        ?>
                                        >Delivered</option>
								        <option value="Cancelled by Admin"
                                        <?php
                                        if($row["status"] == 'Cancelled by Admin')
                                        {
                                            echo "selected";
                                        }
                                        ?> 
                                        >Cancelled by Admin</option>
								        <option value="Paused"
                                        <?php
                                        if($row["status"] == 'Paused')
                                        {
                                            echo "selected";
                                        }
                                        ?> 
                                        >Paused</option>								
								    </select></p>
                                   
                                    </td>
                                </tr>
                                <?php
                                $userid = $row['userid'];

                                //$sql1 = mysqli_query($conn, "SELECT * FROM transaction_detail WHERE tran_id = $ID;");
                                $sql3 = "SELECT * FROM users WHERE userid = $userid";
                                //Execute the query
                                $res3 = mysqli_query($conn, $sql3);
                                //get the value based on query executed
                                $row3 = mysqli_fetch_assoc($res3);
                                $email = $row3['useremail'];
                                ?>
                                <tr>
                                    <td>
                                        <p><b>Name: </b><?php echo $name; ?></p><br>
                                        <p><b>Address:</b><?php echo $adress; ?></p><br>
                                        <p><b>Email:</b><?php echo $email; ?></p><br>
                                    </td>
                                    
                                </tr>
                                <?php 
                                $id = $row['userid']; 
                                $sql1 = "SELECT * FROM cart WHERE userid = $id";
                                $res1 = mysqli_query($conn, $sql1);
                                //get the value based on query executed
                                //$row1 = mysqli_fetch_assoc($res1);
                                $sql4 = "SELECT * FROM carttotal WHERE userid = $id";
                                $res4 = mysqli_query($conn, $sql4);
                                $row4 = mysqli_fetch_assoc($res4);
                                ?>
                                <?php
                                while($row1 = mysqli_fetch_assoc($res1))
                                {
                                $food_id = $row1['food_id'];
                                $qty = $row1['cart_qty'];
                                
                                $total = $row4['total'];
                                //$subtotal = $row4['trand_subtotal'];

							    $sql2 = "SELECT * FROM food WHERE food_id = $food_id";
                                $res2 = mysqli_query($conn, $sql2);
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
                                        <img src="<?php echo SITEURL; ?>Food/<?php echo $food_image; ?>">
                                        <?php
                                    }
                                    ?> 
                                    </td>
                                    <td>
                                    <p> <?php echo $qty ?> Pieces</p><br>
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
                                        <p >Total: RM <?php echo number_format($total, 2); ?></p><br>
                                    </td>   
                                </tr>
                                <tr>
                                <td>
                                <input type="hidden" name="ID" value="<?php echo $ID; ?>">
                                <button type="submit" name="submit" value="Update" class ="btn-update">Update</button></div>
                                   </td>
                                </tr>
                                
                            </tbody>
                            
</table>
</form>
                                <?php

//check whether the submit buttom is clicked or not
if (isset($_POST['submit'])) {
    //GET all the data from the form 
    $ID = $_POST['ID'];
    $status = $_POST['status'];
    
    $sql5 = "UPDATE trans SET
    status = '$status'
    WHERE transaction_id ='$ID'
    ";

    //Execute the Query
    $res5 = mysqli_query($conn, $sql5);

    if ($res5 == TRUE) {
        //Query Executed and food Update
        //$_SESSION['update'] = "<div class='success'>Updated Successfully.</div>";
        //Redirect to manage food page
        //header('location:' . SITEURL . 'admin/orders.php');
        echo "<script>
        alert('Updated Successfully.');
        window.location.href='./orders.php';
        </script>";
    } else {
        //Faile to update food
        //$_SESSION['update'] = "<div class='error'>Failed to Updatded.</div>";
        //Redirect to manage food page
        //header('location:' . SITEURL . 'admin/orders.php');
        echo "<script>
        alert('Failed to Updatded.');
        window.location.href='./orders.php';
        </script>";
    }
}


?>
</div></div>
</body>
</html>
<?php 
include('includes/script.php'); 
?>
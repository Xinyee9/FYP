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
    <?php
        if(isset($_GET['id'])) {
            //1.get the id of selected admin
            $id = $_GET['id'];

            //2.create sql query to get the details
            $sql3 = "SELECT * FROM transaction WHERE tran_id =$id";

            //Execute the query
            $res3 = mysqli_query($conn, $sql3);

           //get the value based on query executed
            $row3 = mysqli_fetch_assoc($res3);
                
            //$tran_id = $rows3['tran_id'];
            $tran_id = $rows['tran_id'];
            $tran_date = $rows['tran_date'];
            $tran_time = $rows['tran_time'];
            $tran_state = $rows['tran_state'];
            
        }
        else {
            header('location:' . SITEURL . 'admin/VandCorder.php');
        }
        ?>
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
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="details">
                    <div class="recentOrders">
                        <div class="cardHeader">                    
                            <h2>Order view</h2>
                            <div class="">View All</div>   
                        </div>
                        <table >
                            <tbody>
                            
                                <tr>
                                    <td>
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i><br>
                                    <p><b>Order No.</b> <?php echo $sn++; ?><p>
                                    <p><b>Date : </b> <?php echo $tran_date; ?><p>
                                    <p><b>Time :</b> <?php echo $tran_time;?></p>
                                    <p><b>State : </b> <?php echo $tran_state; ?> </p>
                                    <select name="category" class="form-control">
                                    <?php
                                        //create 
                                        $sql2 = "SELECT * FROM CATEGORY ";

                                        $res2 = mysqli_query($conn, $sql2);

                                        $count = mysqli_num_rows($res2);
                                        if ($count > 0) {
                                        while ($row2 = mysqli_fetch_assoc($res2)) {
                                            $cname = $row2['cate_name'];
                                            $ID = $row2['category_id'];

                                            //echo "<option value='$ID'>$cname</option>";
                                    ?>

                                    <option <?php if ($current_category == $ID) {
                                    echo "selected";
                                    } ?> value="<?php echo $ID; ?>"><?php echo $cname; ?></option>

                                    <?php
                                    }
                                    } else {
                                        echo "<option value='0'>no category found</option>";
                                        /**?>
                                        <option value="0">no category found</option>
                                        <?php**/
                                    }

                                    ?>
                                    </select>
                                    </td>
                                </tr>
                                
                                <?php
                                   
                                ?>
                                <tr>
                                    <td>
                                        <p>Name:</p><br>
                                        <p>Address:</p><br>
                                        <p>Contact:</p><br>
                                        <p>Email:</p><br>
                                        <p>Note:</p><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    <p> Item 1:</p><br>
                                    </td> 
                                </tr>
                                <tr>
                                    <td>
                                    <p> Item 2:</p><br>
                                    </td> 
                                </tr>
                                <tr>
                                    <td>
                                    <p> Total:</p><br>
                                    <p style="text-align:right;" >Update</p>
                                    </td> 
                                </tr>
                            </tbody>
                            
</table>
</form></div></div>
</body>
</html>
<?php 
include('includes/script.php'); 
?>


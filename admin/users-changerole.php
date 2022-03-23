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
                if(isset($_GET['ID']))
                {
                    //1.get the id of selected admin
                    $ID = $_GET['ID'];
                    
                    //2.create sql query to get the details
                    $sql = "SELECT * FROM users WHERE userid =$ID";
                    
                    //Execute the query
                    $res = mysqli_query($conn, $sql);

                    //count the rows to check whether the id is valid or not
                    $count = mysqli_num_rows($res);

                    if($count == 1)
                    {
                        //get the details
                        //echo "Admin Available"
                        $row = mysqli_fetch_assoc($res);
                        $full_name = $row['username'];
                        $email = $row['useremail'];
                        //$phone = $row['userphone'];
                        //$adress = $row['useradress'];
                        //$current_image = $row['userpic'];
                        $role = $row['userprivilege'];
                        $userfirstname = $row['userfirstname'];
                        $userlastname = $row['userlastname'];
                    }
                    else
                    {
                        $_SESSION['admin-no-found'] = "<div class='error'>user not found.</div>";
                        //Redirect to manage admin page
                        header('location:'.SITEURL.'admin/userstest.php');
                    }

                }
                else
                {
                    header('location:'.SITEURL.'admin/userstest.php');
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
            <form action="" method ="POST">
            <div class="details">
                    <div class="recentOrders">
                        <div class="cardHeader">
                            <h2>User Details</h2>
                            <a href ="../admin/userstest.php"  class="btn-add ">Back </a>
                        </div>
                        
                        <table >
                            <tr>
                                <th style="text-align: left";>Detail</th>
                                <th style="text-align: left";>Actions</th> 
                            </tr>
                            <tr>
                                
                                <td style="text-align: left";>
                                    <p><b>Username        :  </b> <?php echo $full_name; ?></p>
                                    <p><b>Email           :  </b> <?php echo $email; ?></p> 
                                    
                                    
                                    <p><b>User first Name :  </b> <?php echo $userfirstname; ?></p>
                                    <p><b>User Last Name  :  </b> <?php echo $userlastname; ?></p>
                                    <br>
                                    <div>
                                        <p><b>Role : </b>
                                            <input <?php if($role == "user"){echo "checked";} ?> type="radio" name="role" value="user" > User
                                            <input <?php if($role == "admin"){echo "checked";} ?> type="radio" name="role" value="admin" > Admin
                                        </p>
                                    </div>
                                </td>
                                <td style="text-align: left;">
                                    <input type="hidden" name = "ID" value="<?php echo $ID;?>">
                                    <button type="submit" name="submit" class="btn-add" value="Change Role">Change Role
                                </td>
                            </tr>
                        </table>  
                            
                              
                    </div>        
                </div>
            
                                    </form>  
                
                                   
                    <?php

//check whether the submit buttom is clicked or not
if(isset($_POST['submit']))
{
    //GET all the values from form to update
    $ID = $_POST['ID'];
    $role = $_POST['role'];
    
    
    //create a sql query to update admin
    $sql2 = "UPDATE users SET
        userprivilege = '$role'
        WHERE userid = '$ID'
    ";

    //Execute the Query
    $res2 = mysqli_query($conn, $sql2);

    if($res2 == TRUE)
    {
        //Query Executed and Admin Update
        //$_SESSION['update'] = "<div class='success'>Role Change Successfully.</div>";
        //Redirect to manage admin page
        //header('location:'.SITEURL.'admin/userstest.php');
        echo "<script>
          alert('Role Change Successfully.');
          window.location.href='./userstest.php';
          </script>";
    }
    else
    {
        //Faile to update Admin
        //$_SESSION['update'] = "<div class='error'>Failed to Change Role.</div>";
        //Redirect to manage admin page
        //header('location:'.SITEURL.'admin/userstest.php');
        echo "<script>
          alert('Failed to Change Role.');
          window.location.href='./userstest.php';
          </script>";
    }
    
}

?>
        



   </div>
</div>
<?php 

include('includes/script.php')
?>
</body> 
</html> 



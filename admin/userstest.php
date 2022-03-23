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
                <div class="details " >
                    <div class="recentOrders">
                        <div class="cardHeader">
                            <h2>Manage Admin</h2>
                            <a href="add-admin.php" class="btn">Add Admin</a>
                        </div>
                        <table>
                            <thead> 
                               <tr>
                                <td>ID</td>
                                <td>Full Name</td>  
                                <td>Email</td>                       
                                
                                <td>Role</td>
                                  
                                <td>Actions</td>  
                            </tr>
                            </thead
                            ><tbody>
                            <?php
                    //Query to get all admin
                    $sql = "SELECT * FROM users WHERE userprivilege ='admin'";
                    //Execture the Query
                    $res = mysqli_query($conn, $sql);

                    //check whether the Query is Executed or Not
                    if($res == TRUE)
                    {
                        //cout rows to check whether we have data in database or not
                        $count = mysqli_num_rows($res);//function to get all the rows in database

                        //check the num of rows
                        if($count>0)
                        {
                            $sn=1;//create a variable and assign the value

                            //we have data in database
                            while($rows=mysqli_fetch_assoc($res))
                            {
                                //use while loop to get all the data from database
                                //and while loop will run as long as we have data in database

                                //get individul data
                                $ID = $rows['userid'];
                                $full_name = $rows['username'];
                                $email = $rows['useremail'];
                                //$phone = $rows['userphone'];
                                //$adress = $rows['useradress'];
                                $role = $rows['userprivilege'];
                                //$image_name = $rows['userpic'];
                                

                                //display the value in our table
                                ?>
                                <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $full_name; ?></td>  
                                    <td><?php echo $email ; ?></td>                     
                                    <td><?php echo $role ; ?></td>
                                    <td >
                                    <a href="<?php echo SITEURL;?>admin/change-pass.php?ID=<?php echo $ID;?>" class="btn-add"> Change Password</a>
                                        <a href="<?php echo SITEURL;?>admin/viewadmin.php?ID=<?php echo $ID?>" class="btn-update">Update&View</a>
                                        <a href="<?php echo SITEURL;?>admin/delete-admin.php?ID=<?php echo $ID; ?>&image_name=<?php echo $image_name;?>" class="btn-delete">Delete Admin</a>
                                    </td>  
                                </tr>

                                <?php
                            }
                        }
                        else
                        {
                            //we do not have data in database
                        }
                    }
                ?>
                           </tbody> 
                        </table>
                    </div>
                </div>
                <div class="details">
                    <div class="recentOrders">
                        <div class="cardHeader">
                            <h2>Users list</h2>
                            
                        </div>
                        <table>
                            <thead>
                            <tr>
                                <td>ID</td>
                                <td>Full Name</tdh>  
                                <td>Email</td>                       
                                
                                <td>Role</td>
                                
                                <td>Actions</td>  
                            </tr>
                           </thead>
                           <tbody>
                            <?php
                    //Query to get all admin
                    $sql2 = "SELECT * FROM users WHERE userprivilege ='user'";
                    //Execture the Query
                    $res2 = mysqli_query($conn, $sql2);

                    //check whether the Query is Executed or Not
                    if($res2 == TRUE)
                    {
                        //cout rows to check whether we have data in database or not
                        $count = mysqli_num_rows($res2);//function to get all the rows in database

                        //check the num of rows
                        if($count>0)
                        {
                            $sn=1;//create a variable and assign the value

                            //we have data in database
                            while($rows2=mysqli_fetch_assoc($res2))
                            {
                                //use while loop to get all the data from database
                                //and while loop will run as long as we have data in database

                                //get individul data
                                $ID = $rows2['userid'];
                                $full_name = $rows2['username'];
                                $email = $rows2['useremail'];
                                //$phone = $rows2['userphone'];
                                //$adress = $rows2['useradress'];
                                $role = $rows2['userprivilege'];
                                
                                //$image_name = $rows2['userpic'];

                                //display the value in our table
                                ?>
                                <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $full_name; ?></td>  
                                    <td><?php echo $email ; ?></td>                     
                                      
                                    
                                    <td><?php echo $role ; ?></td>
                                    
     
                                    <td >
                                        <a href="<?php echo SITEURL;?>admin/users-changerole.php?ID=<?php echo $ID;?>" class="btn-add"> Change Role</a>
                                    </td>  
                                </tr>

                                <?php
                            }
                        }
                        else
                        {
                            //we do not have data in database
                        }
                    }
                ?>
                            </tbody>
                        </table>
                    </div>
                
               
         
<?php 
include('includes/script.php'); 
?>
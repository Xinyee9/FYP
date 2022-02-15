<?php include('includes/header.php') ?>

<!-- Main Content Section Starts -->
<div class="header">
        <div id="title">
            <h1>Manage Admin</h1>

            <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add']; //Display Session Message
                    unset($_SESSION['add']); //REMoving Session Message
                }
                if(isset($_SESSION['remove']))
                {
                    echo $_SESSION['remove']; //Display Session Message
                    unset($_SESSION['remove']); //REMoving Session Message
                }
                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete']; //Display Session Message
                    unset($_SESSION['delete']); //REMoving Session Message
                }
                if(isset($_SESSION['admin-not-found']))
                {
                    echo $_SESSION['admin-not-found']; //Display Session Message
                    unset($_SESSION['admin-not-found']); //REMoving Session Message
                }
                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update']; //Display Session Message
                    unset($_SESSION['update']); //REMoving Session Message
                }
                if(isset($_SESSION['psw-not-match']))
                {
                    echo $_SESSION['psw-not-match']; //Display Session Message
                    unset($_SESSION['psw-not-match']); //REMoving Session Message
                }
                if(isset($_SESSION['change-pwd']))
                {
                    echo $_SESSION['change-pwd']; //Display Session Message
                    unset($_SESSION['change-pwd']); //REMoving Session Message
                }
                if(isset($_SESSION['upload']))
                {
                    echo $_SESSION['upload']; //Display Session Message
                    unset($_SESSION['upload']); //REMoving Session Message
                }
                if(isset($_SESSION['failed-remove']))
                {
                    echo $_SESSION['failed-remove']; //Display Session Message
                    unset($_SESSION['failed-remove']); //REMoving Session Message
                }          
            ?>
            <br><br>
            <!-- Buttom to Add Admin -->
            <a href ="add-admin.php" class="btn-add">Add admin</a>
            <br /><br /><br />

            <table class = "tbl-full" >
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>  
                    <th>Email</th>                     
                    <th>Gender</th>  
                    <th>Phone Number</th>
                    <th>Image</th>   
                    <th>Actions</th>  
                </tr>

                <?php
                    //Query to get all admin
                    $sql = "SELECT * FROM ADMIN";
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
                                $ID = $rows['admin_id'];
                                $full_name = $rows['admin_name'];
                                $email = $rows['admin_email'];
                                $gender = $rows['admin_gender'];
                                $phone = $rows['admin_phone'];
                                $image_name = $rows['admin_profile_pic'];

                                //display the value in our table
                                ?>
                                <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $full_name; ?></td>  
                                    <td><?php echo $email ; ?></td>                     
                                    <td><?php echo $gender ; ?></td>  
                                    <td><?php echo $phone ; ?></td>
                                    <td>
                                        <?php  
                                            //check image name is available or not
                                            if($image_name!="")
                                            {
                                                //display image
                                                ?>
                                                <img src="<?php echo SITEURL; ?>image/admin/<?php echo $image_name; ?>" width="100px">

                                                <?php
                                            }
                                            else
                                            {
                                                //dissply message
                                                echo "<div class = 'error'>Image not added.</div>";
                                            }
                                        ?>
                                    </td> 
     
                                    <td >
                                    <a href="<?php echo SITEURL;?>admin/change-pass.php?ID=<?php echo $ID;?>" class="btn-add"> Change Password</a>
                                        <a href="<?php echo SITEURL;?>admin/edit-admin.php?ID=<?php echo $ID?>" class="btn-update">Update Admin</a>
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

                
            </table>
        </div>
    </div>
    <!-- Main Content Section End -->

<?php 
include('includes/script.php'); 
?>
<?php include('includes/header.php') ?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

<div class="header">
    <div id="title">
        <h1>Change Password</h1>
        <br /><br />

        <?php
        if(isset($_GET['ID']))//Checking whether the session is set or not
        {
            $ID = $_GET['ID'];
        } 
        
        ?>

        <form action="" method ="POST">
            <table class = "tbl-30">
                <tr>
                    <td>Current Password: </td>
                    <td><input type="password" name="current_password" placeholder="Current Password" ></td>   
                </tr>
                <tr>
                    <td>New Password: </td>
                    <td><input type="password" name="new_password" placeholder="New Password" ></td>   
                </tr>
                <tr>
                    <td>Confirm Password: </td>
                    <td><input type="password" name="confirm_password" placeholder="Confirm Password" ></td>   
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name = "ID" value="<?php echo $ID;?>"> 
                        <input type="submit" name="submit" value="Change Password" class="btn-update">
                    </td>    
                </tr>

            </table>   
        </form>
       
        <?php

        if(isset($_POST['submit']))
        {
            //echo "clicked";
            //1.GET the values from form 
            $ID = $_POST['ID'];
            $current_password = md5($_POST['current_password']);
            $new_password = md5($_POST['new_password']);
            $confirm_password = md5($_POST['confirm_password']);

            //2.check whether the user with current id and current password exists or not
            $sql = "SELECT * FROM admin WHERE admin_id=$ID AND admin_password ='$current_password'";

            //Execute the Query
            $res = mysqli_query($conn, $sql);

            if($res == true)
            {
                //check whether data is available or not 
                $count = mysqli_num_rows($res);


                    //user exists and password can be change
                    //echo "User Found";
                    //check whether the new password and confirm match or not
                    if($new_password==$confirm_password)
                    {
                        //update password
                        $sql2 = "UPDATE admin SET
                        admin_password ='$new_password'
                        WHERE admin_id=$ID
                        ";
                        //Execute the Query
                        $res2 = mysqli_query($conn, $sql2);
    
                        //check whether the query exeuted or not
                        if($res2==true)
                        {
                            //display succes message
                            //REdirec to manage admin page with error message
                            $_SESSION['change-pwd'] = "<div class='success'>Password Change Successfully.</div>";
                            //Redirect the user
                            header('location:'.SITEURL.'admin/admin-pro.php');
                        }
                        else
                        {
                            //display error message
                            //REdirec to manage admin page with error message
                            $_SESSION['change-pwd'] = "<div class='error'>Failed to  Change Password.</div>";
                            //Redirect the user
                            header('location:'.SITEURL.'admin/admin-pro.php');
                        }
    
                    }
                    else
                    {
                        //REdirec to manage admin page with error message
                        $_SESSION['psw-not-match'] = "<div class='error'>Password Did Not Match.</div>";
                        //Redirect the user
                        header('location:'.SITEURL.'admin/admin-pro.php');
                    }
                }
                else
                {
                    //user does not exists set message and REdirect 
                    $_SESSION['user-not-found'] = "<div class='error'>User Not Found.</div>";
                    //Redirect the user
                    header('location:'.SITEURL.'admin/admin-pro.php');
            
                }
                
            }
           
        
        }
        
        ?>
    </div>
</div>
<?php 

include('includes/script.php')
?>
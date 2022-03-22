<?php include('config/constants.php') ?>
<html >
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="add.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>  
    <div class="container">
        <div class ="title"> Change Password</div>

        <br /><br />

        <?php
        if(isset($_GET['ID']))//Checking whether the session is set or not
        {
            $ID = $_GET['ID'];
        } 
        
        ?>

        <form action="" method ="POST">
            <div class = "user-details">
                <div class="input-box">
                    <span class="details">Current Password: </span>
                    <input type="password" name="current_password" placeholder="Current Password" required > 
                </div>
                <div class="input-box">
                    <span class="details">New Password: </span>
                    <input type="password" name="new_password" placeholder="New Password" required > 
                </div>
            </div>
            <div class = "user-details">
                <div class="input-box">
                    <span class="details">Confirm Password:  </span>
                    <input type="password" name="confirm_password" placeholder="Confirm Password" required > 
                </div>
            </div>

            <div class="button">
                <input type="hidden" name = "ID" value="<?php echo $_GET['ID']?>"> 
                <input type="submit" name="submit"  value="Change password" >
            </div>
                
        </form>
        <?php

if(isset($_POST['submit']))
{
    //echo "clicked";
    //1.GET the values from form 
    $ID = $_POST['ID'];
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    //2.check whether the user with current id and current password exists or not
    $sql = "SELECT * FROM users WHERE userid=$ID AND userpassword ='$current_password'";

    //Execute the Query
    $res = mysqli_query($conn, $sql);
    
    if($res == true)
    {
        //check whether data is available or not 
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            //user exists and password can be change
            //echo "User Found";
            //check whether the new password and confirm match or not
            if($new_password===$confirm_password)
            {
                //update password
                $sql2 = "UPDATE users SET
                userpassword ='$new_password'
                WHERE userid=$ID
                ";
                //Execute the Query
                $res2 = mysqli_query($conn, $sql2);

                //check whether the query exeuted or not
                if($res2==true)
                {
                    //display succes message
                    //REdirec to manage admin page with error message
                    //$_SESSION['change-pwd'] = "<div class='success'>Password Change Successfully.</div>";
                    //Redirect the user
                   // header('location:'.SITEURL.'admin/userstest.php');
                    echo "<script>
                        alert('Password Change Successfully.');
                        window.location.href='./userstest.php';
                        </script>";
                }
                else
                {
                    //display error message
                    //REdirec to manage admin page with error message
                    //$_SESSION['change-pwd'] = "<div class='error'>Failed to  Change Password.</div>";
                    //Redirect the user
                    //header('location:'.SITEURL.'admin/userstest.php');
                    echo "<script>
                    alert('Failed to  Change Password.');
                    window.location.href='./userstest.php';
                    </script>";
                }

            }
            else
            {
                //REdirec to manage admin page with error message
                //$_SESSION['psw-not-match'] = "<div class='error'>Password Did Not Match.</div>";
                //Redirect the user
                //header('location:'.SITEURL.'admin/userstest.php');
                echo "<script>
                    alert('Password Did Not Match.');
                    window.location.href='./userstest.php';
                    </script>";
            }
        }
        else
        {
            //user does not exists set message and REdirect 
            //$_SESSION['admin-not-found'] = "<div class='error'>User Not Found.</div>";
            //Redirect the user
            //header('location:'.SITEURL.'admin/userstest.php');
            echo "<script>
                    alert('User Not Found.');
                    window.location.href='./userstest.php';
                    </script>";
    
        }
        
    }
   

}

?>
        
    </div>
</div>
<?php 

include('includes/script.php')
?>
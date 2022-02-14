<?php include('php/header.php') ?> 

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        
    </head>

<div class="header">
    <div id="title">
        <h1>Upade Admin</h1>

        <br /><br />
        <?php
                if(isset($_GET['ID']))
                {
                    //1.get the id of selected admin
                    $ID = $_GET['ID'];
                    
                    //2.create sql query to get the details
                    $sql = "SELECT * FROM admin WHERE admin_id =$ID";
                    
                    //Execute the query
                    $res = mysqli_query($con, $sql);

                    //count the rows to check whether the id is valid or not
                    $count = mysqli_num_rows($res);

                    if($count == 1)
                    {
                        //get the details
                        //echo "Admin Available"
                        $row = mysqli_fetch_assoc($res);

                        $full_name = $row['admin_name'];
                        $email = $row['admin_email'];
                        $gender = $row['admin_gender'];
                        $phone = $row['admin_phone'];
                        $current_image = $row['admin_profile_pic'];   
                    }
                    else
                    {
                        $_SESSION['admin-no-found'] = "<div class='error'>Admin not found.</div>";
                        //Redirect to manage admin page
                        header('location:'.SITEURL.'admin_pro.php');
                    }

                }
                else
                {
                    header('location:'.SITEURL.'admin_pro.php');
                }

                
        ?>
       
        <form action="" method ="POST" enctype="multipart/form-data">
            <table class = "tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td><input type="text" name="full_name" value="<?php echo $full_name; ?>" ></td>   
                </tr>
                <tr>
                    <td>Email:</td> 
                    <td><input type="email" name="email" value="<?php echo $email; ?>"></td>  
                </tr>
                <tr>
                <td>Gender:</td>
                    <td>
                        <input <?php if($gender == "male"){echo "checked";} ?> type="radio" name="gender" value="male" > Male
                        <input <?php if($gender == "female"){echo "checked";} ?> type="radio" name="gender" value="female" > Female
                    </td>    
                </tr>
                <tr>
                    <td>Phone Number:</td>
                    <td><input type="text" name="phone" value="<?php echo $phone; ?>"></td>  
                </tr>
                <tr>
                    <td>Profile picture:</td>
                    <td>
                        <?php
                            if($current_image != "")
                            {
                                //display image
                                ?>
                                <img src="<?php echo SITEURL; ?>image/admin/<?php echo $current_image;?>" width="150px">
                                <?php
                            } 
                            else
                            {
                                echo "<div class='error'>Image not added.</div>";
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>New Profile picture:</td>
                    <td><input type="file" name="pic" ></td>  
                </tr>
                <tr>
                    <td >
                        <input type="hidden" name = "current_image" value="<?php echo $current_image;?>">
                        <input type="hidden" name = "ID" value="<?php echo $ID;?>">
                        <input type="submit" name="submit" value="Update Admin"class="btn-update">
                    </td>    
                </tr>

            </table>   
        </form>

<?php

    //check whether the submit buttom is clicked or not
    if(isset($_POST['submit']))
    {
        //GET all the values from form to update
        $ID = $_POST['ID'];
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];
        $current_image = $_POST['current_image'];

        if(isset($_FILES['pic']['name']))
        {
            $image_name = $_FILES['pic']['name'];

            if($image_name != "")
            {
                //a. upload the new image
                $ext = end(explode('.',$image_name));

                $image_name = "Admin_".rand(000, 999).'.'.$ext; //e.g. Admin_816.jpg

                $source_path = $_FILES['pic']['tmp_name'];
                $destination_path = "image/admin/".$image_name;

                //finally upload
                $upload = move_uploaded_file($source_path,$destination_path);

                if($upload == false)
                {
                    $_SESSION['upload'] = "<div class='error'>Failed to upload image.</div>";
                    header("location:".SITEURL.'admin_pro.php');
                    //stop process
                    die();
                }

                //b. remove the current image
                if($current_image!="")
                {
                    $remove_path = "image/admin/".$current_image;

                    $remove = unlink($remove_path);

                    if($remove == false)
                    {
                        $_SESSION['failed-remove'] = "<div class='error'>Failed to remove current image.</div>";
                        header("location:".SITEURL.'admin_pro.php');
                        die();
                    }
                }
                

            }
            else
            {
                $image_name = $current_image;
            }
        }
        else
        {
            $image_name = $current_image;
        }


        //create a sql query to update admin
        $sql2 = "UPDATE admin SET
            admin_name = '$full_name',
            admin_email = '$email',
            admin_gender = '$gender',
            admin_phone = '$phone',
            admin_profile_pic = '$image_name'
            WHERE admin_id = '$ID'
        ";

        //Execute the Query
        $res2 = mysqli_query($con, $sql2);

        if($res2 == TRUE)
        {
            //Query Executed and Admin Update
            $_SESSION['update'] = "<div class='success'>Admin Updated Successfully.</div>";
            //Redirect to manage admin page
            header('location:'.SITEURL.'admin_pro.php');
        }
        else
        {
            //Faile to update Admin
            $_SESSION['update'] = "<div class='error'>Failed to Updatded Admin.</div>";
            //Redirect to manage admin page
            header('location:'.SITEURL.'admin_pro.php');
        }
        
    }

?>
   </div>
</div>
<?php 

include('php/script.php')
?>
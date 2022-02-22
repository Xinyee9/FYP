<?php include('config/constants.php') ?>
        <?php
                if(isset($_GET['ID']))
                {
                    //1.get the id of selected admin
                    $ID = $_GET['ID'];
                    
                    //2.create sql query to get the details
                    $sql = "SELECT * FROM admin WHERE admin_id =$ID";
                    
                    //Execute the query
                    $res = mysqli_query($conn, $sql);

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
                        header('location:'.SITEURL.'admin/admin-pro.php');
                    }

                }
                else
                {
                    header('location:'.SITEURL.'admin/admin-pro.php');
                }    
        ?>

<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="edit.css"> 
</head>
    
<body> 
<div class="wrapper">
    <div class="inner">
        <div class="image-holder">
        <?php
            if($current_image != "")
            {
                //display image
                ?>
                <img src="<?php echo SITEURL; ?>image/admin/<?php echo $current_image;?>">
                <?php
            } 
            else
            {
                echo "<div class='error'>Image not added.</div>";
            }
        ?>
        </div>
        <form action="" method ="POST" enctype="multipart/form-data">
        <h3>Updete Admin</h3>
            <div class ="form-wrapper"> 
                <p>Full Name:</p> 
                <input type="text" name="full_name" value="<?php echo $full_name; ?>" placeholder="Full Name" class="form-control">
            </div>
            <div class ="form-wrapper"> 
                <p>Email:</p> 
                <input type="email" name="email" value="<?php echo $email; ?>" placeholder="Email" class="form-control">
            </div>
            <div class ="form-wrapper"> 
                <p>Phone Number:</p> 
                <input type="text" name="phone" value="<?php echo $phone; ?>" placeholder="Phone" class="form-control">
            </div> 
            <p>Gender:</p>
            <div class ="form-wrapper"> 
                    <input <?php if($gender == "male"){echo "checked";} ?> type="radio" name="gender" value="male" > Male
                    <input <?php if($gender == "female"){echo "checked";} ?> type="radio" name="gender" value="female" > Female
            </div>
            <br>
              
            <div class ="form-wrapper"> 
                <p>New Profile picture:</p> 
                <td><input type="file" name="pic" >
            </div>     
            <div>
                <input type="hidden" name = "current_image" value="<?php echo $current_image;?>">
                <input type="hidden" name = "ID" value="<?php echo $ID;?>">
                <button type="submit" name="submit" value="Update Admin">Update Admin
            </div>
  
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
                $destination_path = "../image/admin/".$image_name;

                //finally upload
                $upload = move_uploaded_file($source_path,$destination_path);

                if($upload == false)
                {
                    $_SESSION['upload'] = "<div class='error'>Failed to upload image.</div>";
                    header("location:".SITEURL.'admin/admin-pro.php');
                    //stop process
                    die();
                }

                //b. remove the current image
                if($current_image!="")
                {
                    $remove_path = "../image/admin/".$current_image;

                    $remove = unlink($remove_path);

                    if($remove == false)
                    {
                        $_SESSION['failed-remove'] = "<div class='error'>Failed to remove current image.</div>";
                        header("location:".SITEURL.'admin/admin-pro.php');
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
        $res2 = mysqli_query($conn, $sql2);

        if($res2 == TRUE)
        {
            //Query Executed and Admin Update
            $_SESSION['update'] = "<div class='success'>Admin Updated Successfully.</div>";
            //Redirect to manage admin page
            header('location:'.SITEURL.'admin/admin-pro.php');
        }
        else
        {
            //Faile to update Admin
            $_SESSION['update'] = "<div class='error'>Failed to Updatded Admin.</div>";
            //Redirect to manage admin page
            header('location:'.SITEURL.'admin/admin-pro.php');
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
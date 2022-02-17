<?php include('config/constants.php') ?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="apstyle.css">
        
    </head>
    
<div class="header">
        <div id="title">
            <h1>Add Admin</h1>

            <br /><br />
            <?php
                if(isset($_SESSION['add']))//Checking whether the session is set or not
                {
                    echo $_SESSION['add']; //Display Session Message
                    unset($_SESSION['add']); //REMoving Session Message
                }
                if(isset($_SESSION['upload']))//Checking whether the session is set or not
                {
                    echo $_SESSION['upload']; //Display Session Message
                    unset($_SESSION['upload']); //REMoving Session Message
                } 
            ?>
            
            <form action="" method ="POST" enctype="multipart/form-data">
                <table class = "tbl-30 ">
                    <tr>
                        <td><p2>Full Name :</p2></td>
                        <td><input type="text" name="full_name" placeholder="Enter your name" required></td>   
                    </tr>
                    <tr>
                        <td><p2>Email :</p2></td> 
                        <td><input type="email" name="email" placeholder="Enter your email" required></td>  
                    </tr>
                    <tr>
                        <td><p2>Gender :</p2></td>
                        <td><input type="radio" name="gender" value="male" > Male
					        <input type="radio" name="gender" value="female" > Female</td>  
                    </tr>
                    <tr>
                        <td><p2>Phone Number :</p2></td>
                        <td><input type="text" name="phone" placeholder="Enter your phone number" required></td>  
                    </tr>
                    <tr>
                        <td><p2>Password :</p2></td>
                        <td><input type="password" name="password" placeholder="Enter your password" ></td>  
                    </tr>
                    <tr>
                        <td><p2>Profile picture :</p2></td>
                        <td><input type="file" name="pic" ></td>  
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align:center">
                            <input style="border-radius: 5px; padding:2%;" type="submit" name="submit"  value="Add Admin"class="btn-add">
                        </td>
                        
                    </tr>

                </table>   
            </form>
<?php 
    if(isset($_POST['submit']))
    {
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        if(isset($_POST['gender']))
        {
            $gender = $_POST['gender'];
        }
        else
        {
            $gender = "female";
        }
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];
        $password = md5($_POST['password']);

        if(isset($_FILES['pic']['name']))
        {
            //upload image
            $image_name= $_FILES['pic']['name'];

            if($image_name != "")
            {
                $ext = end(explode('.',$image_name));

                $image_name = "Admin_".rand(000, 999).'.'.$ext; //e.g. Admin_816.jpg

                $source_path = $_FILES['pic']['tmp_name'];
                $destination_path = "../image/admin/".$image_name;

                //finally upload
                $upload = move_uploaded_file($source_path,$destination_path);

                if($upload == false)
                {
                    $_SESSION['upload'] = "<div class='error'>Failed to upload image.</div>";
                    header('location:'.SITEURL.'admin/add-admin.php');
                    //stop process
                    die();
                }
            }
        }
        else
        {
            //dont upload and save the image_name valus as blank
            $image_name="";
        }


        $sql = "INSERT INTO admin SET
            admin_name = '$full_name',
            admin_email = '$email',
            admin_gender = '$gender',
            admin_phone = '$phone',
            admin_password = '$password',
            admin_profile_pic = '$image_name'
        ";

        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        if($res == TRUE)
        {
            //echo "Data Inserted";
            $_SESSION['add'] = "<div class='success'>Admin Added Successfully</div>";
            header('location:'.SITEURL.'admin/admin-pro.php');
        }
        else
        {
            //echo "Faile to Insert Data";
            $_SESSION['add'] = "<div class='error'>Failed to Add Admin</div>";
            header('location:'.SITEURL.'admin/admin-pro.php');
        }
    }
?>
            
            </div>
</div>

<?php 

include('includes/script.php')
?>



            
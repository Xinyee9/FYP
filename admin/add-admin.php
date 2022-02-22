<?php include('config/constants.php') ?>
<html >
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="add.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>  
    <div class="container">
        <div class ="title"> Add Admin</div>

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
                <div class = "user-details">
                    <div class="input-box">
                        <span class="details">Full Name :</span>
                        <input type="text" name="full_name" placeholder="Enter your name" required>  
                    </div>
                    <div class="input-box">
                        <span class="details">Email :</span>
                        <input type="email" name="email" placeholder="Enter your email" required>  
                    </div>
                    <div class="input-box">
                        <span class="details">Phone Number :</span>
                        <input type="text" name="phone" placeholder="Enter your phone number" required>  
                    </div>
                    <div class="input-box">
                        <span class="details">Password :</span>
                        <input type="password" name="password" placeholder="Enter your password" required >  
                    </div>
                    
                </div>
                
                <div class ="gender-details">
                    <span class="gender-title">Gender :</span> 
                   
                        <input type="radio" name="gender" value="male" >Male
				        <input type="radio" name="gender" value="female" > Female
                    
                </div>
                
                <div class="input-box"><br>
                     <span class="details">Profile picture :</span>
                    <input type="file" name="pic">  
                </div>
           
                <div class="button">
                    <input type="submit" name="submit"  value="Add Admin">
                </div>  
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
</body>
</html>
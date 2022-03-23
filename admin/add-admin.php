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

            <form action="" method ="POST" enctype="multipart/form-data">
                <div class = "user-details">
                    <div class="input-box">
                        <span class="details" >First Name :</span>
                        <input type="text" name="fname" placeholder="Enter your first name" required>  
                    </div>
                    <div class="input-box">
                        <span class="details" >Last Name :</span>
                        <input type="text" name="lname" placeholder="Enter your last name" required>  
                    </div>
                    <div class="input-box">
                        <span class="details">Userame :</span>
                        <input type="text" name="full_name" placeholder="Enter your username" required>  
                    </div>
                    <div class="input-box">
                        <span class="details">Email :</span>
                        <input type="email" name="email" placeholder="Enter your email" required>  
                    </div>
                    
                    <div class="input-box">
                        <span class="details">Password :</span>
                        <input type="password" name="password" placeholder="Enter your password" required >  
                    </div>
                    
                    
                </div>
                
                <div class ="gender-details">
                    <span class="gender-title">Role :</span> 
                   
                        <input type="radio" name="role" value="Admin" >Admin
				        <input type="radio" name="role" value="User" > User
                    
                </div>
                
                
           
                <div class="button">
                    <input type="submit" name="submit"  value="Add Admin" class="btn-add">
                </div>  
            </form>
<?php 
    if(isset($_POST['submit']))
    {
        $full_name = $_POST['full_name'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        //$phone = $_POST['phone'];
        //$adress = $POST['adress'];
        if(isset($_POST['role']))
        {
            $role = $_POST['role'];
        }
        else
        {
            $role = "User";
        }
        $role = $_POST['role'];
        $fname = $_POST['fname'];
        $lname = $POST['lname'];
        

        /*if(isset($_FILES['pic']['name']))
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
                    //$_SESSION['upload'] = "<div class='error'>Failed to upload image.</div>";
                    //header('location:'.SITEURL.'admin/add-admin.php');
                    echo "<script>
                    alert('Failed to upload image.');
                    window.location.href='./add-admin.php';
                    </script>";
                    //stop process
                    die();
                }
            }
        }
        else
        {
            //dont upload and save the image_name valus as blank
            $image_name="";
        }*/

        $dup = mysqli_query($conn, "SELECT FROM users WHERE username = '$full_name' ");

        if(mysqli_num_rows($dup)>0)
        {
            echo "Admin Name is duplicate enter";
        }
        else{

        $sql = "INSERT INTO users SET
            username = '$full_name',
            userpassword = '$password',
            useremail = '$email',
            
            userprivilege = '$role',
            userfirstname = '$fname',
            userlastname = '$lname'
           
        ";

        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        if($res == TRUE)
        {
            //echo "Data Inserted";
            //$_SESSION['add'] = "<div class='success'>Admin Added Successfully</div>";
            //header('location:'.SITEURL.'admin/userstest.php');
            echo "<script>
                    alert('Admin Added Successfully.');
                    window.location.href='./userstest.php';
                    </script>";
        }
        else
        {
            //echo "Faile to Insert Data";
            //$_SESSION['add'] = "<div class='error'>Failed to Add Admin</div>";
            //header('location:'.SITEURL.'admin/userstest.php');
            echo "<script>
                    alert('Failed to Add Admin.');
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
</body>
</html>
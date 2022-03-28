<?php include('config/constants.php')?>
<html>
<head>
<meta charset='utf-8'>
<meta name='viewport' content='width=device-width, initial-scale=1'>

<link href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' rel='stylesheet'>
<link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<style>
body {
    background: /*#BA68C8*/linear-gradient(135deg, #71b7e6, #9b59b6);
}

.form-control:focus {
    box-shadow: none;
    border-color: linear-gradient(135deg, #71b7e6, #9b59b6);
}

.profile-button {
    background:linear-gradient(135deg, #71b7e6, #9b59b6);
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: linear-gradient(-135deg, #71b7e6, #9b59b6);
}

.profile-button:focus {
    background: #682773;
    box-shadow: none
}

.profile-button:active {
    background: #682773;
    box-shadow: none
}

.back:hover {
    color: #682773;
    cursor: pointer
}
.labels {
    font-size: 15px
}
.add-experience:hover {
    background: #BA68C8;
    color: #fff;
    cursor: pointer;
    border:#BA68C8
}
img{
    padding-top: 100px;
    max-width:100%;
}

</style>
</head>

<body oncontextmenu='return false' class='snippet-body'>
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
                        $role = $row['userprivilege'];
                        $fname = $row['userfirstname'];
                        $lname = $row['userlastname'];
                        //$current_image = $row['userpic'];   
                    }
                    else
                    {
                        $_SESSION['admin-no-found'] = "<div class='error'>Admin not found.</div>";
                        //Redirect to manage admin page
                        header('location:'.SITEURL.'admin/userstest.php');
                    }

                }
                else
                {
                    header('location:'.SITEURL.'admin/userstest.php');
                }    
        ?>
<form action="" method="POST" enctype="multipart/form-data">

<div class="container rounded bg-white mt-5">
    <div class="row">
        <div class="col-md-4 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <?php
                /*if ($current_image == "") 
                {
                    echo "<div class='error'>Image not added.</div>";
                } 
                else {
                    //display image
                    ?>
                    <img src="<?php echo SITEURL; ?>image/admin/<?php echo $current_image; ?>">
                    <?php
                }*/
                ?> 
                <span class="font-weight-bold">Username : <?php echo $full_name; ?></span>
                <span>Email : <?php echo $email; ?></span>
            </div>
        </div>
        
        <div class="col-md-8">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex flex-row align-items-center back"><i class="fa fa-long-arrow-left mr-1 mb-1"></i>
                    <h6><a href ="<?php echo SITEURL;?>admin/userstest.php" >Back to home</a></h6>
                    </div>
                    <h6 class="text-right">Edit Admin Profile </h6>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">First Name :</label><input type="text" name="fname" class="form-control" placeholder="First name" value="<?php echo $fname; ?>"></div>
                    <div class="col-md-6"><label class="labels">Last Name :</label><input type="text" name="lname" value="<?php echo $lname; ?>" class="form-control" placeholder="Last name" ></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Username :</label><input type="text" name="full_name" value="<?php echo $full_name; ?>" class="form-control" ></div>
                    <div class="col-md-6"><label class="labels">Email :</label><input type="email" name="email" value="<?php echo $email; ?>" class="form-control"></div>
                </div>
                
                <div class="row mt-3">
                   <div class="col-md-12"><label class="labels">Role :</label>
                   <input <?php if($role == "admin"){echo "checked";} ?> type="radio" name="role" value="admin" > Admin
                   <input <?php if($role == "user"){echo "checked";} ?> type="radio" name="role" value="user" > User
                   </div>
                </div>
               
                <div class="mt-5 text-right">
                    <input type="hidden" name="ID" value="<?php echo $row['userid']; ?>">
                    
                    <button class="btn btn-primary profile-button" type="submit" name="submit" value="Update Admin">Save Admin</button></div>
            </div>
        </div>
    </div>
</div>
 </form>
  <?php

//check whether the submit buttom is clicked or not
if (isset($_POST['submit'])) {
    //GET all the data from the form 
    $ID = $_POST['ID'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    //$current_image = $_POST['current_image'];
    

    /*if(isset($_FILES['pic']['name']))
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
                    header("location:".SITEURL.'admin/userstest.php');
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
        }*/

    //create a sql query to update admin
    $sql2 = "UPDATE users SET
    username = '$full_name',
    useremail = '$email',
    userprivilege = '$role',
    userfirstname = '$fname',
    userlastname = '$lname'
    
    WHERE userid = '$ID'
    ";

    //Execute the Query
    $res2 = mysqli_query($conn, $sql2);

    if($res2 == TRUE)
    {
        //Query Executed and Admin Update
        //$_SESSION['update'] = "<div class='success'>Admin Updated Successfully.</div>";
        //Redirect to manage admin page
        //header('location:'.SITEURL.'admin/userstest.php');
        echo "<script>
        alert('Admin Updated Successfully.');
        window.location.href='./userstest.php';
        </script>";
    }
    else
    {
        //Faile to update Admin
        //$_SESSION['update'] = "<div class='error'>Failed to Updatded Admin.</div>";
        //Redirect to manage admin page
        //header('location:'.SITEURL.'admin/userstest.php');
        echo "<script>
        alert('Failed to Updatded Admin.');
        window.location.href='./userstest.php';
        </script>";
    }

}

?>
                                <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js'></script>
                                <script type='text/javascript' src=''></script>
                                <script type='text/javascript' src=''></script>
                                <script type='text/Javascript'></script>
                                

                                </body>
</html> 
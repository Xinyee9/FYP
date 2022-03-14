<?php include('config/constants.php')?>
<?php
        if (isset($_GET['ID'])) {
            //1.get the id of selected admin
            $ID = $_GET['ID'];

            //2.create sql query to get the details
            $sql3 = "SELECT * FROM FOOD WHERE food_id =$ID";

            //Execute the query
            $res3 = mysqli_query($conn, $sql3);

           //get the value based on query executed
            $row3 = mysqli_fetch_assoc($res3);
                
            $code = $row3['food_code'];
            $food_name = $row3['food_name'];
            $price = $row3['food_price'];
            $description = $row3['food_description'];
            $current_image = $row3['food_image'];
            $stock = $row3['food_stock'];
            $status = $row3['food_status'];
            $current_admin = $row3['admin_id'];
            $current_category = $row3['cate_id'];
            $active = $row3['active'];
            
        }
        else {
            header('location:' . SITEURL . 'admin/food.php');
        }
        
        ?>
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

<form action="view.php" method="POST" enctype="multipart/form-data">

<div class="container rounded bg-white mt-5">
    <div class="row">
        <div class="col-md-4 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <?php
                if ($current_image == "") 
                {
                    echo "<div class='error'>Image not added.</div>";
                } 
                else {
                    //display image
                    ?>
                    <img src="<?php echo SITEURL; ?>Food/<?php echo $current_image; ?>">
                    <?php
                }
                ?> 
                <span class="font-weight-bold"><?php echo $food_name; ?></span>
                <span >RM <?php echo number_format($price, 2); ?> </span>
                <span>Status: <?php echo $status; ?></span>
            </div>
        </div>
        
        <div class="col-md-8">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex flex-row align-items-center back"><i class="fa fa-long-arrow-left mr-1 mb-1"></i>
                    <h6><a href ="<?php echo SITEURL;?>admin/food.php" >Back to home</a></h6>
                    </div>
                    <h6 class="text-right">Edit Food</h6>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Code :</label><input type="text" name="code" class="form-control" placeholder="code" value="<?php echo $code; ?>"></div>
                    <div class="col-md-6"><label class="labels">Food Name :</label><input type="text" name="food_name" value="<?php echo $food_name; ?>" class="form-control" ></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Price :</label><input type="number" name="price" value="<?php echo $price; ?>" min="1" max="120" step=0.1 class="form-control" ></div>
                    <div class="col-md-6"><label class="labels">Stock :</label><input type="text" name="stock" value="<?php echo $stock; ?>" min="0" max="500" class="form-control"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Description :</label> <textarea name="description"  placeholder="Description" class="form-control" ><?php echo $description;?></textarea></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Admin :</label>
                    <select name="admin" class="form-control">
                    <?php
                        //create 
                        $sql = "SELECT * FROM ADMIN ";

                        $res = mysqli_query($conn, $sql);

                        $count = mysqli_num_rows($res);
                        if ($count > 0) {
                            while ($row = mysqli_fetch_assoc($res)) {
                                $ID = $row['admin_id'];
                                $name = $row['admin_name'];

                                //echo "<option value='$ID'>$name</option>";
                    ?>

                        <option <?php if ($current_admin == $ID) {
                            echo "selected";
                         } ?> value="<?php echo $ID; ?>"> <?php echo $name; ?></option>

                    <?php
                        }
                    } else {
                        echo "<option value='0'>no ADMIN found</option>";
                        /**?>
                             <option value="0">no category found</option>
                            <?php **/
                    }

                    ?>
                </select>
                </div>
                <div class="col-md-6"> <label class="labels">Category :</label>
                <select name="category" class="form-control">
                    <?php
                        //create 
                        $sql2 = "SELECT * FROM CATEGORY ";

                        $res2 = mysqli_query($conn, $sql2);

                        $count = mysqli_num_rows($res2);
                        if ($count > 0) {
                            while ($row2 = mysqli_fetch_assoc($res2)) {
                                $cname = $row2['cate_name'];
                                $ID = $row2['category_id'];

                                //echo "<option value='$ID'>$cname</option>";
                    ?>

                            <option <?php if ($current_category == $ID) {
                                echo "selected";
                            } ?> value="<?php echo $ID; ?>"><?php echo $cname; ?></option>

                    <?php
                            }
                        } else {
                             echo "<option value='0'>no category found</option>";
                            /**?>
                                <option value="0">no category found</option>
                                <?php**/
                        }

                    ?>
                </select>
                </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Select new image :</label><br><input type="file" name="image" ></div>
                </div>
                <div class="row mt-3">
                   <div class="col-md-12"><label class="labels">Status:</label>
                   <input <?php if($status == "available"){echo "checked";} ?> type="radio" name="status" value="available" > Available
                   <input <?php if($status == "unavailable"){echo "checked";} ?> type="radio" name="status" value="unavailable" > Unavailable
                   </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Active:</label>
                    <input <?php if($active == "Yes"){echo "checked";} ?> type="radio" name="active" value="Yes" > Yes
                    <input <?php if($active == "No"){echo "checked";} ?> type="radio" name="active" value="No" > No
                    </div>
                </div>

               
                <div class="mt-5 text-right">
                    <input type="hidden" name="ID" value="<?php echo $row3['food_id']; ?>">
                    <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                    <button class="btn btn-primary profile-button" type="submit" name="submit" value="Update Food">Save Food</button></div>
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
    $code = $_POST['code'];
    $food_name = $_POST['food_name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $current_image = $_POST['current_image'];
    $stock = $_POST['stock'];
    $status = $_POST['status'];
    $admin = $_POST['admin'];
    $category = $_POST['category'];
    $active = $_POST['active'];

    if (isset($_FILES['image']['name'])) {
        $image_name = $_FILES['image']['name'];

        if ($image_name != "") {
            //a. upload the new image
            $ext = end(explode('.', $image_name));

            $image_name = "Food_" . rand(000, 999) . '.' . $ext; //e.g. Admin_816.jpg

            $src_path = $_FILES['image']['tmp_name'];
            $dest_path = "../Food/" . $image_name;

            //finally upload
            $upload = move_uploaded_file($src_path, $dest_path);

            if ($upload == false) {
                $_SESSION['upload'] = "<div class='error'>Failed to upload image.</div>";
                header("location:" . SITEURL . 'admin/food.php');
                //stop process
                die();
            }

            //remove image if new image is upload
            //b. remove the current image
            if ($current_image != "") {
                $remove_path = "../Food/" . $current_image;

                $remove = unlink($remove_path);

                if ($remove == false) {
                    $_SESSION['failed-remove'] = "<div class='error'>Failed to remove current image.</div>";
                    header("location:" . SITEURL . 'admin/food.php');
                    die();
                }
            }
        }else {
            $image_name = $current_image;}
    } else {
        $image_name = $current_image;
    }

    //update the food in database
    $sql4 = "UPDATE food SET
    food_code = '$code',
    food_name = '$food_name',
    food_price = $price,
    food_description='$description',
    food_image = '$image_name',
    food_stock = '$stock',
    food_status = '$status',
    admin_id = '$admin',
    cate_id = '$category',
    active = '$active'
    WHERE food_id='$ID'
    ";

    //Execute the Query
    $res4 = mysqli_query($conn, $sql4);

    if ($res4 == TRUE) {
        //Query Executed and food Update
        $_SESSION['update'] = "<div class='success'>Food Updated Successfully.</div>";
        //Redirect to manage food page
        header('location:' . SITEURL . 'admin/food.php');
    } else {
        //Faile to update food
        $_SESSION['update'] = "<div class='error'>Failed to Updatded Food.</div>";
        //Redirect to manage food page
        header('location:' . SITEURL . 'admin/food.php');
    }
}


?>

                                <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js'></script>
                                <script type='text/javascript' src=''></script>
                                <script type='text/javascript' src=''></script>
                                <script type='text/Javascript'></script>
                                

                                </body>
</html> 
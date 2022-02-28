<?php/** include('includes/header.php') */?>
<?php include('config/constants.php') ?>
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
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="edit.css"> 
    </head>
    
<body> 
<div class="wrapper">
    <div class="inner">
        <div class="image-holder">
        <?php
            if ($current_image == "") 
            {
                echo "<div class='error'>Image not added.</div>";
            } 
            else {
                //display image
            ?>
            <img src="<?php echo SITEURL; ?>Food/<?php echo $current_image; ?>" alt="image">
            <?php
            }
            ?>
        </div>
        <form action="" method="POST" enctype="multipart/form-data">
            <h3>Updete Food</h3>
            
            <div class ="form-wrapper">  
                <input type="text" name="code" value="<?php echo $code; ?>" placeholder="Food Code" class="form-control">
            </div>
            <div class ="form-wrapper">
                
                <input type="text" name="food_name" value="<?php echo $food_name; ?>" placeholder="Food Name" class="form-control">
            </div>
            
            <div class ="form-group">
                <input type="number" name="price" value="<?php echo $price; ?>" min="1" max="120" step=0.1 placeholder="Price" class="form-control">
                <input type="text" name="stock" value="<?php echo $stock; ?>" min="1" max="500" placeholder="Stock" class="form-control">
            </div>

            <div class ="form-wrapper">
                <textarea name="description" cols="30" rows="5" placeholder="Description" class="form-control" ><?php echo $description; ?></textarea>
            </div>

            <div class ="form-wrapper">
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
            <div class ="form-wrapper">  
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
                <p>Select new image: </p>
                <div class ="form-wrapper">
                    <input type="file" name="image">
                </div> 
                <p>Status: </p>
                <div class ="form-wrapper"> 
                    <input <?php if($status == "Yes"){echo "checked";} ?> type="radio" name="status" value="Yes" > Yes
                    <input <?php if($status == "No"){echo "checked";} ?> type="radio" name="status" value="No" > No
                    </div>

                <p>Active:</p>
                <div class ="form-wrapper"> 
                    <input <?php if($active == "Yes"){echo "checked";} ?> type="radio" name="active" value="Yes" > Yes
                    <input <?php if($active == "No"){echo "checked";} ?> type="radio" name="active" value="No" > No
                </div>
                
            <div>
                <input type="hidden" name="ID" value="<?php echo $row3['food_id']; ?>">
                <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                <button type="submit" name="submit" value="Update Food" >Update Food
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

    </div>
</div>
<?php

include('includes/script.php')
?>
</body> 
</html> 
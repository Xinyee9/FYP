<?php include('config/constants.php') ?>
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="add.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>  
    <div class="container">
        <div class ="title"> Add Food</div>
            <br /><br/>
            <?php
                if(isset($_SESSION['upload']))//Checking whether the session is set or not
                {
                    echo $_SESSION['upload']; //Display Session Message
                    unset($_SESSION['upload']); //REMoving Session Message
                } 
            ?>

            <form action="" method ="POST" enctype ="multipart/form-data">     
                <div class = "user-details">
                    <div class="input-box">
                        <span class="details">Code:</span>
                        <input type="text" name="code" placeholder="Code of the food" required> 
                    </div>
                    <div class="input-box">
                        <span class="details">Food Name:</span>
                        <input type="text" name="food_name" placeholder="Name of the food" required> 
                    </div>
                    <div class="input-box">
                        <span class="details">Price:</span>
                        <input type="number" name="price" placeholder="0.00" min="1" max="120" step=0.1 required> 
                    </div>
                    <div class="input-box">
                        <span class="details">Stock:</span>
                        <input type="number" name="stock" placeholder="xx" min="1" max="500" required> 
                    </div>
                    <div class="input-box">
                        <span class="details">Description:</span>
                        <textarea name="description" cols="40" rows="3" placeholder="Description of the food" ></textarea>
                    </div>
                    
                </div>
                <div class = "user-details">
                    <div class="input-box">
                        <span class="details">Admin:</span>
                        <select name="admin"> 

                            <?php
                                //create 
                                $sql="SELECT * FROM admin ";

                                $res = mysqli_query($conn, $sql);

                                $count = mysqli_num_rows($res);
                                if($count>0)
                                {
                                    while($row=mysqli_fetch_assoc($res))
                                    {
                                        $ID=$row['admin_id'];
                                        $name=$row['admin_name'];

                                        ?>

                                        <option value="<?php echo $ID; ?>"><?php echo $name; ?></option>

                                        <?php
                                    }
                                }
                                else
                                {
                                    ?>
                                    <option value="0">no admin found</option>
                                    <?php

                                }
                            
                            ?>
                            </select > 
                    </div>
                    <div class="input-box">
                        <span class="details">Category:</span>
                            <select name="category"> 

                            <?php
                                //create PHP code to display category from databasa 
                                $sql2 = "SELECT * FROM CATEGORY ";

                                //executing query
                                $res2 = mysqli_query($conn, $sql2);

                                //count rows to check whether we have category or not
                                $count = mysqli_num_rows($res2);

                                //if code is greater the zero, we have category 
                                if($count>0)
                                {
                                    while($row2=mysqli_fetch_assoc($res2))
                                    {
                                        //get the details of category
                                        $ID=$row2['category_id'];
                                        $cname=$row2['cate_name'];

                                        ?>

                                        <option value="<?php echo $ID; ?>"><?php echo $cname; ?></option>

                                        <?php
                                    }
                                }
                                else
                                {
                                    ?>
                                    <option value="0">no category found</option>
                                    <?php

                                }
                            
                            ?>
                            </select > 
                        </div>
                        </div>

                <div class="">
                    <span class="">Image:</span>
                    <input type="file" name="image">
                </div>
                <div class ="gender-details"><br><br>
                    <span class="gender-title">Status:</span>
                    <input type="radio" name="status" value="available"> Available
				    <input type="radio" name="status" value="unavailable" > Unavailable
                </div>
                <div class ="gender-details"><br><br>
                    <span class="gender-title">Active:</span>
                    <input type="radio" name="active" value="Yes">Yes
				    <input type="radio" name="active" value="No" > No
                </div>
                <div class="button">
                    <input type="submit" name="submit" value="Add Food">
                </div>  
            </form>
        

    <?php 

    //check whether the button is clicked or not
    if(isset($_POST['submit']))
    {
        //add the food in database
        //1.get the data from form
        $code = $_POST['code'];
        $food_name = $_POST['food_name'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $stock = $_POST['stock'];
        $status = $_POST['status'];
        $admin = $_POST['admin'];
        $category = $_POST['category'];
        if(isset($_POST['active']))
        {
            $active = $_POST['active'];
        }
        else
        {
            $active = "No";
        }

        //2.upload the image if selected
        //check whether the image is clicked or not and upload the image onli if the image is selected
        if(isset($_FILES['image']['name']))
        {
            //get the details of the selected image
            $image_name = $_FILES['image']['name'];

            if($image_name!="")
            {
                //A.renamege the image
                //get the extension of selected image
                $ext = end(explode('.',$image_name));

                //create new name for image
                $image_name = "Food_".rand(000, 999).".".$ext; //e.g. Food_816.jpg

                //b. upload the image
                //get the src path and destination path

                //source path is the current location of the image
                $src = $_FILES['image']['tmp_name'];

                //destination path for the image to be upload
                $dst = "../Food/".$image_name;

                //finally upload
                $upload = move_uploaded_file($src,$dst);

                //check whether image upload or not
                if($upload == false)
                {
                    $_SESSION['upload'] = "<div class='error'>Failed to upload image.</div>";
                    header('location:'.SITEURL.'admin/add-food.php');
                    //stop process
                    die();
                }
            }
        }
        else
        {
            //dont upload and save the image_name valus as blank
            $image_name = ""; //setting default value as blank
        }

        $dup = mysqli_query($conn, "SELECT FROM FOOD WHERE food_name = '$food_name' ");

        if(mysqli_num_rows($dup)>0)
        {
            echo "Food Name is duplicate enter";
        }
        else{

        //3.insert into database
        //create a sql query to save or add food
        $sql3 = "INSERT INTO food SET
            food_code = '$code',
            food_name = '$food_name',
            food_price = $price,
            food_description='$description',
            food_image = '$image_name',
            food_stock = '$stock',
            food_status= '$status',
            admin_id = '$admin',
            cate_id = '$category',
            active = '$active'
        ";
        //execute the query
        $res3 = mysqli_query($conn, $sql3);

        //check whether data inserted or not
        //4.redirect with message to manage food page
        if($res3 == TRUE)
        {
            //echo "Data Inserted";
            $_SESSION['add'] = "<div class='success'>Food Added Successfully.</div>";
            header("location:".SITEURL.'admin/food.php');
        }
        else
        {
            //echo "Faile to Insert Data";
            $_SESSION['add'] = "<div class='error'>Failed to Add Food.</div>";
            header("location:".SITEURL.'admin/food.php');
        }
    }
    }
?>

</div>
</div>

</body>
</html>
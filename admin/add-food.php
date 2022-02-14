<?php include('php/header.php') ?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">  
    </head>

<div class="header">
        <div id="title">
            <h1>Add Food</h1>

            <br /><br/>
            <?php
                if(isset($_SESSION['upload']))//Checking whether the session is set or not
                {
                    echo $_SESSION['upload']; //Display Session Message
                    unset($_SESSION['upload']); //REMoving Session Message
                } 
            ?>


            <form action="" method ="POST" enctype ="multipart/form-data">
                <table class = "tbl-30">
                    <tr>
                        <td>Code:</td>
                        <td><input type="text" name="code" placeholder="Code of the food" required></td>   
                    </tr>
                    <tr>
                        <td>Food Name:</td>
                        <td><input type="text" name="food_name" placeholder="Name of the food" required></td>   
                    </tr>
                    <tr>
                        <td>Price:</td> 
                        <td><input type="number" name="price" ></td>  
                    </tr>
                    <tr>
                        <td>Image:</td>
                        <td><input type="file" name="image"></td>  
                    </tr>
                    <tr>
                        <td>Stock:</td>
                        <td><input type="text" name="stock" ></td>  
                    </tr>
                    <tr>
                        <td>Status:</td>
                        <td><textarea name="status" cols="30" rows="5" placeholder="status of the food" ></textarea>
                        </td>                      
                    </tr>

                    <tr>
                        <td>Admin:</td>
                        <td>
                            <select name="admin"> 

                            <?php
                                //create 
                                $sql="SELECT * FROM admin ";

                                $res = mysqli_query($con, $sql);

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
                        </td>
                    <tr>
                        <td>Category:</td>
                        <td>
                            <select name="category"> 

                            <?php
                                //create PHP code to display category from databasa 
                                $sql2 = "SELECT * FROM CATEGORY ";

                                //executing query
                                $res2 = mysqli_query($con, $sql2);

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
                        </td>                      
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Add Food"class="btn-update">
                        </td>
                        
                    </tr>

                </table>   
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
        $stock = $_POST['stock'];
        $status = $_POST['status'];
        $admin = $_POST['admin'];
        $category = $_POST['category'];

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
                $dst = "image/food/".$image_name;

                //finally upload
                $upload = move_uploaded_file($src,$dst);

                //check whether image upload or not
                if($upload == false)
                {
                    $_SESSION['upload'] = "<div class='error'>Failed to upload image.</div>";
                    header('location:'.SITEURL.'add-food.php');
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

        //3.insert into database
        //create a sql query to save or add food
        $sql3 = "INSERT INTO food SET
            food_code = '$code',
            food_name = '$food_name',
            food_price = $price,
            food_image = '$image_name',
            food_stock = '$stock',
            food_status= '$status',
            admin_id = '$admin',
            cate_id = '$category'
        ";
        //execute the query
        $res3 = mysqli_query($con, $sql3);

        //check whether data inserted or not
        //4.redirect with message to manage food page
        if($res3 == TRUE)
        {
            //echo "Data Inserted";
            $_SESSION['add'] = "<div class='success'>Food Added Successfully.</div>";
            header("location:".SITEURL.'food.php');
        }
        else
        {
            //echo "Faile to Insert Data";
            $_SESSION['add'] = "<div class='error'>Failed to Add Food.</div>";
            header("location:".SITEURL.'food.php');
        }
    }
?>

</div>
</div>

<?php 

include('php/script.php')
?>
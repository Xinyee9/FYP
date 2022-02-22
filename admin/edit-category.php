<?php include('config/constants.php') ?>
<br /><br />
        <?php
                if(isset($_GET['ID']))
                {
                    //1.get the id of selected admin
                    $ID = $_GET['ID'];
                    
                    //2.create sql query to get the details
                    $sql = "SELECT * FROM CATEGORY WHERE category_id =$ID";
                    
                    //Execute the query
                    $res = mysqli_query($conn, $sql);

                    //count the rows to check whether the id is valid or not
                    $count = mysqli_num_rows($res);

                    if($count == 1)
                    {
                        //get the details
                        //echo "Admin Available"
                        $row = mysqli_fetch_assoc($res);

                        $ccode = $row['cate_code'];
                        $cname = $row['cate_name'];
                        
                    }
                    else
                    {
                        $_SESSION['cate-no-found'] = "<div class='error'>Category not found.</div>";
                        //Redirect to manage admin page
                        header('location:'.SITEURL.'admin/category.php');
                    }

                }
                else
                {
                    header('location:'.SITEURL.'admin/category.php');
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
        <form action="" method ="POST">
            <h3>Updete Food</h3>
            <div class ="form-wrapper">  
                <p>Category Code:</p>
                <input type="text" name="ccode" value="<?php echo $ccode; ?>" placeholder="Category Code" class="form-control">
            </div>
            <div class ="form-wrapper"> 
                <p>Category Name</p> 
                <input type="text" name="cname" value="<?php echo $cname; ?>" placeholder="Category Name" class="form-control">
            </div>
            
            <div>
                <input type="hidden" name = "ID" value="<?php echo $ID;?>">
                <button type="submit" name="submit" value="Update Category">Update Category
            </div>
        </form>
    </div>
</div>

<?php

    //check whether the submit buttom is clicked or not
    if(isset($_POST['submit']))
    {
        //GET all the values from form to update
        $ID = $_POST['ID'];
        $ccode = $_POST['ccode'];
        $cname = $_POST['cname'];

        //create a sql query to update admin
        $sql = "UPDATE CATEGORY SET
            cate_code = '$ccode',
            cate_name = '$cname'
            WHERE category_id = '$ID'
        ";

        //Execute the Query
        $res = mysqli_query($conn, $sql);

        if($res == TRUE)
        {
            //Query Executed and Admin Update
            $_SESSION['update'] = "<div class='success'>Category Updated Successfully.</div>";
            //Redirect to manage admin page
            header('location:'.SITEURL.'admin/category.php');
        }
        else
        {
            //Faile to update Admin
            $_SESSION['update'] = "<div class='error'>Failed to Updatded Category.</div>";
            //Redirect to manage admin page
            header('location:'.SITEURL.'admin/category.php');
        }
        
    }

?>
<?php 

include('includes/script.php')
?>
</body> 
</html> 
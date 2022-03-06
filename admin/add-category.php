<?php include('config/constants.php') ?>
<html >
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="add.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>  
    <div class="container">
        <div class ="title"> Add Category</div>

            <br /><br />
            <?php
                if(isset($_SESSION['add']))//Checking whether the session is set or not
                {
                    echo $_SESSION['add']; //Display Session Message
                    unset($_SESSION['add']); //REMoving Session Message
                } 
            ?>

            <form action="" method ="POST">
                <div class = "user-details">
                    <div class="input-box">
                        <span class="details">Category Code:</span>
                        <input type="text" name="ccode" placeholder="Category Code" required> 
                    </div>
                    <div class="input-box">
                        <span class="details">Category Name:</span>
                        <input type="text" name="cname" placeholder="Category Name" required> 
                    </div>
                </div>     
                <div class="button">
                    <input type="submit" name="submit"  value="Add Category">
                </div>

                </table>   
            </form>
            <?php 
            if(isset($_POST['submit']))
            {
                $ccode = $_POST['ccode'];
                $ccname = $_POST['cname'];

                $dup = mysqli_query($conn, "SELECT FROM category WHERE cate_name = '$ccname' ");

                if(mysqli_num_rows($dup)>0)
                {
                    echo "Category Name is duplicate enter";
                }
                else{
                $sql = "INSERT INTO CATEGORY SET
                cate_code = '$ccode',
                cate_name = '$ccname'
                ";

                $res = mysqli_query($conn, $sql);

                if($res == TRUE)
                {
                    //echo "Data Inserted";
                    $_SESSION['add'] = "<div class='success'>Category Added Successfully.</div>";
                    header("location:".SITEURL.'admin/category.php');
                }
                else
                {
                    //echo "Faile to Insert Data";
                    $_SESSION['add'] = "<div class='success'>Failed to Add Category.</div>";
                    header("location:".SITEURL.'admin/category.php');
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

<?php include('php/header.php') ?>
<div class="header">
        <div id="title">
            <h1>Add Category</h1>

            <br /><br />
            <?php
                if(isset($_SESSION['add']))//Checking whether the session is set or not
                {
                    echo $_SESSION['add']; //Display Session Message
                    unset($_SESSION['add']); //REMoving Session Message
                } 
            ?>

            <form action="" method ="POST">
                <table class = "tbl-30">
                    <tr>
                        <td>Category Code</td>
                        <td><input type="text" name="ccode" placeholder="Category Code" required></td>   
                    </tr>
                    <tr>
                        <td>Category Name</td> 
                        <td><input type="text" name="cname" placeholder="Category Name" required></td>  
                    </tr>
                        <td colspan="2">
                            <input type="submit" name="submit"  value="Add Category"class="btn-update">
                        </td>
                        
                    </tr>

                </table>   
            </form>
            <?php 
            if(isset($_POST['submit']))
            {
                $ccode = $_POST['ccode'];
                $ccname = $_POST['cname'];

                $sql = "INSERT INTO CATEGORY SET
                cate_code = '$ccode',
                cate_name = '$ccname'
                ";

                $res = mysqli_query($con, $sql);

                if($res == TRUE)
                {
                    //echo "Data Inserted";
                    $_SESSION['add'] = "<div class='success'>Category Added Successfully.</div>";
                    header("location:".SITEURL.'category.php');
                }
                else
                {
                    //echo "Faile to Insert Data";
                    $_SESSION['add'] = "<div class='success'>Failed to Add Category.</div>";
                    header("location:".SITEURL.'category.php');
                }
            }
    
            ?>
           
        </div>
</div>
<?php 

include('php/script.php')
?>

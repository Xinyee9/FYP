<?php include('php/header.php') ?>

<div class="header">
    <div id="title">
        <h1>Upade Category</h1>

        <br /><br />
        <?php
                if(isset($_GET['ID']))
                {
                    //1.get the id of selected admin
                    $ID = $_GET['ID'];
                    
                    //2.create sql query to get the details
                    $sql = "SELECT * FROM CATEGORY WHERE category_id =$ID";
                    
                    //Execute the query
                    $res = mysqli_query($con, $sql);

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
                        header('location:'.SITEURL.'category.php');
                    }

                }
                else
                {
                    header('location:'.SITEURL.'category.php');
                }

                
            ?>

        <form action="" method ="POST">
            <table class = "tbl-30">
                <tr>
                    <td>Category Code</td>
                    <td><input type="text" name="ccode" value="<?php echo $ccode; ?>" ></td>   
                </tr>
                <tr>
                    <td>Category Name</td> 
                    <td><input type="text" name="cname" value="<?php echo $cname; ?>" ></td>  
                </tr>
                <tr> 
                    <td colspan="2">
                        <input type="hidden" name = "ID" value="<?php echo $ID;?>">
                        <input type="submit" name="submit" value="Update Category"class="btn-update">
                    </td>    
                </tr>

            </table>   
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
        $res = mysqli_query($con, $sql);

        if($res == TRUE)
        {
            //Query Executed and Admin Update
            $_SESSION['update'] = "<div class='success'>Category Updated Successfully.</div>";
            //Redirect to manage admin page
            header('location:'.SITEURL.'category.php');
        }
        else
        {
            //Faile to update Admin
            $_SESSION['update'] = "<div class='error'>Failed to Updatded Category.</div>";
            //Redirect to manage admin page
            header('location:'.SITEURL.'category.php');
        }
        
    }

?>
<?php 

include('php/script.php')
?>
            
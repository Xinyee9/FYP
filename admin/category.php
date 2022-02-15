<?php include('includes/header.php') ?>

<div class="header">
    <div id="title">
        <h1>Manage category</h1>
        <br /><br />
            <!-- Buttom to Add Admin -->
            <a href ="<?php echo SITEURL;?>admin/add-category.php" class="btn-add">Add Category</a>
            <br /><br /><br />

            <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add']; //Display Session Message
                    unset($_SESSION['add']); //REMoving Session Message
                }
                
                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete']; //Display Session Message
                    unset($_SESSION['delete']); //REMoving Session Message
                }
                if(isset($_SESSION['cate-no-found']))
                {
                    echo $_SESSION['cate-no-found']; //Display Session Message
                    unset($_SESSION['cate-no-found']); //REMoving Session Message
                }
                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update']; //Display Session Message
                    unset($_SESSION['update']); //REMoving Session Message
                }
            ?>

            <table class = "tbl-full">
                <tr>
                    <th>ID</th>
                    <th>Category Code</th>  
                    <th>Category Name</th>                        
                    <th>Actions</th>  
                </tr>
                <?php
                    //Query to get all category
                    $sql = "SELECT * FROM CATEGORY";
                    //Execture the Query
                    $res = mysqli_query($conn, $sql);

                    //cout rows to check whether we have data in database or not
                    $count = mysqli_num_rows($res);

                    $sn=1;
                    //check whether we have data in database or not 
                    if($count>0)
                    {
                            
                            //we have data in database
                            while($rows=mysqli_fetch_assoc($res))
                            {
                                //get the data and display 
                                $ID = $rows['category_id'];
                                $ccode = $rows['cate_code'];
                                $ccname = $rows['cate_name'];

                                //display the value in our table
                                ?>

                                <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $ccode; ?></td>  
                                    <td><?php echo $ccname ; ?></td>                            
                                    <td>
                                        <a href="<?php echo SITEURL;?>admin/edit-category.php?ID=<?php echo $ID?>" class="btn-update">Update Admin</a>
                                        <a href="<?php echo SITEURL;?>admin/delete-category.php?ID=<?php echo $ID?>" class="btn-delete">Delete Admin</a>
                                    </td>  
                                </tr>

                                <?php
                            }
                    }
                    else
                    {
                        //we do not have data 
                        ?>

                        <tr>
                            <td colspan="4"><div class="error">No Category Added.</div></td>
                        </tr>
                        <?php
                    }
                
                ?>
                
                
            </table>
    </div>
</div>
<?php 

include('includes/script.php')
?>
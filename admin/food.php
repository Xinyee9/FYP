<?php include('includes/header.php') ?>

<div class="header">
    <div id="title">
        <h1>Manage Food</h1>
        <br /><br />
            <!-- Buttom to Add Admin -->
            <a href ="<?php echo SITEURL;?>admin/add-food.php" class="btn-add">Add Food</a>
            <br /><br /><br />

            <?php
                if(isset($_SESSION['add']))//Checking whether the session is set or not
                {
                    echo $_SESSION['add']; //Display Session Message
                    unset($_SESSION['add']); //REMoving Session Message
                } 
                if(isset($_SESSION['delete']))//Checking whether the session is set or not
                {
                    echo $_SESSION['delete']; //Display Session Message
                    unset($_SESSION['delete']); //REMoving Session Message
                }
                if(isset($_SESSION['upload']))
                {
                    echo $_SESSION['upload']; 
                    unset($_SESSION['upload']); 
                } 
                if(isset($_SESSION['unauthorize']))
                {
                    echo $_SESSION['unauthorize']; 
                    unset($_SESSION['unauthorize']); 
                }
                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update']; 
                    unset($_SESSION['update']); 
                }
                
                
            ?>

            <table class = "tbl-full">
                <tr>
                    <th>ID</th>
                    <th>Code</th>  
                    <th>Name</th>                     
                    <th>Price</th>
                    <th>Image</th>
                    <th>Active</th>    
                    <th>Actions</th>  
                </tr>
                
                <?php
                    //Query to get all admin
                    $sql = "SELECT * FROM FOOD";
                    //Execture the Query
                    $res = mysqli_query($conn, $sql);

                       //cout rows to check whether we have data in database or not
                        $count = mysqli_num_rows($res);//function to get all the rows in database

                        $sn=1;//create a variable and assign the value
                        //check the num of rows
                        if($count>0)
                        {
                            //we have data in database
                            while($rows=mysqli_fetch_assoc($res))
                            {
                                //get individul data
                                $ID = $rows['food_id'];
                                $code = $rows['food_code'];
                                $food_name = $rows['food_name'];
                                $price = $rows['food_price'];
                                //$description = $rows['food_description'];
                                $image_name = $rows['food_image'];
                                $active = $rows['active'];

                                //display the value in our table
                                ?>
                                <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $code; ?></td>  
                                    <td><?php echo $food_name; ?></td>                     
                                    <td>RM <?php echo number_format($price, 2); ?></td>
                                    <td>
                                        <?php  
                                            //check image name is available or not
                                            if($image_name=="")
                                            {
                                                //dissply message
                                                echo "<div class = 'error'>Image not added.</div>";
                                            }
                                            else
                                            {
                                                //display image
                                                ?>
                                                <img src="<?php echo SITEURL; ?>Food/<?php echo $image_name; ?>" width="100px">

                                                <?php
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo $active; ?></td>       
                                    <td>
                                        <a href="<?php echo SITEURL;?>admin/view.php?ID=<?php echo $ID; ?>" class="btn-update">View Food</a>
                                        <a href="<?php echo SITEURL;?>admin/delete-food.php?ID=<?php echo $ID; ?>&image_name=<?php echo $image_name;?>" class="btn-delete">Delete Food</a>
                                    </td>  
                                </tr>

                                <?php
                            }
                        }
                        else
                        {
                            //we do not have data in database
                            echo "<tr> <td colspan='6' class ='error'>Food not added.</td></tr>";
                        }
                    
                ?>
            </table>
    </div>
</div>
<?php 
include('includes/script.php'); 
?>
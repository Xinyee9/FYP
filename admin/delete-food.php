<?php  

    //include constants.php file here
    include ('config/constants.php');

    if(isset($_GET['ID']) && isset($_GET['image_name']))
    {
        //1.get the value and delete 
        $ID = $_GET['ID'];
        $image_name = $_GET['image_name'];

        if($image_name !="")
        {
            $path= "../Food/".$image_name;
            $remove = unlink($path);

            if($remove==false)
            {
                $_SESSION['upload'] = "<div class='error'>Faile to remove image.</div>";

                header('location:'.SITEURL.'admin/food.php');

                die();
            }
        }

        $sql = "DELETE FROM food WHERE food_id =$ID";
        $res = mysqli_query($conn, $sql);

        //check whether the query executed successfully or not
        if($res == true)
        {
        
            $_SESSION['delete'] = "<div class='success'>Food Deleted Successfully.</div>";
            header('location:'.SITEURL.'admin/food.php');
        }
        else
        {
               
            $_SESSION['delete'] = "<div class='error'>Failed to Delete Food. Try Again Later.</div>";
            header('location:'.SITEURL.'admin/food.php');
        }
    

    }
    else
    {
        $_SESSION['unauthorize'] = "<div class='error'>Unauthorized Access.</div>";
        header('location:'.SITEURL.'admin/food.php');
    }


    

    

?>
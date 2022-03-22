<?php  

    //include constants.php file here
    include ('config/constants.php');

    if(isset($_GET['ID']) AND isset($_GET['image_name']))
    {
        //1.get the value and delete 
        $ID = $_GET['ID'];
        $image_name = $_GET['image_name'];

        if($image_name !="")
        {
            $path= "../image/admin/".$image_name;
            $remove = unlink($path);

            if($remove == false)
            {
                $_SESSION['remove'] = "<div class='error'>Faile to remove image.</div>";

                header('location:'.SITEURL.'admin/userstest.php');

                die();
            }
        }
        $sql = "DELETE FROM users WHERE userid =$ID";
        $res = mysqli_query($conn, $sql);

        //check whether the query executed successfully or not
        if($res == true)
        {
        
            $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully.</div>";
            header('location:'.SITEURL.'admin/userstest.php');
        }
        else
        {
               
            $_SESSION['delete'] = "<div class='error'>Failed to Delete Admin. Try Again Later.</div>";
            header('location:'.SITEURL.'admin/userstest.php');
        }
    

    }
    else
    {
        header('location:'.SITEURL.'admin/userstest.php');
    }
?>
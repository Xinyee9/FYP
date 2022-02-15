<?php  

    //include constants.php file here
    include ('config/constants.php');

    //1.get the ID of admin to be delete
    $ID = $_GET['ID'];
    //2.create sql query to delete admin
    $sql = "DELETE FROM CATEGORY WHERE category_id =$ID";

    //Execute the query
    $res = mysqli_query($conn, $sql);

    //check whether the query executed successfully or not
    if($res == true)
    {
        //query executed successully and admin deleted
        //echo "Admin Deleted";
        //create session varible to display message
        $_SESSION['delete'] = "<div class='success'>Category Deleted Successfully.</div>";
        //Redirect to manage admin page
        header('location:'.SITEURL.'admin/category.php');
    }
    else
    {
        //failed to delete admin
        //echo "Failed to Delete Admin";
        $_SESSION['delete'] = "<div class='error'>Failed to Delete Category. Try Again Later.</div>";
        header('location:'.SITEURL.'admin/category.php');
    }
    //3.Redirect to manage admin page with message(success)

?>

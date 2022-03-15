

<?php include('includes/header.php') ?>
<?php

       /*if (isset($_GET['id'])) {
            //1.get the id of selected admin
            $id = $_GET['id'];

            //2.create sql query to get the details
            $sql3 = "SELECT * FROM transaction WHERE tran_id =$id";

            //Execute the query
            $res3 = mysqli_query($conn, $sql3);

           //get the value based on query executed
            $row3 = mysqli_fetch_assoc($res3);
                
            //$tran_id = $rows3['tran_id'];
            $tran_date = $rows3['tran_date'];
            $tran_address = $rows3['tran_address'];
            $tran_status = $rows3['tran_status'];
            $tran_payment_method = $rows3['tran_payment_method'];
            
        }
        else {
            header('location:' . SITEURL . 'admin/VandCorder.php');
        }*/
        
        ?>
        

                <div class="details">
                    <div class="recentOrders">
                        <div class="cardHeader">                    
                            <h2>Order view</h2>
                            <div class="">View All</div>   
                        </div>
                        <form action="VandCorder.php" method="POST" enctype="multipart/form-data">
                        <table >
                            <tbody>
                            
                                <tr>
                                    <td>
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i><br>
                                    <p><b>Order No.</b> <p>
                                    <p><b>Date: </b> <p>
                                    <p><b>Payment Type:</b> </p>
                                    <p><b>Status: </b> </p>
                                    </td>
                                </tr>
                                
                                <?php
                                   
                                ?>
                                <tr>
                                    <td>
                                        <p>Name:</p><br>
                                        <p>Address:</p><br>
                                        <p>Contact:</p><br>
                                        <p>Email:</p><br>
                                        <p>Note:</p><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    <p> Item 1:</p><br>
                                    </td> 
                                </tr>
                                <tr>
                                    <td>
                                    <p> Item 2:</p><br>
                                    </td> 
                                </tr>
                                <tr>
                                    <td>
                                    <p> Total:</p><br>
                                    <p style="text-align:right;" >Update</p>
                                    </td> 
                                </tr>
                            </tbody>
                            
</table>
</form></div></div>
</body>
</html>


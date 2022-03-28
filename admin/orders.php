<?php include('includes/header.php') ?>

                <div class="details">
                    <div class="recentOrders">
                        <div class="cardHeader">
                            
                            <h2>Order List</h2>
                            
                        </div>
                        <table>
                            <thead>
                                
                            </thead>
                            <tbody>
                            <?php
                                $sql = "SELECT * FROM trans";
                                $res = mysqli_query($conn, $sql);
                                $count = mysqli_num_rows($res);
                                $sn=1;
                                if($count>0)
                                {
                                    while($rows=mysqli_fetch_assoc($res))
                                    {
                                        $tran_id = $rows['transaction_id'];
                                        $tran_date = $rows['transaction_date'];
                                        $tran_time = $rows['transaction_time'];
                                        $status = $rows['status'];
                                    //$tran_payment_method = $rows['tran_payment_method'];	
                                ?>
                                <tr>
                                    <td>
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i><br>
                                    <p><b>Order No.</b> <?php echo $sn++; ?><p>
                                    <p><b>Date : </b> <?php echo $tran_date; ?><p>
                                    <p><b>Time :</b> <?php echo $tran_time;?></p>
                                    <p><b>Status : </b> <?php echo $status; ?> </p>
                                    </td>
                                    <td>
                                        <a href="<?php echo SITEURL;?>admin/VandCorder.php?ID=<?php echo $tran_id; ?>" class="btn-update">View </a>
                                    </td>  
                                </tr>
                                
                                
                                <?php
                                    
                                    }
                                }
                                else
                                {
                                    //we do not have data in database
                                    echo "<tr> <td colspan='2' class ='error'>No orders.</td></tr>";
                                }
                            
                    
                ?>
                
                            </tbody>
                        </table>
                    </div>
                
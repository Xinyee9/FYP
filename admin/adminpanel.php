<?php include('includes/header.php') ?>

                <div class="cardBox " style="grid-template-columns: repeat(4, 1fr);">
                    <div class="card">
                        <?php
                         $sql = "SELECT * FROM category";
                         $res =mysqli_query($conn,$sql);
                         $count = mysqli_num_rows($res); 
                        ?>
                        <div>
                            <div class="numbers"><?php echo $count;?></div>
                            <div class="cardName">Category</div>
                        </div>
                        <div class="iconBox">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="card">
                        <?php
                         $sql2 = "SELECT * FROM food WHERE active ='Yes'";
                         $res2 =mysqli_query($conn,$sql2);
                         $count2 = mysqli_num_rows($res2); 
                        ?>
                        <div>
                            <div class="numbers"><?php echo $count2;?></div>
                            <div class="cardName">Food</div>
                        </div>
                        <div class="iconBox">
                            <i class="fa fa-comment" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="card">
                        <?php
                         $sql3 = "SELECT * FROM trans";
                         $res3 =mysqli_query($conn,$sql3);
                         $count3 = mysqli_num_rows($res3); 
                        ?>
                        <div>
                            <div class="numbers"><?php echo $count3;?></div>
                            <div class="cardName">Total Orders</div>
                        </div>
                        <div class="iconBox">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="card">
                         <?php
                         //create SQL Query to Get Total Revenue Generated
                         //Aggregate Function in SQL
                         $sql4 = "SELECT SUM(subtotal) AS Total FROM real_cart";
                         //Execute the Query
                         $res4 =mysqli_query($conn,$sql4);
                         //get the value
                         $row4=mysqli_fetch_assoc($res4);
                         //get the total revenue
                         $total_revenue = $row4['Total']
                          
                        ?>
                        <div>
                            <div class="numbers">RM<?php echo number_format($total_revenue,2)?></div>
                            <div class="cardName">Revenue Generated</div>
                        </div>
                        <div class="iconBox">
                            <i class="fa fa-usd" aria-hidden="true"></i>
                        </div>
                        </div>
                    </div>


                <div class="details" style="padding-top: 0; grid-template-columns: 2fr 1fr;">
                    <div class="recentOrders">
                        <div class="cardHeader">
                            <h2>Recent Order</h2>
                            <a href="#" class="btn">View All</a>
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <td>Name</td>
                                    <td>Price</td>
                                    <td>Payment</td>
                                    <td>Status</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Blackpepper Chickenchop</td>
                                    <td>$20</td>
                                    <td>Paid</td>
                                    <td><span class="status delivered">Delivered</span></td>
                                </tr>
                                <tr>
                                    <td>Creammy Rigatoni Vege</td>
                                    <td>$11</td>
                                    <td>Due</td>
                                    <td><span class="status pending">Pending</span></td>
                                </tr>
                                <tr>
                                    <td>Steamed Cheeseburger</td>
                                    <td>$15</td>
                                    <td>Paid</td>
                                    <td><span class="status return">Return</span></td>
                                </tr>
                                <tr>
                                    <td>Chickenchop with Mushroom</td>
                                    <td>$6</td>
                                    <td>Due</td>
                                    <td><span class="status inprogress">In Progress</span></td>
                                </tr>
                                <tr>
                                    <td>Spaghetti Aglio e Olio</td>
                                    <td>$12</td>
                                    <td>Paid</td>
                                    <td><span class="status delivered">Delivered</span></td>
                                </tr>
                                <tr>
                                    <td>Wild Salmon Burgers</td>
                                    <td>$11</td>
                                    <td>Due</td>
                                    <td><span class="status pending">Pending</span></td>
                                </tr>
                                <tr>
                                    <td>Spaghetti Bolognese</td>
                                    <td>$9</td>
                                    <td>Paid</td>
                                    <td><span class="status return">Return</span></td>
                                </tr>
                                <tr>
                                    <td>Beef Burgers</td>
                                    <td>$16</td>
                                    <td>Due</td>
                                    <td><span class="status inprogress">In Progress</span></td>
                                </tr>
                                <tr>
                                    <td>Creammy Corn Gemelli</td>
                                    <td>$8</td>
                                    <td>Paid</td>
                                    <td><span class="status delivered">Delivered</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="recentCustomer">  
                        <div class="cardHeader">
                            <h2>Customers</h2>
                        </div>
                        <table>
                            <tbody>
                                <?php
                                    $mysql = "SELECT * FROM users WHERE userprivilege = 'user'";
                                    $result = mysqli_query($conn, $mysql);
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                        echo '<tr>
                                                <td width="60px"><div class="imgBx"><img src="../image/user.png"></div></td>
                                                <td><h4>'.$row["username"].'<br></h4></td>
                                            </tr>';
                                    }
                                ?>
                                <!-- <tr>
                                    <td width="60px"><div class="imgBx"><img src="../image/user.png"></div></td>
                                    <td><h4>echo $username<br><span>Italy</span></h4></td>
                                </tr>
                                <tr>
                                    <td width="60px"><div class="imgBx"><img src="../image/user.png"></div></td>
                                    <td><h4>Muhammad<br><span>India</span></h4></td>
                                </tr>
                                <tr>
                                    <td width="60px"><div class="imgBx"><img src="../image/user.png"></div></td>
                                    <td><h4>Amelia<br><span>France</span></h4></td>
                                </tr>
                                <tr>
                                    <td width="60px"><div class="imgBx"><img src="../image/user.png"></div></td>
                                    <td><h4>Olivia<br><span>USA</span></h4></td>
                                </tr>
                                <tr>
                                    <td width="60px"><div class="imgBx"><img src="../image/user.png"></div></td>
                                    <td><h4>Amit<br><span>Japan</span></h4></td>
                                </tr>
                                <tr>
                                    <td width="60px"><div class="imgBx"><img src="../image/user.png"></div></td>
                                    <td><h4>Ashraf<br><span>India</span></h4></td>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

<?php 
include('includes/script.php'); 
?>
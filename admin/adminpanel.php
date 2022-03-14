<?php include('includes/header.php') ?>

                <div class="cardBox " style="grid-template-columns: repeat(4, 1fr);">
                    <div class="card">
                        <div>
                            <div class="numbers">1024</div>
                            <div class="cardName">Daily Views</div>
                        </div>
                        <div class="iconBox">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="card">
                        <div>
                            <div class="numbers">80</div>
                            <div class="cardName">Sales</div>
                        </div>
                        <div class="iconBox">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="card">
                        <div>
                            <div class="numbers">208</div>
                            <div class="cardName">Comments</div>
                        </div>
                        <div class="iconBox">
                            <i class="fa fa-comment" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="card">
                        <div>
                            <div class="numbers">$6,042</div>
                            <div class="cardName">Earning</div>
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
                            <h2>Recent Customers</h2>
                        </div>
                        <table>
                            <tbody>
                                <tr>
                                    <td width="60px"><div class="imgBx"><img src="img1.jpg"></div></td>
                                    <td><h4>David<br><span>Italy</span></h4></td>
                                </tr>
                                <tr>
                                    <td width="60px"><div class="imgBx"><img src="img2.jpg"></div></td>
                                    <td><h4>Muhammad<br><span>India</span></h4></td>
                                </tr>
                                <tr>
                                    <td width="60px"><div class="imgBx"><img src="img3.jpg"></div></td>
                                    <td><h4>Amelia<br><span>France</span></h4></td>
                                </tr>
                                <tr>
                                    <td width="60px"><div class="imgBx"><img src="img4.jpg"></div></td>
                                    <td><h4>Olivia<br><span>USA</span></h4></td>
                                </tr>
                                <tr>
                                    <td width="60px"><div class="imgBx"><img src="img5.jpg"></div></td>
                                    <td><h4>Amit<br><span>Japan</span></h4></td>
                                </tr>
                                <tr>
                                    <td width="60px"><div class="imgBx"><img src="img6.jpg"></div></td>
                                    <td><h4>Ashraf<br><span>India</span></h4></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

<?php 
include('includes/script.php'); 
?>
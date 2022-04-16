<?php include('includes/header.php') ?>

<div class="cardBox " style="grid-template-columns: repeat(4, 1fr);">
    <div class="card">
        <?php
        $sql = "SELECT * FROM category";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);
        ?>
        <div>
            <div class="numbers"><?php echo $count; ?></div>
            <div class="cardName">Category</div>
        </div>
        <div class="iconBox">
            <i class="fa fa-pie-chart" aria-hidden="true"></i>
        </div>
    </div>
    <div class="card">
        <?php
        $sql2 = "SELECT * FROM food WHERE active ='Yes'";
        $res2 = mysqli_query($conn, $sql2);
        $count2 = mysqli_num_rows($res2);
        ?>
        <div>
            <div class="numbers"><?php echo $count2; ?></div>
            <div class="cardName">Food</div>
        </div>
        <div class="iconBox">
            <i class="fa fa-cutlery" aria-hidden="true"></i>
        </div>
    </div>
    <div class="card">
        <?php
        $sql3 = "SELECT * FROM trans";
        $res3 = mysqli_query($conn, $sql3);
        $count3 = mysqli_num_rows($res3);
        ?>
        <div>
            <div class="numbers"><?php echo $count3; ?></div>
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
        $sql4 = "SELECT * FROM real_cart, trans where real_cart.transaction_id = trans.transaction_id and delivery_status != 'Cancelled by Admin' and delivery_status != 'Cancelled by User'";
        //Execute the Query
        $res4 = mysqli_query($conn, $sql4);
        //get the value
        $total_revenue = 0;
        while ($row4 = mysqli_fetch_assoc($res4))
        {
            $subtotal = $row4['subtotal'];
            $total_revenue += $subtotal;
        }
        //get the total revenue
        // $total_revenue = $row4['Total'];

        ?>
        <div>
            <div class="numbers">RM<?php echo number_format($total_revenue, 2) ?></div>
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
            <h2>Recent Order (Showing last 5 orders)</h2>
            <a href="./orders.php" class="btn">View All</a>
        </div>
        <p>Click on transaction ID to view order detail</p>
        <table>
            <thead>
                <tr>
                    <td>No.</td>
                    <td>Transaction ID</td>
                    <td>Estimated Finish Order Time</td>
                    <td>Status</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 0;
                $query = "SELECT * FROM trans ORDER BY transaction_id DESC LIMIT 5";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    $count++;
                    if ($row['delivery_status'] == 'Delivered') {
                        $status = '<td><span class="status delivered">Delivered</span></td>';
                    } else if ($row['delivery_status'] == 'Preparing') {
                        $status = '<td><span class="status pending">Preparing</span></td>';
                    } else if ($row['delivery_status'] == 'Yet to be delivered') {
                        $status = '<td><span class="status inprogress">Yet to be delivered</span></td>';
                    } else if ($row['delivery_status'] == 'Cancelled by Admin') {
                        $status = '<td><span class="status return">Cancelled by Admin</span></td>';
                    } else if ($row['delivery_status'] == 'Cancelled by User') {
                        $status = '<td><span class="status return">Cancelled by User</span></td>';
                    } else {
                        $status = '<td><span class="status confirm">Order Confirmed</span></td>';
                    }
                ?>
                    <tr>
                        <td><?php echo $count ?> </td>
                        <td><a href="./VandCorder.php?ID=<?php echo $row['transaction_id'] ?>"><?php echo $row['transaction_id'] ?></a></td>
                        <td><?php echo $row['e_d_time'] ?></td>
                        <?php echo $status ?>
                    </tr>
                <?php
                }
                ?>
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
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>
                                                <td width="60px"><div class="imgBx"><img src="../image/user.png"></div></td>
                                                <td><h4>' . $row["username"] . '<br></h4></td>
                                            </tr>';
                }
                ?>

            </tbody>
        </table>
    </div>
</div>
</div>
</div>

<?php
include('includes/script.php');
?>
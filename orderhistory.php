<?php
session_start();
require_once('./php/dbconnect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('user/include/header.php');
    ?>
    <title>User Information</title>
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
</head>

<body>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <style>
    /* The sidebar menu */
    @media screen and (max-height: 450px) {
        .sidenav {
            padding-top: 15px;
        }

        .sidenav a {
            font-size: 18px;
        }
    }

    .sidenav {
        height: 100%;
        /* Full-height: remove this if you want "auto" height */
        width: 240px;
        /* Set the width of the sidebar */
        position: fixed;
        /* Fixed Sidebar (stay in place on scroll) */
        z-index: 1;
        /* Stay on top */
        top: 0;
        /* Stay at the top */
        left: 0;
        background-color: #111;
        /* Black */
        overflow-x: hidden;
        /* Disable horizontal scroll */
        padding-top: 20px;

    }

    /* The navigation menu links */
    .sidenav a {
        padding: 6px 8px 6px 16px;
        text-decoration: none;
        font-size: 20px;
        color: #818181;
        display: block;
        transition: all 0.3s;
    }

    /* When you mouse over the navigation links, change their color */
    .sidenav a:hover {
        color: #f1f1f1;

    }

    .button {
        background-color: #008cba;
    }

    button {
        border: none;
        color: white;
        padding: 20px 32px;
        text-align: center;
        text-decoration: none;
        display: outline-block;
        font-size: 16px;
        margin: 10px 8px;
        cursor: pointer;
    }

    header {
        color: white;
        font-size: 40px;
        text-align: center;
        padding: 18px 20px;
        margin-bottom: 5px;
        cursor: pointer;
        transition: all 0.3s;
    }

    header:hover {
        padding-left: 25px;
    }

    .sidenav p {
        color: white;
        margin: 0 1.0rem;
        font-size: 16pt;
    }

    .sidenav span {
        color: white;
        margin-left: 1.0rem;
        font-size: 12pt;
        text-indent: 10px;
    }
    table {
        width: 100%;
        /*border-collapse: collapse;*/
        margin-top: 10px;
    }
    table td {
        font-weight: 600;
    }
    table tr {
        border-bottom: 1px solid rgba(0, 0, 0, 0.2); 
    }
    table tr td {
        padding: 9px 5px;
    }
</style>

<head>
    <script src="https://use.fontawesome.com/37d1b5f99d.js"></script>

</head>

<div class="sidenav sidebar col-2">

    <header onclick="location.href ='index.php'">
        <span style="color: White;font-size:30px; ">
            <i class="fa fa-home pull-left" aria-hidden="true"> Food</i>
        </span>
    </header>

    <a href="orderhistory.php">Order history</a>
</div>

        <div class="container-fluid">

            <div class="row">
                <div class="col-10">

                    <span class="display-1 ">Order history</span>
                    <hr>
                    <h5>Your order information</h5>
                    <hr>
                </div>
            </div>
            <div class="row">
                <!--/col-3-->
                <div class="col-sm-12">
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="first_name">
                                    <h4>Order list</h4>
                                </label>   
                                <table>

                            <?php
                            if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1) { //check login
                                $userid = $_SESSION['id'];
                            }
                                $sql = "SELECT * FROM trans WHERE userid = '$userid' ";
                            
                                //$sql = "SELECT * FROM trans ";
                                $res = mysqli_query($con, $sql);
                                $count = mysqli_num_rows($res);
                                $sn=1;
                            
                                if($count>0)
                                {
                                    while($rows=mysqli_fetch_assoc($res))
                                    {
                                        $tran_id = $rows['transaction_id'];
                                        $tran_date = $rows['transaction_date'];
                                        $tran_time = $rows['transaction_time'];	
                                        $status = $rows['delivery_status'];
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
                                    <button class="btn btn-lg btn-success" type="submit">
                                        <a href="historyview.php?ID=<?php echo $tran_id; ?>" class="glyphicon glyphicon-ok-sign" style="color: white"; >View </a>
                                    </button>
                                    </td>  
                                </tr>
                                
                                
                                <?php
                                    
                                    }
                                }
                                else
                                {
                                    //we do not have data in database
                                    echo "<tr> <td colspan='2' class ='error'>NO HISTORY.</td></tr>";
                                }
                    
                ?>
                        </table>
                            </div>
                        </div>
                </div>
                <!--/tab-content-->
            </div>

            <!--/col-9-->
        </div>
        <!--/row-->
    </main>
</body>

</html>

<?php
include('user/include/footer.php');
?>
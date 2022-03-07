<?php include('includes/header.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
    <title>Contact Us</title>
    <style>
        .main {
            position: absolute;
            /* width: calc(100% - 300px); */
            width: 1180px;
            left: 120px;
            min-height: 100vh;
            background: #f5f5f5;
            transition: 0.5s;
        }

        .main.active {
            /* width: calc(100% - 60px); */
            width: 1400px;
            left: -140px;
        }
    </style>
</head>


<?php
include("../php/dbconnect.php");
include("../templates/top.php");


if (isset($_POST['changestatus'])) {
    if ($_POST['changestatus'] == "reply") {
        $id = $_POST['id'];
        $query = "UPDATE contactus SET conStatus = '1' where conID = '$id'";
        $result = mysqli_query($con, $query);
        if ($result) {
            echo "<script>alert('The status has been changed to Replied')</script>";
        }
    } else if ($_POST['changestatus'] == "xreply") {
        $id = $_POST['id'];
        $query = "UPDATE contactus SET conStatus = '0' where conID = '$id'";
        $result = mysqli_query($con, $query);
        if ($result) {
            echo "<script>alert('The status has been changed to Haven\'t reply yet')</script>";
        }
    }
}
?>

<body>
    <div class="container-fluid">
        <div class="row" style="display: block;">

            <div class="header">
                <div id="title">
                    <h1><i class="fa fa-phone"></i> Contact Us</h1>
                </div>

                <span>
                    Note: Staff have to reply to customer by their email and change the status here once replied.
                </span>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="">
                    <?php
                    $query = "SELECT * from contactus order by conID desc";
                    $result = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $row['conID']; ?></td>
                            <td><?php echo $row['conName']; ?></td>
                            <td><?php echo $row['conEmail']; ?></td>
                            <td><?php echo $row['conPhone']; ?></td>
                            <?php
                            $message = nl2br($row['conMessage']);
                            $message = str_replace(array("\n", "\r"), '', $message);
                            ?>



                            <td><a class='btn btn-sm btn-info' data-toggle='modal' data-target='#view_message_modal' onclick="message('<?php echo $message; ?>')">Click to view massage</a></td>
                            <td>




                                <?php
                                if ($row['conStatus'] == 0) {
                                    echo '<span style="color: red;">Haven\'t reply yet</span>';
                                    $changestatus = "reply";
                                    $btntt = 'Change to Replied';
                                } else if ($row['conStatus'] == 1) {
                                    echo '<span style="color: Green;">Replied</span>';
                                    $changestatus = "xreply";
                                    $btntt = 'Change to Haven\'t reply yet';
                                }
                                ?>
                            </td>
                            <td>
                                <form method="post">
                                    <input type="hidden" value="<?php echo $row['conID']; ?>" name="id">
                                    <button class="btn btn-sm btn-info" title="<?php echo $btntt ?>" value="<?php echo $changestatus ?>" name="changestatus" type="submit">Change</button>
                                </form>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
</body>

<div class="modal fade" id="view_message_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <div class="row">
                        <div class="col" id="message"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</html>
<?php
include("../templates/footer.php");
include('includes/script.php');
?>

<script>
    function message(message) {
        console.log(message);
        document.getElementById("message").innerHTML = message;
    }
</script>
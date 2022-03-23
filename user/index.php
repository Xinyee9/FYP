<?php
session_start();
require_once('../php/dbconnect.php');


if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1) { //check login
    $userid = $_SESSION['id'];
}
    $query = "SELECT * FROM users WHERE userid = '$userid'";
    $result = mysqli_query($con, $query);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $userfirstname = $row['userfirstname'];
        $userlastname = $row['userlastname'];
        $useremail = $row['useremail'];
        $username = $row['username'];
    }

if (isset($_POST['save']) && $_POST['save'] == 1) {
    $userfirstname = $_POST['first_name'];
    $userlastname = $_POST['last_name'];
    $newusername = stripslashes($_REQUEST['username']);
    $newusername = mysqli_real_escape_string($con, $newusername);
    // $newemail = stripslashes($_REQUEST['email']);
    // $newemail = mysqli_real_escape_string($con, $newemail);

    $query = "SELECT * FROM users WHERE username='$newusername' AND username!='$username'";
    $result = mysqli_query($con, $query);
    $rows = mysqli_num_rows($result);
    $sql = "SELECT * FROM users WHERE useremail='$newemail' AND useremail!='$useremail'";
    $result = mysqli_query($con, $sql);
    $rowss = mysqli_num_rows($result);
    if ($rows >= 1) { //check username in use
        echo "<script>
        alert('Username in used!\\nPlease try again.');
        window.location.href='./index.php';
        </script>";
        exit;
    }
    // else if ($rowss >= 1) { //check email in use
    //     echo "<script>
    //     alert('Email in used!\\nPlease try again.');
    //     window.location.href='./index.php';
    //     </script>";
    //     exit;
    // }
    else {
        $query = "UPDATE users SET userfirstname = '$userfirstname', userlastname = '$userlastname', useremail = '$newemail',username = '$newusername' WHERE userid = $userid";
        $result = mysqli_query($con, $query);
        if ($result) {
            $_SESSION['username'] = $newusername;
            echo "<script>
            alert('Your information is saved');
            </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('./include/header.php');
    ?>
    <title>User Information</title>
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
</head>

<body>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <?php
        include('./usersidebar.php');
        ?>

        <div class="container-fluid">

            <div class="row">
                <div class="col-10">

                    <span class="display-1 ">User Information</span>
                    <hr>
                    <h5>Edit your personal information</h5>
                    <hr>
                </div>
            </div>
            <div class="row">
                <!--/col-3-->
                <div class="col-sm-12">
                    <form class="form" action="##" method="post" id="registrationForm">
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="first_name">
                                    <h4>First name</h4>
                                </label>
                                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="<?php echo $userfirstname ?>" required />
                                <?php
                                // $db = mysqli_connect('localhost', 'root', '', 'aurora');
                                // $user_check_query = "SELECT * FROM users WHERE userid = '" . $_SESSION['userid'] . "' ";
                                // // $user_check_query = "SELECT * FROM users WHERE userid = $userid";
                                // $result = mysqli_query($db, $user_check_query);
                                // while ($row = mysqli_fetch_assoc($result)) {
                                //     echo "" . $user['userfirstname'] . " ";
                                //     // echo $row['userfirstname'];
                                // }
                                ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="last_name">
                                    <h4>Last name</h4>
                                </label>
                                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value="<?php echo $userlastname ?>" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="email">
                                    <h4>E-mail</h4>
                                </label>
                                <!-- <input type="email" class="form-control" id="email" name="email" value="<?php echo $useremail ?>"> -->
                                <div class="form-control" id="email"><?php echo $useremail ?></div>
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="last_name">
                                    <h4>Username</h4>
                                </label>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username ?>" required />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <br />
                                <input type="hidden" name="save" value="1">
                                <button class="btn btn-lg btn-success" type="submit">
                                    <i class="glyphicon glyphicon-ok-sign"></i> Save
                                </button>

                            </div>
                        </div>
                    </form>

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
include('./include/footer.php');
?>
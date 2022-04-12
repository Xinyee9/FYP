<?php
session_start();
require_once('php/dbconnect.php');

if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1) { //check login
    $userid = $_SESSION['id'];
}

if (isset($_POST['save']) && $_POST['save'] == 1) {
    $oldpassword = stripslashes($_REQUEST['oldpassword']); //get password from form
    $oldpassword = mysqli_real_escape_string($con, $oldpassword);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con, $password);
    $conpass = stripslashes($_REQUEST['conpass']);
    $conpass = mysqli_real_escape_string($con, $conpass);

    if ($password == $conpass) { //check password match with confirm password
        $query = "SELECT * FROM users where userpassword='$oldpassword'and userid = '$userid';"; //check current password exist
        $result = mysqli_query($con, $query);
        $rows = mysqli_num_rows($result);
        if ($rows == 0) { //if current password not exist, print error
            echo "<script>
            alert('Current password wrong!\\nPlease try again.');
            </script>";
        } else {
            //current password correct and new pass match with con pass, save new password to database
            $query = "UPDATE users SET userpassword = '$password' WHERE userid = '$userid';";
            $result = mysqli_query($con, $query);
            if ($result) {
                echo "<script>
                alert('Account information updated.');
                </script>";
            }
        }
    } else { //password not matched, print error
        echo "<script>
        alert('Password and Confirm Password not matched\\nPlease try again.');
        </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('./user/include/header.php');
    ?>
    <title>Change Password</title>
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
            background-color: #3939ac;
            /* 45% darker blue */
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
    </style>
    
    <head>
        <script src="https://use.fontawesome.com/37d1b5f99d.js"></script>
    
    </head>
    
    <div class="sidenav sidebar col-2">
    
        <header onclick="location.href ='./'">
            <span style="color: White;font-size:30px; ">
                <i class="fa fa-home pull-left" aria-hidden="true"> Food</i>
            </span>
        </header>
    
        <p>Logged as - </p>
        <span> <?php
                echo $_SESSION['username'];
                ?></span>
        <a href="adminprofile.php">Admin Information</a>
        <a href="adminchange.php">Change Password</a>
        <button class="btn btn-secondary btn-lg" onclick="location.href ='php/logout.php'">Log out</button>
    
    </div>
        <div class="container-fluid">
            <span class="display-1 ">Change Password</span>
            <hr>
            <h5>Change your account password</h5>
            <hr>
            <form method="POST">
                <form>
                    <div class="mb-3">
                        <label for="password" class="form-label">
                            <h5>Old Password</h5>
                        </label>
                        <input type="password" class="form-control" id="oldpassword" name="oldpassword" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">
                            <h5>Password</h5>
                        </label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="conpass" class="form-label">
                            <h5>Confirm Password</h5>
                        </label>
                        <input type="password" class="form-control" id="conpass" name="conpass" required>
                    </div>
                    <div class="mb-3">
                        <input type="checkbox" onclick="showpassword()"> Show Password
                        <script>
                            function showpassword() {
                                var x = document.getElementById("password");
                                var y = document.getElementById("conpass");
                                var z = document.getElementById("oldpassword");
                                if (x.type === "password" && y.type === "password") {
                                    x.type = "text";
                                    y.type = "text";
                                    z.type = "text";
                                } else {
                                    x.type = "password";
                                    y.type = "password";
                                    z.type = "password";
                                }
                            }
                        </script>
                    </div>
                    <input type="hidden" name="save" value="1">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </form>
        </div>


    </main>
</body>

</html>
<?php
include('./user/include/footer.php');
?>
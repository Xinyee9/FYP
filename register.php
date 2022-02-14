<?php
session_start();
require_once('./php/dbconnect.php');

if (isset($_POST['mem_name'])) {
  $username = stripslashes($_POST['mem_name']); // removes backslashes
  $username = mysqli_real_escape_string($con, $username); //escapes special characters in a string
  $email = stripslashes($_POST['mem_email']);
  $email = mysqli_real_escape_string($con, $email);
  $password = stripslashes($_POST['mem_password']);
  $password = mysqli_real_escape_string($con, $password);
  $confirmpassword = stripslashes($_POST['mem_confirmpassword']);
  $confirmpassword = mysqli_real_escape_string($con, $confirmpassword);

  if ($password == $confirmpassword) {
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($con, $query);
    $row_1 = mysqli_num_rows($result);
    $query = "SELECT * FROM users WHERE useremail = '$email'";
    $result = mysqli_query($con, $query);
    $row_2 = mysqli_num_rows($result);

    if ($row_1 >= 1 || $row_2 >= 1) {
      echo "<script>
        alert('Username or email in used!\\nPlease try again.');
        window.location.href='./register.php';
        </script>";
      exit;
    } else {
      $query = "INSERT into users (username, userpassword, useremail) VALUES ('$username','$password','$email')";
      $result = mysqli_query($con, $query);

      if ($result) {
        echo "<script>
        alert('You are registered successfully!\\nPlease login.');
        window.location.href='./login.php';
        </script>";
      }
    }
  } else {
    echo "<script>
        alert('Password and Confirm Password not matched\\nPlease try again.');
        window.location.href='./register.php';
        </script>";
    exit;
  }
}


?>

<!DOCTYPE html>

<html>

<head>
  <title>Customer Register</title>

  <style>
    body {
      background-image: url("https://wallpaperbat.com/img/490393-flower-aesthetic-computer-wallpaper-top-flower-aesthetic-desktop-wallpaper-aesthetic-flower-1280x1024-download-hd-wallpaper-wallpapertip.jpg");
      background-repeat: no-repeat;
      /* background-position: center; */
      background-size: 100%;
    }

    .font_bk {
      background-color: #e0ffff;
      display: block;
      border: 8px solid #ccc;
      width: 450px;
      height: 550px;
      position: fixed;
      margin: auto;
      left: 0;
      right: 0;
      top: 0;
      bottom: 0;
    }

    p {
      font-style: italic;
    }

    h4 {
      font-family: "Texturina", serif;
      text-align: center;
      font-size: 30px;
    }
  </style>
</head>

<body>
  <span class="font_bk">
    <h4><strong>Register for a New Account</strong></h4>
    <hr />

    <form name="signupfrm" action="" method="POST">
      <p>
        &nbsp &nbspUsername :
        <input type="text" name="mem_name" placeholder="Type your username here" />
      </p>
      <p>
        &nbsp &nbspEmail :
        <input type="email" name="mem_email" placeholder="example@gmail.com" />
      </p>
      <p>
        &nbsp &nbspPassword :
        <input type="password" name="mem_password" placeholder="Type your password here" />
      </p>
      <p>
        &nbsp &nbspConfirm Password :
        <input type="password" name="mem_confirmpassword" placeholder="Please re-type your password" />
      </p>

      <div align="right">
        <input type="submit" name="registerbtn" value="SIGN UP" />
        <input type="reset" name="resetbtn" value="Clear" />&nbsp &nbsp
      </div>

      <!-- <script type="text/javascript">
        function backtologin() {
          window.alert(
            "Success! Your account is registered. You may login now!"
          );
        }
      </script> -->
    </form>
  </span>
</body>

</html>
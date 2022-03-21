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
  $verify_token = md5(rand());

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
      $query = "INSERT into users (username, userpassword, useremail,verify_token) VALUES ('$username','$password','$email','$verify_token')";
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

  <link rel="shortcut icon" href="./image/register.ico" rel="icon" type="image/x-icon" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <!-- <link rel="stylesheet" href=""> -->
  <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&family=Bubblegum+Sans&family=Creepster&family=Fredericka+the+Great&family=Indie+Flower&family=Sigmar+One&display=swap" rel="stylesheet">

  <!--button-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@200&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="./css/button.css" />

  <style>
    .header {
      padding: 30px;
      text-align: center;
    }

    #title h1 {
      margin: 0;
      padding: 0;
      text-align: center;
      font-size: 40px;
      font-family: 'Sigmar One', cursive;
      color: #7979d2;
      text-transform: uppercase;
      background-image: linear-gradient(to right, #f00, #ff0, #0ff, #0f0, #00f);
      background-clip: padding-box;
      animation: animate 20s linear infinite;
      background-size: 1000%;
      background-color: turquoise;
      letter-spacing: 3px;

    }

    @keyframes animate {
      0% {
        background-position: 0% 100%;
      }

      50% {
        background-position: 100% 0%;
      }

      100% {
        background-position: 0% 100%;
      }
    }

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
      width: 530px;
      height: 430px;
      position: fixed;
      margin: auto;
      left: 0;
      right: 0;
      top: 0px;
      bottom: 0;
    }

    p {
      font-size: 23px;
      font-style: italic;
      font-family: "Fredericka the Great", cursive;
      font-weight: bold;
    }

    h4 {
      font-family: "Bubblegum Sans", cursive;
      font-size: 2em;
      color: #bf80ff;
      letter-spacing: 5px;
      text-align: center;
    }

    /* .button {
      background-color: blue; 
      color: black; 
      border: 2px solid #008CBA;
    } */
  </style>
</head>

<body>
  <div class="header">
    <div id="title">
      <h1>&#127800; WELCOME TO Aurora Restaurant &#127800;</h1>
    </div>
  </div>
</body>

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
        &nbsp &nbspEmail &nbsp &nbsp &nbsp:
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
        <button type="submit" class="slide">SIGN UP<i class="icon-arrow-right"></i></button>

        <button type="reset" class="simple">Clear </button>
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
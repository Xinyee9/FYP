<?php
session_start();
require_once('./php/dbconnect.php'); 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function send_password_reset($get_name,$get_email,$token)
{
    //Server settings
    $mail = new PHPMailer(true);
    //$mail->SMTPDebug = 2;                    //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    
    $mail->Host       = "smtp.gmail.com";                       //Set the SMTP server to send through
    $mail->Username   = "auroracutie2022@gmail.com";              //SMTP username
    $mail->Password   = "aurorahehe2022yeah";                                  //SMTP password
    
    $mail->SMTPSecure = "tls";                                  //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`


    //Recipients
    $mail->setFrom("auroracutie2022@gmail.com",$get_name);
    $mail->addAddress($get_email);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "Reset Password Notification";
    
    $email_template = "<h2>Hello</h2>
    <h3>You are receiving this email because we received a password reset request for your account.</h3>
    <br/><br/>
    <a href = 'http://localhost/FYP/pwd-ch.php?token=$token&email=$get_email'> Click Me <a/>
    ";

    $mail->Body = $email_template;
    $mail->send();
}

if (isset($_POST['password_reset_link'])) 
{
  $email = mysqli_real_escape_string($con, $_POST['email']); 
  $token = md5(rand());

  $check_email = "SELECT * FROM users WHERE useremail='$email' LIMIT 1";
  $check_email_run = mysqli_query($con, $check_email);

  if(mysqli_num_rows($check_email_run) > 0 )
  {
      $row = mysqli_fetch_array($check_email_run);
      $get_name = $row['username'];
      $get_email = $row['useremail'];

      $update_token = "UPDATE users SET verify_token ='$token' WHERE useremail='$get_email' LIMIT 1";
      $update_token_run = mysqli_query($con, $update_token);

      if($update_token_run)
      {
          send_password_reset($get_name,$get_email,$token);
          $_SESSION['status'] = "we e-mailed you a password reset link.";
          header("Location: password-reset.php");
          exit(0);
      }
      else
      {
        $_SESSION['status'] = "Somting wrong";
        header("Location: password-reset.php");
        exit(0);
      }
  }
  else
  {
    $_SESSION['status'] = "No Email Found";
    header("Location: password-reset.php");
    exit(0);
  }
}

?>
<!DOCTYPE html>
<html>
<head>

  <link rel="shortcut icon" href="./image/cherry.ico" rel="icon" type="image/x-icon" />
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&family=Bubblegum+Sans&family=Creepster&family=Fredericka+the+Great&family=Indie+Flower&family=Sigmar+One&display=swap" rel="stylesheet" />
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->


  <style>
    body {
      background-image: url("https://images.unsplash.com/photo-1528372531841-f1228963b0af?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80");
      background-repeat: repeat;
      background-size: 100%;
    }

    .header {
      padding: 30px;
      text-align: center;
    }

    @font-face {
      font-family: "Obliq";
      src: url("font/Obliq.ttf");
    }

    .font_bk {
      background-color: beige;
      display: block;
      border: 8px solid #ccc;
      width: 500px;
      height: 350px;
      position: fixed;
      margin: auto;
      left: 0;
      right: 0;
      top: 0;
      bottom: 0;
    }

    p {
      text-align: center;
    }

    h1 {
      font-family: "Bubblegum Sans", cursive;
      font-size: 2em;
      color: #bf80ff;
      letter-spacing: 5px;
      text-align: center;
    }

    h2 {
      font-size: 20px;
      text-align: center;
    }

    p {
      font-size: 20px;
      font-style: italic;
      font-family: "Fredericka the Great", cursive;
      font-weight: bold;
    }

    p1 {
      font-style: italic;
      color: tomato;
    }

    .forgot {
      font-size: 22px;
      color: red;
      font-family: "Amatic SC", cursive;
      float: center;
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

    #title h4 {
      margin: 0;
      padding: 0;
      text-align: center;
      font-size: 40px;
      font-family: "Sigmar One", cursive;
      color: transparent;
      text-transform: uppercase;
      background-image: linear-gradient(to right,
          #f00,
          #ff0,
          #0ff,
          #0f0,
          #00f);
      -webkit-background-clip: text;
      background-clip: text;
      animation: animate 20s linear infinite;
      background-size: 1000%;
      font-size: 50px;
      margin-top: 5px;
      background-color: lightblue;
      word-spacing: 15px;
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
  </style>

</head>

<body>
  <div class="header">
    <div id="title">
      <h1>&#127800; WELCOME TO Aurora Restaurant &#127800;</h1>
    </div>
  </div>

  <?php
  if(isset($_SESSION['status']))//Checking whether the session is set or not
  {
      echo $_SESSION['status']; //Display Session Message
      unset($_SESSION['status']); //REMoving Session Message
  } 
  ?>
  <span class="font_bk">
  <form action="" method="POST" >
      <h1><strong>Reset Password</strong></h1>
      <hr />
      <p>
        Email Address:
        <input type="email" name="email" size="50" maxlength="55" placeholder="Type your email here" required />
      </p>
      <div align="center">
        <!-- <input type="button" value="LOG IN" onclick="backtologin();" /> -->
        <!-- <input type="submit" value="LOG IN" /> -->
        <button type="submit" name ="password_reset_link" class="btn btn-primary">Reset Link</button>
        <button onclick="goBack()">GO BACK</button>
        <script>
          function goBack() {
            window.history.back();
          }
        </script>

      </div>
    </form>
  </span>
</body>

</html>
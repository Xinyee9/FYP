<?php
session_start();

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
  <?php
  require_once('./php/dbconnect.php');

if (isset($_POST['password_reset_link'])) 
{
  $email = mysqli_real_escape_string($con, $_POST['email']); 
  //$token = md5(rand());

  $emailquery = "SELECT * FROM users WHERE useremail='$email' LIMIT 1";
  $query = mysqli_query($con, $emailquery);

  $emailcount = mysqli_num_rows($query);  
  if($emailcount)
  {
    $userdata = mysqli_fetch_array($query);
    $username = $userdata['username'];
    $token = $userdata['verify_token'];

    $subject = "Password Reset";
    $body = "Hello,$username. You are receiving this email because we received a password reset request for your account. 
    http://localhost/FYP/pwd-change.php?token=$token&email=$email ";
    $sender_email = "From: auroracutie2022@gmail.com";

    if(mail($email, $subject, $body, $sender_email))
    {
      echo "<script>
          alert('we e-mailed you a password reset link.');
          window.location.href='./login.php';
          </script>";
    }
    else{
      echo "<script>
          alert('Something wrong.');
          window.location.href='./password-reset.php';
          </script>";
          
    }
      /*$row = mysqli_fetch_array($check_email_run);
      $get_name = $row['username'];
      $get_email = $row['useremail'];

      $update_token = "UPDATE users SET verify_token ='$token' WHERE useremail='$get_email' LIMIT 1";
      $update_token_run = mysqli_query($con, $update_token);

      if($update_token_run)
      {
          send_password_reset($get_name,$get_email,$token);
          echo "<script>
          alert('we e-mailed you a password reset link.');
          window.location.href='./password-reset.php';
          </script>";
      }
      else
      {
        echo "<script>
          alert('Something wrong.');
          window.location.href='./password-reset.php';
          </script>";
      }*/
  }
  else
  {
    echo "<script>
          alert('No email found.');
          window.location.href='./password-reset.php';
          </script>";
  }
}
  ?>
  <div class="header">
    <div id="title">
      <h1>&#127800; WELCOME TO Aurora Restaurant &#127800;</h1>
    </div>
  </div>

  <?php
  /*if(isset($_SESSION['status']))//Checking whether the session is set or not
  {
      echo $_SESSION['status']; //Display Session Message
      unset($_SESSION['status']); //REMoving Session Message
  } */
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
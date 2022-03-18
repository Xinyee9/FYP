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

if(isset($_POST['password_update']))
{
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $new_password = mysqli_real_escape_string($con, $_POST['new_password']);
    $confirm_password = mysqli_real_escape_string($con, $_POST['confirm_password']);
    $token = mysqli_real_escape_string($con, $_POST['password_token']);

    if(!empty($token))
    {
        if(!empty($email) && !empty($new_password) && !empty($confirm_password))
        {
            //check token is valid or not
            $check_token = "SELECT verify_token FROM users WHERE verify_token='$token' LIMIT 1";
            $check_token_run = mysqli_query($con, $check_token);

            if(mysqli_num_rows($check_token_run) > 0 )
            {
              //
                if($new_password == $confirm_password)
                {
                    $update_password = "UPDATE users SET userpassword='$new_password' WHERE verify_token='$token' LIMIT 1 ";
                    $update_password_run = mysqli_query($con, $update_password);

                    if($update_password_run)
                    {
                        $new_token = md5(rand()."funda");
                        $update_to_new_token = "UPDATE users SET verify_token='$new_token' WHERE verify_token='$token' LIMIT 1 ";
                        $update_to_new_token_run = mysqli_query($con, $update_to_new_token);

                        /*$_SESSION['status'] = "New password successfully update.";
                        header("Location: login.php");
                        exit(0);*/
                        echo "<script>
                        alert('New password successfully update.');
                        window.location.href='./login.php';
                        </script>";
                    }
                    else
                    {
                       /* $_SESSION['status'] = "Did not update password. Someting wrong";
                        header("Location: pwd-change.php?token=$token&email=$email");
                        exit(0);*/
                        echo "<script>
                        alert('Did not update password. Someting wrong');
                        window.location.href='./pwd-change.php?token=$token&email=$email';
                        </script>";
                    }

                }
                else
                {
                   /* $_SESSION['status'] = "Password and Confirm password not match";
                    header("Location: pwd-change.php?token=$token&email=$email");
                    exit(0);*/
                    echo "<script>
                    alert('Password and Confirm password not match');
                    window.location.href='./pwd-change.php?token=$token&email=$email';
                    </script>";
                }
            }
            else
            {
                /*$_SESSION['status'] = "Invalid Token";
                header("Location: pwd-change.php?token=$token&email=$email");
                exit(0);*/
                echo "<script>
                alert('Invalid Token');
                window.location.href='./pwd-change.php?token=$token&email=$email';
                </script>";
            }
        }
        else
        {
            /*$_SESSION['status'] = "All Filed are Mandetory";
            header("Location: pwd-change.php?token=$token&email=$email");
            exit(0);*/
            echo "<script>
            alert('All Filed are Mandetory');
            window.location.href='./pwd-change.php?token=$token&email=$email';
            </script>";
        }
    }
    else
    {
        /*$_SESSION['status'] = "No Token Avaliable";
        header("Location: pwdange-ch.php");
        exit(0);*/
        echo "<script>
            alert('No Token found');
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
  if(isset($_SESSION['status']))//Checking whether the session is set or not
  {
      echo $_SESSION['status']; //Display Session Message
      unset($_SESSION['status']); //REMoving Session Message
  } 
  ?>
  <span class="font_bk">
  <form action="" method="POST" >
      <h1><strong>Change Password</strong></h1>
      <hr />
      <input type="hidden" name="password_token" value="<?php if(isset($_GET['token'])){echo $_GET['token'];}?>">
      <p>
        Email Address:
        <input type="email" name="email" value="<?php if(isset($_GET['email'])){echo $_GET['email'];}?>" size="50" maxlength="55" placeholder="Type your email here" required />
      </p>
      <p>
        New Password:
        <input type="password" name="new_password" size="50" maxlength="55" placeholder="Enter new password" required />
      </p>
      <p>
        Confirm password:
        <input type="password" name="confirm_password" size="50" maxlength="55" placeholder="Confirm password" required />
      </p>

      <div align="center">
        <!-- <input type="button" value="LOG IN" onclick="backtologin();" /> -->
        <!-- <input type="submit" value="LOG IN" /> -->
        <button type="submit" name ="password_update" class="btn btn-primary">Update Password</button>
        
      </div>
    </form>
  </span>
</body>

</html>
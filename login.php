<?php
session_start();
require_once('./php/dbconnect.php');

if ($_SESSION['logged']) {
}

?>
<script>
  window.location.href('./')
</script>
<!DOCTYPE html>

<html>

<head>
  <title>Login</title>

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&family=Bubblegum+Sans&family=Creepster&family=Fredericka+the+Great&family=Indie+Flower&family=Sigmar+One&display=swap" rel="stylesheet" />

  <style>
    body {
      background-image: url("https://images.unsplash.com/photo-1528372531841-f1228963b0af?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80");
      background-repeat: repeat;
      background-size: 100%;
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
      font-family: "Sigmar One", cursive;
      color: #7979d2;
      text-transform: uppercase;
      background-image: linear-gradient(to right,
          #f00,
          #ff0,
          #0ff,
          #0f0,
          #00f);
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

  <span class="font_bk">
    <form method="POST" name="loginfrm" action="">
      <h1><strong>LOGIN</strong></h1>
      <hr />
      <p>
        Username :
        <input type="text" name="username" size="50" maxlength="55" placeholder="Type your username here" required />
      </p>
      <p>
        Password :
        <input type="password" name="password" size="50" maxlength="55" placeholder="Type your password here" required />
      </p>
      <div align="center">
        <!-- <input type="button" value="LOG IN" onclick="backtologin();" /> -->
        <input type="submit" value="LOG IN" />
        <button onclick="goBack()">GO BACK</button>
        <script>
          function backtologin() {
            window.alert("You have success LOG IN!");
            window.location.href = "index.php";
          }

          function goBack() {
            window.history.back();
          }
        </script>

        <hr />

        <div class="forgot">
          <p1>Forgot your password? </p1><a href="#"> Reset Here</a>
          <p></p>
          <p1>NOT A USER?</p1><a href="Customer Register.html"> SIGN UP</a>
        </div>
      </div>
    </form>
  </span>
</body>

</html>
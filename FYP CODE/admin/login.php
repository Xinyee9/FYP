<?php include('../config/constants.php');?>
<html>
    <head>
	<title>Login</title>
	
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&family=Bubblegum+Sans&family=Creepster&family=Fredericka+the+Great&family=Indie+Flower&family=Sigmar+One&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
<div class="header">
    <div id="title"><h4>WELCOME TO AURORA RESTAURANT</h4></div>

        
        <?php
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login']; 
                unset($_SESSION['login']); 
            }
            if(isset($_SESSION['nologin-message']))
            {
                echo $_SESSION['nologin-message']; 
                unset($_SESSION['nologin-message']); 
            }
        ?>
        <br /><br />

	<span class="font_bk">
    <form action="" method= "POST" >
		<h1><strong>LOGIN</strong></h1>
		<hr />
		<p>Email: <input type="email" name="email" size="50" maxlength="55" placeholder="Type your email here"></p>
		<p>Password : <input type="password" name="password" size="50" maxlength="55" placeholder="Type your password here"></p> 
		<div align="center">
            <input type="submit" name ="submit" value ="Login">

            <hr />

            <div class="forgot">
                <p1>Forgot your password? </p1><a href="#"> Reset Here</a>
                <p>             </p>
                <p1>NOT A USER?</p1><a href="Customer Register.html" > SIGN UP</a>

            </div>
			

		</div>
		
	</form>
	</span>
    </body>
</html>


<?php
if(isset($_POST['submit']))
{
    $email = $_POST['email'];
    $password =md5($_POST['password']);

    $sql = "SELECT * FROM admin WHERE admin_email = '$email' AND admin_password = '$password'";

    $res = mysqli_query($conn, $sql); 

    $count=mysqli_num_rows($res);

    if($count == 1)
    {
        //user available and login success
        $_SESSION['login'] = "<div class='success'>Login Successfully.</div>";
        $_SESSION['email'] = $email;
        //Redirect to home page/dashboard
        header('location:'.SITEURL.'admin/');
    }
    else
    {
        //user available and login success
        $_SESSION['login'] = "<div class='error text-center'>Email or Password did not match.</div>";
        //Redirect to home page/dashboard
        header('location:'.SITEURL.'admin/login.php');
    }

}

?>
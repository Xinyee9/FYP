<?php
session_start();
require('./php/dbconnect.php');
unset($_SESSION['date']);
unset($_SESSION['email']);
unset($_SESSION['first']);
unset($_SESSION['last']);

if (isset($_POST['btn-submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $datetime = date('Y-m-d h:i:sa');

    $query = "INSERT INTO contactus (conName, conEmail, conPhone, conMessage, conDatetime) VALUES ('$name','$email','$phone','$message','$datetime')";
    $result = mysqli_query($con, $query);

    if ($result) {
        $to = $email;
        $subject = "Thank You for Contacting Us";
        $message = "Your information has been received. Just a moment, our team will get back to you as soon as possible.\n\n";
        $message .= "<br/>\nBest regards,<br/>Aurora Team";

        $headers = "From: Aurora Admin <auroracutie2022@gmail.com>\r\n";
        $headers .= "Reply-To: auroracutie2022@gmail.com\r\n";
        $headers .= "Content-type: text/html\r\n";
        $headers .= "MIME-Version: 1.0\r\n";

        if (mail($to, $subject, $message, $headers)) {
            echo '<script>
            alert("Message sent!");
            </script>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<!-- 123 -->

<head>
    <title>Aurora Restaurant &#10024;</title>

    <link rel="shortcut icon" href="./image/cherry.ico" rel="icon" type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- <link rel="stylesheet" href=""> -->
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&family=Bubblegum+Sans&family=Creepster&family=Fredericka+the+Great&family=Indie+Flower&family=Patrick+Hand&family=Sigmar+One&display=swap" rel="stylesheet">

    <!--slideshow-->
    <meta charset="UTF-8">
    <link rel="stylesheet" href="imageslider.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="text/html; charset=iso-8859-2" http-equiv="Content-Type">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <style>
        .mySlides {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 80%;
            height: 30%;
        }

        body {
            font-family: 'Lucida Sans';
            padding: 10px;
            background-color: #e6eeff;
        }

        .header {
            padding: 30px;
            text-align: center;
            background: white;
        }

        .header1 {
            padding: 30px;
            text-align: center;
            background: url("data:image/jpeg;base64,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");
        }

        .header h1 {
            font-size: 60px;
        }

        .topnav {
            overflow: auto;
            background-color: #6699cc;
            font-size: 25px;
            font-family: 'Amatic SC', cursive;
        }

        .topnav a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }

        /* Create two unequal columns that floats next to each other */
        /* Left column */
        table#food td,
        table#food td {
            vertical-align: top;
            position: relative;
            height: 700px;
        }

        .leftcolumn {
            /* float: left; */
            width: 100%;
            display: inline-block;
            height: 100%;
        }

        /* Right column */
        .rightcolumn {
            float: right;
            width: 25%;
            background-color: #f1f1f1;
            padding-left: 20px;
        }

        /* Fake image */
        .fake-image img {
            background-color: #aaa;
            margin-top: 20px;
            width: 350px;
            height: 300px;
            padding: 10px;
            display: inline-grid;
        }

        /* Add a card effect for articles */
        .card {
            background-color: white;
            padding: 20px;
            margin-top: 40px;
            display: inline-block;
            height: 90%;
        }

        .card * {
            vertical-align: top;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: inline-block;
            clear: both;

        }

        /* Footer */
        .footer {
            padding: 20px;
            text-align: center;
            background: #ddd;
            margin-top: 20px;
        }


        #food td {
            width: 500px;
        }

        td {
            border: 3px solid #c299ff;
            border-style: inset;
        }

        hr {
            border: 3px dashed purple;
        }

        #menu {
            margin: auto;
            border-top: 5px solid black;
            width: 750px;
            text-shadow:
                3px 2px 4px gray,
                2px 3px 2px white;
            text-align: center;
            font-size: 40pt;
            font-family: Jokerman;
            font-weight: bold;
            margin-top: 10px;
            letter-spacing: 5px;
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
            font-family: 'Sigmar One', cursive;
            color: transparent;
            text-transform: uppercase;
            background-image: linear-gradient(to right, #f00, #ff0, #0ff, #0f0, #00f);
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

        p {
            font-family: 'Fredoka', cursive;
            font-weight: bold;
            font-size: 14pt;
            color: #b37700;
        }

        p1 {
            font-family: 'Indie Flower', cursive;
            font-weight: bold;
            font-size: 20pt;
            color: #ff8080;
            letter-spacing: 3px;
        }

        #menu-name h2 {
            font-family: 'Bubblegum Sans', cursive;
            margin-top: 2px;
            font-size: 21pt;
            font-style: italic;
            margin: auto;
            letter-spacing: 4px;
        }

        #contact {
            background-image: url('https://cdn.wallpapersafari.com/16/35/gRrKpQ.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .contact-box {
            display: flex;
            justify-content: center;
            align-items: center;
            padding-bottom: 34px;
        }

        .contact-box input,
        .contact-box textarea {
            width: 100%;
            padding: 0.5sem;
            border-radius: 5px;
            font-size: 1.1rem;
        }

        .contact-box label {
            text-shadow: 2px 2px 2px rgb(177, 169, 169);
            font-family: 'Indie Flower', cursive;
            font-weight: bold;
            float: left;
            font-size: 20pt;
            color: #ff8080;
            letter-spacing: 3px;
        }

        input[type="submit"] {
            cursor: pointer;
        }

        input[type="submit"]:hover {
            cursor: pointer;
            box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.75);
            transition: 0.5s;
        }

        /*Home section*/

        #home {
            display: flex;
            flex-direction: column;
            padding: 3px 200px;
            height: 480px;
            justify-content: center;
            align-items: center;
            text-shadow: black 2px 2px 3px;
            background: url("https://wallpaperaccess.com/full/3014596.jpg") no-repeat center center/cover;
            filter: brightness(75%);

            /* background-color: rgb(0, 0, 0, 0.5); */
        }

        #home .btn-con {
            height: 100px;
            position: relative;
        }

        #home .btn {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 6px 20px;
            width: 200px;
            border: 2px solid white;
            background-color: #70dbdb;
            color: white;
            margin: 0 auto;
            font-size: 1.5rem;
            border-radius: 10px;
            cursor: pointer;
        }

        #home .btn:hover {
            padding: 6px 20px;
            background-color: rgb(102, 23, 23);
            color: white;
            font-size: 1.7rem;
            transition: 0.3s;
            width: 220px;
        }

        #home .btn:focus {
            outline: none;
        }

        /*#home::before {
            content: "";
            position: absolute;

            height: 642px;
            top: 0px;
            left: 0px;
            width: 100%;
            z-index: -1;
            opacity: 0.89;
        }

        */
        #home h1 {
            color: white;
            text-align: center;
            font-size: 55pt;
            font-family: 'Patrick Hand', cursive;
            -webkit-text-stroke: 0.5px black;
        }

        #home p {
            color: white;
            text-align: center;
            font-size: 1.5rem;
            font-family: "Bree Serif,serif";
        }
    </style>
</head>

<body>
    <div class="header">
        <div id="title">
            <h1>&#127800; WELCOME TO Aurora Restaurant &#127800;</h1>
        </div>
        <p1>Your first choice !</p1>
    </div>

    <?php
    include_once('./php/navbar.php');
    ?>

    <section id="home">
        <h1 class="main-odering">BEST RESTAURANT</h1>
        <p>
            Going to the theatre or don't have much time during lunch<br />
            Consider pre ordering your meals.
        </p>
        <div class="btn-con">
            <form method="get" action="./menu.php">
                <button class="btn">ORDER NOW</button>
            </form>
        </div>
    </section>


    <div id="menu">Our Signature Dishes&#127857;</div>
    <br />
    <table id="food" align="center" cellpadding="15px" cellspacing="20px">
        <tr>
            <td>
                <!-- <div class="row"> -->
                <div class="leftcolumn">
                    <div class="card">
                        <div id="menu-name">
                            <h2>BlackpepperChickenchop</h2>
                        </div>
                        <div class="fake-image"><img src="Food/c1.jpeg"></div>
                        <p>The Black Pepper Chicken Chop is a vibrant and flavorful dish.Has a great nutritional value,especially in terms of protein.Black pepper chicken chops have a crisp and tender flavour.It is the perfect solution for comrades who want to lose weight but can't stop themselves from eating because of the low fat content. </p>
                    </div>
                </div>
                <!-- </div> -->
            </td>

            <td>
                <!-- <div class="row"> -->
                <div class="leftcolumn">
                    <div class="card">
                        <div id="menu-name">
                            <h2>Creammy Rigatoni Vege</h2>
                        </div>
                        <div class="fake-image"><img src="Food/s1.jpg"></div>
                        <p>Rigatoni are tubes with little ridges on the outside, similar to penne, but they are somewhat wider and cut squarely rather than diagonally. Because of their huge size, they're best served with chunky vegetable sauces or baked into a gratin.I'd describe it as unctuous, velvety and fragrant with sweet.</p>
                    </div>
                </div>
                <!-- </div> -->
            </td>


            <td>
                <!-- <div class="row"> -->
                <div class="leftcolumn">
                    <div class="card">
                        <div id="menu-name">
                            <h2>Steamed Cheeseburger </h2>
                        </div>
                        <div class="fake-image"><img src="Food/b1.jpg"></div>
                        <p>Steamed cheeseburgers, also known as cheeseburgs, are a special type of cheeseburger that originated in Connecticut. This local delicacy is created with steamed ground beef and steaming bits of cheese. Both are steamed separately, with the beef in special metal moulds and the cheese in its own container.</p>
                    </div>
                </div>
                <!-- </div> -->
            </td>

        </tr>
    </table>

    <hr />

    <div class="header1">
        <div id="title">
            <h4>CONTACT US</h4>
        </div>

        <section id="contact">
            <div class="contact-box">
                <form method="POST">
                    <div class="form-group">
                        <label for="name">Name :</label>
                        <input type="text" name="name" id="name" placeholder="Type your name here" required />
                    </div>

                    <div class="form-group">
                        <label for="email">Email :</label>
                        <input type="email" name="email" id="email" placeholder="example@gmail.com" required />
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number :</label>
                        <input type="phone" name="phone" id="phone" placeholder="exp : 01xxxxxxxxx" />
                    </div>

                    <div class="form-group">
                        <label for="message">Message :</label>
                        <textarea name="message" id="message" cols="30" rows="10" required></textarea>
                    </div>
                    <input type="submit" name="btn-submit" value="Submit" />
                </form>
            </div>
        </section>
</body>

</html>
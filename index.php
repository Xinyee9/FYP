<?php
session_start();
require('./php/dbconnect.php');
unset($_SESSION['date']);
unset($_SESSION['email']);
unset($_SESSION['first']);
unset($_SESSION['last']);

if (isset($_POST['btn-submit'])) 
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    $datetime = date("Y-M-d h:i:sa");

    $query = "INSERT INTO contactus (conName, conEmail, conPhone, conMessage, conDatetime) VALUES ('$name','$email','$phone','$message','$datetime')";
    $result = mysqli_query($con, $query);

    if ($result) 
    {
        $to = $email;
        $subject = "Thank You for Contacting Us";
        $message = "We're glad to tell you that we receive your message and our staff will contact you shortly.\n\n";
        $message .= "<br/>Cheers,<br/>Aurora Team";

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
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&family=Bubblegum+Sans&family=Creepster&family=Indie+Flower&family=Sigmar+One&display=swap" rel="stylesheet">

    
    <style>
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
        .leftcolumn {
            float: left;
            width: 100%;
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
            margin-top: 20px;
            display: inline-grid;
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
            font-family: 'Indie Flower', cursive;
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
    </style>
</head>

<body>
    <div class="header">
        <div id="title">
            <h1>&#127800; WELCOME TO Aurora Restaurant &#127800;</h1>
        </div>
        <p1>Your favourite places !</p1>
    </div>

    <?php
    include_once('./php/navbar.php');
    ?>

    <div id="menu">Our Signature Dishes &#127857;</div>
    <br />
    <table id="food" align="center" cellpadding="15px" cellspacing="20px">
        <tr>
            <td>
                <div class="row">
                    <div class="leftcolumn">
                        <div class="card">
                            <div id="menu-name">
                                <h2>Blackpepper Chickenchop</h2>
                            </div>
                            <div class="fake-image"><img src="Food/c1.jpeg"></div>
                            <p>The Black Pepper Chicken Chop is a vibrant and flavorful dish.Has a great nutritional value,especially in terms of protein.Black pepper chicken chops have a crisp and tender flavour.It is the perfect solution for comrades who want to lose weight but can't stop themselves from eating because of the low fat content.</p>
                        </div>
                    </div>
                </div>
            </td>

            <td>
                <div class="row">
                    <div class="leftcolumn">
                        <div class="card">
                            <div id="menu-name">
                                <h2>Creammy Rigatoni Vege</h2>
                            </div>
                            <div class="fake-image"><img src="Food/s1.jpg"></div>
                            <p>Rigatoni are tubes with little ridges on the outside, similar to penne, but they are somewhat wider and cut squarely rather than diagonally. Because of their huge size, they're best served with chunky vegetable sauces or baked into a gratin.Instead, I'd describe it as delicious, rich, unctuous, velvety, warm and fragrant with sweet.</p>
                        </div>
                    </div>
                </div>
            </td>


            <td>
                <div class="row">
                    <div class="leftcolumn">
                        <div class="card">
                            <div id="menu-name">
                                <h2>Steamed Cheeseburger </h2>
                            </div>
                            <div class="fake-image"><img src="Food/b1.jpg"></div>
                            <p>Steamed cheeseburgers, also known as cheeseburgs, are a special type of cheeseburger that originated in Connecticut. This local delicacy is created with steamed ground beef and steaming bits of cheese. Both are steamed separately, with the beef in special metal moulds and the cheese in its own container.</p>
                        </div>
                    </div>
                </div>
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
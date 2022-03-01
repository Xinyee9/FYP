<?php
require_once('./php/dbconnect.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>MENU</title>

    <link rel="shortcut icon" href="./image/menu.ico" rel="icon" type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&family=Bubblegum+Sans&family=Creepster&family=Fredericka+the+Great&family=Indie+Flower&family=Sigmar+One&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

    <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

    <div class="header">
        <div id="title">
            <h1>&#127800; WELCOME TO Aurora Restaurant &#127800;</h1>
        </div>
        <br />
        <div id="title">
            <h1>&#127800; MENU &#127800;</h1>
        </div>

    </div>

    <div id="menu">FOOD &#127812;</div>

    <a href="index.php" class="previous round">&#8249;</a>

    <form action="transaction.php" name="toSubmit" method="post">
        <!-- <input type="hidden" name="foodprice" value=""> -->
        <input type="hidden" name="foodcode" value="">
        <input type="hidden" name="foodquantity" value="">
    </form>

    <table id="food" align="center" cellpadding="15px" cellspacing="20px">
        <?php
        $result = mysqli_query($con, "SELECT * FROM food WHERE active='Yes' ");
        $counter = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $counter;
            if ($counter % 3 == 0) {
                echo "<tr>";
            }
            // echo "<td style='height: 500px;'>
            //     <div class='row'>
            //         <div class='leftcolumn'>
            //             <div class='card'>
            //                 <div id='menu-name'><h2>" . $row["food_name"] . "</h2></div>
            //                 <div class='fake-image'><img src='Food/" . $row["food_image"] . "'></div>
            //                 <p>RM" . number_format((float)$row['food_price'], 2, '.', '') . "</p>
            //                 <p>".$row['food_description'] . "</p>
            //                 <button class='button' value='" . $row["food_code"] . ",," . $row["food_name"] . "'  onclick='select(this)'>SELECT</button>
            //             </div>
            //         </div>
            //     </div>
            // </td>";
            echo "<td style='height: 700px;'>
                    <div class='leftcolumn'>
                        <div class='card'>
                            <div id='menu-name'><h2>" . $row["food_name"] . "</h2></div>
                            <div class='fake-image'><img src='Food/" . $row["food_image"] . "'></div>
                            <p>RM" . number_format((float)$row['food_price'], 2, '.', '') . "</p>
                            <p>" . $row['food_description'] . "</p>
                            <button class='button' value='" . $row["food_code"] . ",," . $row["food_name"] . "'  onclick='select(this)'>SELECT</button>
                        </div>
                    </div>
            </td>";
            if ($counter - 2 % 3 == 0) {
                echo "</tr>";
            }
            $counter++;
        }
        ?>
    </table>



    <script>
        //Get the button
        var mybutton = document.getElementById("myBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }

        function select(selButton) {
            var foodinfo = selButton.value.split(",,");
            // console.log(foodinfo);
            quantity = prompt("You have selected " + foodinfo[1] + ".\nHow many quantity you want?", 1);
            // console.log(isNaN(quantity));
            while (isNaN(quantity)) {
                alert("Please enter quantity in numbers only!");
            }

            if (quantity != null && quantity != isNaN(quantity)) {
                // document.toSubmit.foodprice.value = quantity;
                document.toSubmit.foodcode.value = foodinfo[0];
                document.toSubmit.foodquantity.value = quantity;
                document.toSubmit.submit();
            }

        }
    </script>

</body>

</html>
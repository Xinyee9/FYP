<!DOCTYPE html>
<html>
    <head>
        <title>MENU</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&family=Bubblegum+Sans&family=Creepster&family=Indie+Flower&family=Sigmar+One&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <style>
            body
            {
                background-image:url('https://images.unsplash.com/photo-1558346648-9757f2fa4474?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80');
                background-repeat : no-repeat;
                background-size : 100%;
                background-attachment:fixed;
                background-position:center;
            }

            #title h1
            {
                margin: 0;
                padding: 0;
                text-align: center;
                font-size: 40px;
                font-family: 'Sigmar One', cursive;
                color:  #7979d2;
                text-transform: uppercase;
                background-image: linear-gradient(to right , #f00,#ff0,#0ff,#0f0,#00f);
                background-clip: padding-box;
                animation: animate 20s linear infinite;
                background-size:1000%;
                background-color: turquoise;
                letter-spacing: 3px;

            }

            @keyframes animate
            {
                0%
                {
                    background-position: 0% 100%;
                }
                50%
                {
                    background-position: 100% 0%;
                }
                100%
                {
                    background-position: 0% 100%;
                }
            }

            #menu
            {	
                margin:auto;
                border-bottom:5px solid black;
                width:750px;
                text-shadow: 
                3px 2px 4px gray,
                2px 3px  2px white;
                text-align:center;
                font-size:40pt;
                font-family:Jokerman;
                font-weight:bold;
                margin-top:10px;
                letter-spacing:5px;
            }

            .leftcolumn 
            {   
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
            .fake-image img
            {
                background-color: #aaa;
                margin-top:20px;
                width:350px;
                height:300px;
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


            #food td
            {
                width:500px;
            }
            
            td
            {
                border:3px solid #ccff99;
                border-style: inset;
            }

            hr
            {
                border:3px dashed purple;
            }

            p
            {
                font-family: 'Indie Flower', cursive;
                font-weight:bold;
                font-size:30pt;
                color:  #b37700;          
            }

            p1
            {
                font-family: 'Indie Flower', cursive;
                font-weight:bold;
                font-size:20pt;
                color:  #ff8080;  
                letter-spacing: 3px;       
            }

            #menu-name h2
            {
                font-family: 'Bubblegum Sans', cursive;
                margin-top:2px;
                font-size:21pt;
                font-style:italic;
                margin:auto;
                letter-spacing:4px;
            }

            /*select button*/
            .button 
            {
                padding: 15px 15px;
                font-size: 20px;
                text-align: center;
                cursor: pointer;
                outline: none;
                color: #fff;
                background-color: #44619e;
                border: none;
                border-radius: 15px;
                box-shadow: 0 9px #999;
                width: 150px;
                float: right;
            }

            .button:hover
            {
                background-color: #44619e;
            }

            .button:active 
            {
                background-color: #44619e;
                box-shadow: 0 5px #666;
                transform: translateY(4px);
                float: right;
            }

            /*previous button*/
            a 
            {
                text-decoration:blue;
                font-size: 45px;
                display: inline-block;
                float: left;
                padding: 10px 16px 10px 10px;
            }

            a:hover 
            {
                background-color:  #99e6ff;
                color: black;
            }

            .previous 
            {
                background-color:  #99e6ff;
                color: black;
            }

            /*Scroll to top button*/
            #myBtn 
            {
                display: none;
                position: fixed;
                bottom: 20px;
                right: 30px;
                z-index: 99;
                font-size: 18px;
                border: none;
                outline: none;
                background-color: red;
                color: white;
                cursor: pointer;
                padding: 15px;
                border-radius: 4px;
            }

            #myBtn:hover 
            {
                background-color: #555;
            }
                        
        </style>
    </head>

    <body>

        <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

        <div class="header">
            <div id="title"><h1>&#127800; MENU &#127800;</h1></div>
        </div>

        <div id="menu">FOOD &#127812;</div>

        <a href="index.html" class="previous round">&#8249;</a>

        <table id="food" align ="center" cellpadding="15px" cellspacing="20px">
            <tr>
                <td>
                    <div class="row">
                        <div class="leftcolumn">
                            <div class="card">
                                <div id="menu-name"><h2>Blackpepper Chickenchop</h2></div>
                                <div class="fake-image"><img src="Food/c1.jpeg"></div>
                                <p>RM 11.00</p>
                                <button class="button">SELECT</button>
                            </div>
                        </div>
                    </div>
                </td>

                <td>
                    <div class="row">
                        <div class="leftcolumn">
                            <div class="card">
                                <div id="menu-name"><h2>Creammy Rigatoni Vege</h2></div>
                                <div class="fake-image"><img src="Food/s1.jpg"></div>
                                <p>RM 12.50</p>
                                <button class="button">SELECT</button>
                            </div>
                        </div>
                    </div>
                </td>

                
                <td>
                    <div class="row">
                        <div class="leftcolumn">
                            <div class="card">
                                <div id="menu-name"><h2>Steamed Cheeseburger </h2></div>
                                <div class="fake-image"><img src="Food/b1.jpg"></div>
                                <p>RM 9.40</p>
                                <button class="button">SELECT</button>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="row">
                        <div class="leftcolumn">
                            <div class="card">
                                <div id="menu-name"><h2>Chickenchop with Mushroom</h2></div>
                                <div class="fake-image"><img src="Food/c2.jpg"></div>
                                <p>RM 10.20</p>
                                <button class="button">SELECT</button>
                            </div>
                        </div>
                    </div>
                </td>

                <td>
                    <div class="row">
                        <div class="leftcolumn">
                            <div class="card">
                                <div id="menu-name"><h2>Spaghetti Aglio e Olio</h2></div>
                                <div class="fake-image"><img src="Food/s2.jpg"></div>
                                <p>RM 11.60</p>
                                <button class="button">SELECT</button>
                            </div>
                        </div>
                    </div>
                </td>

                
                <td>
                    <div class="row">
                        <div class="leftcolumn">
                            <div class="card">
                                <div id="menu-name"><h2>Wild Salmon Burgers</h2></div>
                                <div class="fake-image"><img src="Food/b2.jpg"></div>
                                <p>RM 14.00</p>
                                <button class="button">SELECT</button>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="row">
                        <div class="leftcolumn">
                            <div class="card">
                                <div id="menu-name"><h2>Honey Lemon Chicken Chop</h2></div>
                                <div class="fake-image"><img src="Food/c4.jpg"></div>
                                <p>RM 9.20</p>
                                <button class="button">SELECT</button>
                            </div>
                        </div>
                    </div>
                </td>

                <td>
                    <div class="row">
                        <div class="leftcolumn">
                            <div class="card">
                                <div id="menu-name"><h2>Spaghetti Bolognese</h2></div>
                                <div class="fake-image"><img src="Food/s3.jpg"></div>
                                <p>RM 10.00</p>
                                <button class="button">SELECT</button>
                            </div>
                        </div>
                    </div>
                </td>
 
                
                <td>
                    <div class="row">
                        <div class="leftcolumn">
                            <div class="card">
                                <div id="menu-name"><h2>Beef Burgers</h2></div>
                                <div class="fake-image"><img src="Food/b4.jpg"></div>
                                <p>RM 12.00</p>
                                <button class="button">SELECT</button>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="row">
                        <div class="leftcolumn">
                            <div class="card">
                                <div id="menu-name"><h2>Chicken Parmigiana</h2></div>
                                <div class="fake-image"><img src="Food/c5.jpg"></div>
                                <p>RM 8.00</p>
                                <button class="button">SELECT</button>
                            </div>
                        </div>
                    </div>
                </td>

                <td>
                    <div class="row">
                        <div class="leftcolumn">
                            <div class="card">
                                <div id="menu-name"><h2>Dill Butter Shrimp Farfalle Pasta</h2></div>
                                <div class="fake-image"><img src="Food/s4.jpg"></div>
                                <p>RM 13.90</p>
                                <button class="button">SELECT</button>
                            </div>
                        </div>
                    </div>
                </td>
 
                
                <td>
                    <div class="row">
                        <div class="leftcolumn">
                            <div class="card">
                                <div id="menu-name"><h2>Spicy Elk Burger</h2></div>
                                <div class="fake-image"><img src="Food/b5.jpg"></div>
                                <p>RM 13.00</p>
                                <button class="button">SELECT</button>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="row">
                        <div class="leftcolumn">
                            <div class="card">
                                <div id="menu-name"><h2>Seared Salmon Steak with Wasabi Lemon Vinaigrette</h2></div>
                                <div class="fake-image"><img src="Food/c6.jpg"></div>
                                <p>RM 17.60</p>
                                <button class="button">SELECT</button>
                            </div>
                        </div>
                    </div>
                </td>

                <td>
                    <div class="row">
                        <div class="leftcolumn">
                            <div class="card">
                                <div id="menu-name"><h2>Creammy Corn Gemelli</h2></div>
                                <div class="fake-image"><img src="Food/s5.jpg"></div>
                                <p>RM 12.20</p>
                                <button class="button">SELECT</button>
                            </div>
                        </div>
                    </div>
                </td>
 
                
                <td>
                    <div class="row">
                        <div class="leftcolumn">
                            <div class="card">
                                <div id="menu-name"><h2>Bison Burgers</h2></div>
                                <div class="fake-image"><img src="Food/b6.jpg"></div>
                                <p>RM 13.40</p>
                                <button class="button">SELECT</button>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>

        </table>

        

        <script>
            //Get the button
            var mybutton = document.getElementById("myBtn");
            
            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = function() {scrollFunction()};
            
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
            </script>

    </body>
</html>
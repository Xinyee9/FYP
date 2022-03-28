<?php
// session_start();

?>

<div class="topnav">
    <a href="index.php">HOME</a>
    <a href="menu.php">MENU</a>
    <?php
    if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1 && $_SESSION['privilege'] == "user") {
        echo '
        <a href="./php/logout.php" style="float: right;">LOGOUT</a>
        <a href="aboutus.php" style="float: right;">ABOUT US</a>
        <a href="" style="float: right;">ORDER HISTORY</a>
        <a href="./user/" style="float: right;">MY PROFILE</a>
        <a style="-webkit-user-select: none; cursor: default;">Welcome, ' . $_SESSION['username'] . '</a>';
    } else if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1 && $_SESSION['privilege'] == "admin") {
        echo '
        <a href="./php/logout.php" style="float: right;">LOGOUT</a>
        <a href="aboutus.php" style="float: right;">ABOUT US</a>
        <a href="./admin/adminpanel.php" style="float: right;">ADMIN PANEL</a>
        <a style="-webkit-user-select: none; cursor: default;">Welcome, ' . $_SESSION['username'] . '</a>';
    } else {
        echo '
        <a href="aboutus.php" style="float: right;">ABOUT US</a>
        <a href="login.php" style="float: right;">LOGIN</a>';
    }
    ?>
    <!-- <a href="" style="-webkit-user-select: none; cursor: default;"></a> -->
</div>
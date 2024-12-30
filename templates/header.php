<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo "LC Book Store"; ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <style>
        body,
        h1,
        h2,
        h3,
        h4,
        h5 {
            font-family: "Poppins", sans-serif
        }

        body {
            font-size: 16px;

        }

        .dark-mode {
            background-color: #171613;
            color: white;

        }

        .container {
            height: 100px;
            position: relative;

        }

        .left {
            margin: 0;
            position: absolute;
            top: 50%;
            left: 23%;
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

        .w3-half img {
            margin-bottom: -6px;
            margin-top: 16px;
            opacity: 0.8;
            cursor: pointer
        }

        .w3-half img:hover {
            opacity: 1
        }
    </style>

</head>

<body>

    <div class="container">
        <div class="left">
            <button onclick="myFunction()">Toggle dark mode</button>
        </div>
    </div>

    <script>
        function myFunction() {
            var element = document.body;
            element.classList.toggle("dark-mode");
        }
    </script>


</body>


//
<!-- Sidebar/menu -->
<?php
session_start();
function navColor($color)
{ ?>
    <nav class="w3-sidebar w3-<?php echo $color; ?> w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:300px;font-weight:bold;" id="mySidebar"><br>
        <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft" style="width:100%;font-size:22px">Close Menu</a>
        <div class="w3-container">
            <h3 class="w3-padding-64"><b>Laredo College<br>Bookstore</b></h3>
        </div>
        <div class="w3-bar-block">
            <a href="/bookstore/index.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Home</a>
            <!--  
                <a href="#showcase" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Showcase</a>
                <a href="#services" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Services</a>
                <a href="#designers" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Designers</a>
                <a href="#packages" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Packages</a>
                <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Contact</a>
            -->
            <?php if (!isset($_SESSION['admin_user'])) : ?>
                <a href="/bookstore/login.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Login</a>
            <?php else : ?>
                <a href="/bookstore/admin.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Admin</a>
                <a href="/bookstore/logout.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Logout</a>
            <?php endif; ?>
        </div>
    </nav>

    <!-- Top menu on small screens -->
    <header class="w3-container w3-top w3-hide-large w3-green w3-xlarge w3-padding">
        <a href="javascript:void(0)" class="w3-button w3-green w3-margin-right" onclick="w3_open()">☰</a>
        <span>Bookstore</span>
    </header>
<?php    } ?>

<?php
// calling random colors for header everytime function is called
$colors = ['purple', 'green', 'amber', 'pink', 'orange', 'indigo', 'brown', 'cyan'];
$color_random_index = array_rand($colors, 1);
navColor($colors[$color_random_index]);


?>
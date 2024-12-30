<?php require("./templates/header.php"); ?>
<div class="w3-main" style="margin-left:340px;margin-right:40px">
    <!-- Require the pageHeader.php file here -->
    <?php require('pageHeader.php'); ?>
    <div class="w3-container" style="margin-top:1px" id="showcase">
        <h1 class="w3-jumbo"><b>Admin Page</b></h1>
    </div>

    <?php
    // -- Check if the user is logged in, if not redirect them to the home page
    if (!isset($_SESSION['admin_user'])) {
        header("Location: /bookstore/index.php");
    }
    ?>

    <div class="w3-container" style="margin-top:px" id="showcase">
        <h1 class="w3-xxxlarge w3-text-<?php echo $colors[$color_random_index]; ?>"><b><?php echo "Welcome " . $_SESSION['username'] . "!"; ?></b></h1>
        <hr style="width:50px;border:5px solid " class="w3-round w3-text-<?php echo $colors[$color_random_index]; ?>">
        <p> This page is for all your admin functions.</p>
    </div>


</div>

<?php require("./templates/footer.php"); ?>
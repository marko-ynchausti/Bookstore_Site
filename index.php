<?php require("./templates/header.php"); ?>
<div class="w3-main" style="margin-left:340px;margin-right:40px">
    <!-- Require the pageHeader.php file here -->
    <?php require('pageHeader.php'); ?>
    <div class="w3-container" style="margin-top:1px" id="showcase">
        <h1 class="w3-jumbo"><b>Welcome to the Bookstore!</b></h1>
        <h1 class="w3-xxxlarge w3-text-<?php echo $colors[$color_random_index]; ?>"><b><?php echo $result['website_name']; ?></b></h1>
        <p>Author:
            <?php echo '<strong>' . $result['website_owner'] . '</strong>'. '  <u>Version:' . $result['website_version'] . '</u>';?>
        </p>

        <?php
            $logged_user = '';
            if (isset($_SESSION['is_the_user_logged_in'])){
                $logged_user= "Yes";
            } else {
                $logged_user = "No";
            }
        
        ?>
        <p>Logged user? <?php echo $logged_user; ?></p>

        <hr style="width:50px;border:5px solid " class="w3-round w3-text-<?php echo $colors[$color_random_index]; ?>">
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
            laborum.
        </p>

    </div>
    <!-- Require the authors code here -->
    <?php require("authors.php"); ?>
</div>

<?php require("./templates/footer.php"); ?>
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
            This is a school project I did for my Database class. It currently only works in localhost. Since it has a database attached to it, additional configuration will need to be added if I wanted to use it with github pages for example using API's to transfer information between the PostgreSQL server and github pages. I have included the website code and the SQL queries for anyone to recreate this website and database. In order for it to work with a database, I used XAMPP to create localhost Apache webserver, and psql shell in the terminal to run the queries and create the database.
        </p>

    </div>
    <!-- Require the authors code here -->
    <?php require("authors.php"); ?>
</div>

<?php require("./templates/footer.php"); ?>
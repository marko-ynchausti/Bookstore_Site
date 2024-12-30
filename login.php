<?php require("./templates/header.php"); ?>
<div class="w3-main" style="margin-left:340px;margin-right:40px">
    <!-- Require the pageHeader.php file here -->
    <?php require('pageHeader.php'); ?>
    <div class="w3-container" style="margin-top:80px" id="showcase">
        <h1 class="w3-jumbo"><b>Login Page</b></h1>
    </div>

    <?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        

        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);

        $sql_query = 'SELECT * FROM  users WHERE username = :username';
        $stmt      = $dbCon->prepare($sql_query);
        $stmt->execute(['username' => $username]);
        $results   = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($results) 
        {
            
            echo "<p>Seems like we have a user!</p>";
            // NOTE: Now we validate
            if (password_verify($password, $results['password'])) {
                $_SESSION['is_the_user_logged_in'] = 'Yes';
                $_SESSION['admin_user'] = TRUE;
                $_SESSION['username'] = $username;

                header('Location: /bookstore/index.php');
            } else {
                header('Location:  /bookstore/login.php');

            }
    
        }
        else 
        {
            $_SESSION['user_not_found_message'] = 'The user was not found';
            header('Location: /bookstore/login.php');
        }
        
        // die('<h1>💩</h1>');

    
        
    } else {
        if (isset($_SESSION['admin_user'])) {
            echo "<p>The admin is here!</p>";

        }

        else { ?>
            <!--- LOGIN FORM GOES HERE --->
            <form action="/bookstore/login.php" method="POST">
                <?php
                    if(isset($_SESSION['user_not_found_message'])):?>
                    <div class="w3-panel w3-red">
                        <h1>💩</h1>
                        <p>That user does not exist. Try logging in again</p>
                    </div>
                <?php endif; ?>
                <div class="w3-section">
                    <label>Username</label>
                    <input class="w3-input w3-border" type="text" name="username" required>
                </div>
                <div class="w3-section">
                    <label>Password</label>
                    <input class="w3-input w3-border" type="password" name="password" required>
                </div>
                <button type="submit" class="w3-button w3-block w3-third w3-padding-large w3-<?php echo $colors[$color_random_index]; ?> w3-margin-bottom">
                    Login Submit
                </button>
            </form>

        <?php } ?>




    <?php } ?>


</div>

<?php require("./templates/footer.php"); ?>
<?php require("./templates/header.php"); ?>
<div class="w3-main" style="margin-left:340px;margin-right:40px">
    <!-- Require the pageHeader.php file here -->
    <?php require('pageHeader.php'); ?>

    <?php
        // -- Check if the user is logged in, if not redirect them to the home page
        if(!isset($_SESSION['admin_user'])) {
            header("Location: /bookstore/index.php");     
        }
    ?>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $book_id = htmlspecialchars($_GET['bookid']);
        $author_id = htmlspecialchars($_GET['authorid']);


        $sql = 'DELETE FROM books WHERE book_id = :book_id';

        $stmt = $dbCon->prepare($sql);
        
        $stmt->execute(['book_id' => $book_id]);

        header("Location: author.php?author_id=$author_id");

    } else {
        die('Something went wrong');
    }
    ?>
</div>

<?php require("./templates/footer.php"); ?>


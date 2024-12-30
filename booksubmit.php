<?php require("./templates/header.php"); ?>
<div class="w3-main" style="margin-left:340px;margin-right:40px">
    <!-- Require the pageHeader.php file here -->
    <?php require('pageHeader.php'); ?>
    <div class="w3-container" style="margin-top:80px" id="showcase">
        <h1 class="w3-jumbo"><b>Book data</b></h1>
        <?php
        try {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $bookname = htmlspecialchars($_POST['bookname']);
                $bookgenre = htmlspecialchars($_POST['bookgenre']);
                $author_id = htmlspecialchars($_POST['author_id']);

                $sql = "

                        INSERT into books (bookname, bookgenre, author_id)
                        VALUES
                            (:bookname, :bookgenre, :author_id)
                    ";

                $stmt = $dbCon->prepare($sql);
                $stmt->execute([
                    'bookname' => $bookname,
                    'bookgenre' => $bookgenre,
                    'author_id' => $author_id
                ]);

                header("Location: author.php?author_id=$author_id");
            } else {
                echo "<p>This page was retrieved through standard GET</p>";
            }
        } catch (\Exception $e) {

            echo '<div class="w3-panel w3-red w3-padding-16">';
                echo "<h1>Input an existing genre in database</h1>";
            echo '</div>';

        }
        ?>

    </div>

    <?php require("./templates/footer.php"); ?>
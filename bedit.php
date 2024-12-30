<?php require("./templates/header.php"); ?>
<div class="w3-main" style="margin-left:340px;margin-right:40px">
    <!-- Require the pageHeader.php file here -->
    <?php require('pageHeader.php'); ?>
    <div class="w3-container" style="margin-top:80px" id="showcase">
        <h1 class="w3-jumbo"><b>Book data</b></h1> 
    </div>

    
    <?php 
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $book_id = htmlspecialchars($_POST['book_id']);
                $bookname = htmlspecialchars($_POST['bookname']);
                $bookgenre = htmlspecialchars($_POST['bookgenre']);
                $author_id = htmlspecialchars($_POST['author_id']);

            
                $sql = '
                UPDATE books
                SET bookname = :bookname, bookgenre = :bookgenre
                WHERE book_id = :book_id
                ';

                $stmt = $dbCon->prepare($sql);
                
                $stmt->execute([
                'bookname' => $bookname,
                'bookgenre' => $bookgenre,
                'book_id' => $book_id

                ]);
                
                header("Location: /bookstore/author.php?author_id=$author_id");
            }

        } catch(\Exception $e) {
            die();
        }
    ?>

</div>

<?php require("./templates/footer.php"); ?>
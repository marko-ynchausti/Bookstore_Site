<?php require("./templates/header.php"); ?>
<div class="w3-main" style="margin-left:340px;margin-right:40px">
    <!-- Require the pageHeader.php file here -->
    <?php require('pageHeader.php'); ?>
    <div class="w3-container" style="margin-top:80px" id="showcase">

    </div>

    <!--Form is here-->
    <div class="w3-container" id="contact" style="margin-top:75px">
        <h1 class="w3-xxxlarge w3-text-<?php echo $colors[$color_random_index]; ?>"><b>Edit book</b></h1>
        <hr style="width:50px;border:5px solid " class="w3-round w3-text-<?php echo $colors[$color_random_index]; ?>">

        <?php
            // -- Check if the user is logged in, if not redirect them to the home page
            if(!isset($_SESSION['admin_user'])) {
                header("Location: /bookstore/index.php");
                
            }
        ?>

        <?php
        $book_id = htmlspecialchars($_GET['bookid']);

        $sql = 'SELECT * FROM books WHERE book_id = :book_id';
        $stmt = $dbCon->prepare($sql);
        $stmt->execute(['book_id' => $book_id]);
        $results = $stmt->fetch(PDO::FETCH_ASSOC);

        ?>

        <form action="/bookstore/bedit.php" method="POST">
            <div class="w3-section">
                <label>Book Title</label>
                <input class="w3-input w3-border" type="text" name="bookname" value="<?php echo $results['bookname']; ?> " required="">
            </div>
            <div class="w3-section">
                <label>Genre</label>
                <input class="w3-input w3-border" type="text" name="bookgenre" value="<?php echo $results['bookgenre']; ?>" required="">
            </div>
            <input hidden name="book_id" value="<?php echo htmlspecialchars($_GET['bookid']); ?>" />
            <input hidden name="author_id" value="<?php echo htmlspecialchars($results['author_id']); ?>" />
            <button type="submit" class="w3-button w3-block w3-third w3-padding-large w3-<?php echo $colors[$color_random_index]; ?> w3-margin-bottom">Edit Book</button>
        </form>

    </div>

</div>

<?php require("./templates/footer.php"); ?>
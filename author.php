<?php require("./templates/header.php"); ?>
<div class="w3-main" style="margin-left:340px;margin-right:40px">
    <!-- Require the pageHeader.php file here -->
    <?php require('pageHeader.php'); ?>

    <?php 
        // -- NOTE: This is how we take additional steps in terms of prepared queries and removing charsets from hurting the system
        // -- 0. We obtain the author_id that was passed to the URL using the $_GET global array variable that exists inside of PHP
        // -- We are going to use htmlspecialchars to clean it of any funny input
        $author_id = htmlspecialchars($_GET["author_id"]);

        // -- We are going to wrap the code on a try-catch, basically, a way to guard our systems for errors
        // -- this is sort of similar to transactions, where we guard against something that we might not want to do.
        try {
            // -- 1. Prepare the Query that you wish to use, notice the syntax for author_id using a semicolon. This 
            // -- means that we are going to use a placeholder in the query that we will pass at another point in time.
            $sql = "SELECT * FROM authors WHERE author_id = :author_id";

            // -- 2. We prepare the query using the database connection object using the prepare method
            $stmt = $dbCon->prepare($sql);

            // -- 3. We execute the query, making sure to pass the $author_id variable
            $stmt->execute(['author_id' => $author_id]);
            $results_author = $stmt->fetch(PDO::FETCH_ASSOC);

            // -- 4. Any error gets trapped here, it presents an alert message and it then shows what went wrong inside of it.
        } catch (\Exception $e) {
                echo "<h1>There was an error with your query, or something funny was passed to the url. Try again</h1>";
                echo "<h2><What was passed to the url was: </h2>";
                echo '<div class="w3-panel w3-red w3-padding-16">';
                    echo $author_id;
                    echo '<p>This is a no no</p>';
                echo '</div>';
                die();
        }


    ?>

    <!-- NOTE: Authors information will exist in here -->
    <?php 

        $sql  = "SELECT authors.author_id, book_id, first_name, last_name, bookname, bookgenre 
                 FROM authors
                 LEFT JOIN books on books.author_id = authors.author_id where :author_id = books.author_id";

        $stmt = $dbCon->prepare($sql);
        $stmt->execute(['author_id' => $author_id]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);



    ?>
    <div class="w3-container" style="margin-top:1px" id="showcase">
        <h1 class="w3-jumbo"><b>Welcome to the collection of books from:</b></h1>
        <h1 class="w3-xxxlarge w3-text-<?php echo $colors[$color_random_index]; ?>">
            <b><?php echo $results_author['first_name'] . ' ' . $results_author['last_name']; ?></b>
        
        </h1>
        <hr style="width:50px;border:5px solid " class="w3-round w3-text-<?php echo $colors[$color_random_index]; ?>">
        <!-- Show the list of books here, in card format -->
        <div class="w3-row-padding w3-margin-top">
            <?php if($results): ?>
                <?php foreach($results as $result): ?>
                    <div class="w3-third w3-padding-16">
                        <div class="w3-card w3-margin-16">
                        <img style="width: 100%; margin-top: 0;" src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b6/Gutenberg_Bible%2C_Lenox_Copy%2C_New_York_Public_Library%2C_2009._Pic_01.jpg/495px-Gutenberg_Bible%2C_Lenox_Copy%2C_New_York_Public_Library%2C_2009._Pic_01.jpg" alt="Avatar" height="250">
                            <div class="w3-container">
                                <h4>Book Title: <br /><b><?php echo $result['bookname']; ?></b></h4>
                                <p>Genre: <b><?php echo $result['bookgenre']; ?></b></p>

                                <?php if(isset($_SESSION['admin_user'])): ?>
                                    <a class="w3-button w3-red" style="marging-bottom: 105 px;" method='DELETE' href="bookdelete.php/?bookid=<?php echo $result['book_id'];?>&authorid=<?php echo $result['author_id'];?>" data-target="bookdelete.php/<?php echo $result['book_id'];?>" data-method="DELETE" >Delete book</a>
                                    <a class="w3-button w3-blue" style="marging-bottom: 105 px;" method='EDIT' href="bookedit.php?bookid=<?php echo $result['book_id'];?>" target="_blank" data-target="bookedit.php/<?php echo $result['book_id'];?>" data-method="EDIT" >Edit book</a>
                                <?php else: ?>
                                    <p>Log in to change this information</p>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>We got nada for this author :D</p>
            <?php endif; ?>
        </div>
    </div>

    

    <?php if(isset($_SESSION['admin_user'])): ?>
        <div class="w3-container" id="contact" style="margin-top:75px">
        <h1 class="w3-xxxlarge w3-text-<?php echo $colors[$color_random_index]; ?>"><b>Add a new book.</b></h1>
        <hr style="width:50px;border:5px solid " class="w3-round w3-text-<?php echo $colors[$color_random_index]; ?>">

        <p></p>

        <form action="booksubmit.php" method="POST">
            <div class="w3-section">
                <label>Book Title</label>
                <input class="w3-input w3-border" type="text" name="bookname" required="">
            </div>
            <div class="w3-section">
                <label>Genre</label>
                <input class="w3-input w3-border" type="text" name="bookgenre" required="">
            </div>
            <input hidden name="author_id" value="<?php echo $author_id; ?>"/>
            <button type="submit" class="w3-button w3-block w3-third w3-padding-large w3-<?php echo $colors[$color_random_index]; ?> w3-margin-bottom">Add Book</button>
        </form>
    <?php endif; ?>
   </div>        
</div>

<?php require("./templates/footer.php"); ?>
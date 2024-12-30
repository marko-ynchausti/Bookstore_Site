

<!-- Authors -->
<div class="w3-container" id="designers" style="margin-top:75px">
    <h1 class="w3-xxxlarge w3-text-<?php echo $colors[$color_random_index]; ?>"><b>Authors</b></h1>
    <hr style="width:50px;border:5px solid" class="w3-round w3-text-<?php echo $colors[$color_random_index]; ?>">
    <p>The best selection of authors in the world.</p>
    <p>Our bookstore features a talented lineup of authors, including best-seller Marko Gronkowski, known for his thrilling plots, and Isaac Garza, whose vivid storytelling captivates readers. Emiliano Rickerson and Gabriel Gunnerson bring emotional depth and adventure, while Lucy Brucey explores personal growth through her contemporary novels. Newcomers like Gaby Rockhold and Rick Nickelback are quickly making their mark, offering fresh perspectives. With diverse voices from Nathan Graythan to Israel Adesanya, there's something for everyone in our collection.
    </p>

    <table class="w3-table-all w3-bordered w3-striped w3-border test w3-hoverable">
        <tr class="w3-<?php echo $colors[$color_random_index]; ?>">
            <th>Author ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>View Collection</th>
        </tr>
        <?php 

                $stmt = $dbCon->query('SELECt * from authors');

                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach($results as $author) {
                        echo '<tr>';
                            echo '<td>' .($author['author_id']) . '</td>';
                            echo '<td>' .($author['first_name']) . '</td>';
                            echo '<td>' .($author['last_name']) . '</td>';
                            echo '<td>';
                                ?>
                                    <a href="<?php echo 'author.php?author_id=' . $author['author_id']; ?>">Book Collection</a>  
                    <?php   echo '</td>' ;
                        echo '</tr>';
                    }
        ?>
    </table>
</div>
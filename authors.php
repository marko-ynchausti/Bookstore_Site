

<!-- Authors -->
<div class="w3-container" id="designers" style="margin-top:75px">
    <h1 class="w3-xxxlarge w3-text-<?php echo $colors[$color_random_index]; ?>"><b>Authors</b></h1>
    <hr style="width:50px;border:5px solid" class="w3-round w3-text-<?php echo $colors[$color_random_index]; ?>">
    <p>The best selection of authors in the world.</p>
    <p>We are lorem ipsum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
        aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure
        dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
        cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing
        elit, sed do eiusmod tempor
        incididunt ut labore et quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
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
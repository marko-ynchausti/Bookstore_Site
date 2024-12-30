<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require('src/db.php'); 

    


    $dbCon  = DBConn::makeDBConn();

    $stmt = $dbCon->query('SELECT * FROM "websitedata"');

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
?>



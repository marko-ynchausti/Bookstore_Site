<?php
    require("./templates/header.php");
    $_SESSION = [];
    session_destroy();
    header("Location: /bookstore/index.php");
?>
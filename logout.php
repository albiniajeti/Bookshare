<?php include "includes/db.php"; ?>

<?php session_start() ?>

<?php
    
    $_SESSION['loggedIn'] = null;
    $_SESSION['userId'] = null;
    session_destroy();

header("Location: index.php");
?>
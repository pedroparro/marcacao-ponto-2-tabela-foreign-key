<?php 

if (!$_SESSION['users']) {
    session_start();
    session_destroy();
    header("location: index.php");
    exit;
}

?>
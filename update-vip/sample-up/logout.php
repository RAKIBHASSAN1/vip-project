<?php
    session_start();

    $go = $_SESSION["last"] ; 
    
    $_SESSION = array();
    
    session_destroy();

    header("location: $go ");

    exit;
?>
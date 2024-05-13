<?php 
 
    session_start();

    if(!isset($_COOKIE['flag'])) {
        
        header('location: login.php');
    }
?>

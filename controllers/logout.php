<?php 
    session_start();
    
    // Delete the 'flag' cookie by setting its expiration time in the past
    setcookie('flag', 'true', time() - 10, '/');
    

    setcookie('user', $username, time() - 10, '/');
    
 
    header('location: ../views/login.php');
?>

<?php
function loginControl($username, $password) {
    session_start();
    require_once('../models/userModel.php');    
    $status = login($username, $password); //login from model

    // If login is successful
    if ($status) {
        $_SESSION['flag'] = "true";
        setcookie('flag', 'true', time() + 3600, '/'); 
        setcookie('user', $username, time() + 3600, '/'); // Expires in 1 hour
        return true;
    } else {
        return false;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errMsg = "";
    $username = $password = "";

    if (empty($_POST['username'])) {
        $errMsg = "Username is required!";
    } else {
        $username = $_POST['username'];
    }

 
    if (empty($_POST['password'])) {
        $errMsg = "Password is required!";
    } else {
        $password = $_POST['password'];
    }


    if (empty($errMsg)) {
        $result = loginControl($username, $password);

        
        if ($result) {
            header('location: ../views/dashboard.php');
            exit; 
        } else {
            
            $errMsg = "Invalid credentials!";
        }
    }
}

?>

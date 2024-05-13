<?php
// Ensure user is logged in
require_once '../controllers/sessionCheck.php';
require_once '../models/userModel.php';  // Make sure the path is correct

$errMsg = "";
$oldPassword = $password = $password2 = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $oldPassword = $_REQUEST['oldPassword'] ?? '';
    $password = $_REQUEST['password'] ?? '';
    $password2 = $_REQUEST['password2'] ?? '';

    if (empty($oldPassword)) {
        $errMsg .= "Old Password is required!<br />";
    }
    if (empty($password)) {
        $errMsg .= "New Password is required!<br />";
    }
    if ($password !== $password2) {
        $errMsg .= "New Password and Confirm New Password do not match!<br />";
    }

    if (empty($errMsg)) {
        // Attempt to change the password
        $result = changePassword($oldPassword, $password);
        if ($result) {
            $errMsg = "Password Changed Successfully!";
        } else {
            $errMsg = "Failed to change password. Please check your old password.";
        }
    }
}
?>

<?php
// A function to update the profile of the current user
function profileUpdate($name, $address, $email, $mobileNumber) {
    // Start a new or resume the existing session
    session_start();

    // Include the user model for database operations
    require_once('../models/userModel.php');
    // Call the function to update user profile information in the database
    profileUpdateModel($name, $address, $email, $mobileNumber);
}

// Include necessary files for session check and header
require_once '../controllers/sessionCheck.php';
include_once 'header.php';
include_once '../models/userModel.php';

// Initialize variables to hold form data and error message
$errMsg = "";
$name = $email = $address = $mobileNumber = "";

// Fetch current user's profile
$user = profile();

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $flag = false; // Flag to indicate validation errors

    // Validate name
    if (empty($_REQUEST['name'])) {
        $errMsg = "{$errMsg} <br />Name is required!";
        $flag = true;
    } else {
        $name = $_REQUEST['name'];
    }

    // Validate email
    if (empty($_REQUEST['email'])) {
        $errMsg = "{$errMsg} <br />Email Address is required!";
        $flag = true;
    } else {
        $email = $_REQUEST['email'];
    }

    // Address and mobile number are fetched without validation
    $address = $_REQUEST['address'];
    $mobileNumber = $_REQUEST['mobile_number'];

    // If no validation errors, update the profile
    if (!$flag) {
        profileUpdate($name, $address, $email, $mobileNumber);
    }
}
?>

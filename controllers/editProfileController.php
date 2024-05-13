<?php
    // Ensure user is logged in by checking the session
    require_once '../controllers/sessionCheck.php';
    // Include the page header
    include_once 'header.php';
    // Include the user model for database operations
    include_once '../models/userModel.php';

    // Initialize variables for error messages and user inputs
    $errMsg = "";
    $name = $email = $address = $mobileNumber = "";
    
    // Fetch the current user's profile information
    $user = profile();

    // Check if the form has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $flag = false; // A flag to track validation errors

        // Validate the name field
        if (empty($_REQUEST['name'])) {
            $errMsg = "{$errMsg} <br />Name is required!";
            $flag = true;
        } else {
            $name = $_REQUEST['name'];
        }

        // Validate the email field
        if (empty($_REQUEST['email'])) {
            $errMsg = "{$errMsg} <br />Email Address is required!";
            $flag = true;
        } else {
            $email = $_REQUEST['email'];
        }

        // Assign address and mobile number from the form, no validation applied
        $address = $_REQUEST['address'];
        $mobileNumber = $_REQUEST['mobile_number'];

        // If no validation errors, proceed to update the user's profile
        if (!$flag) {
            // Include the profile controller for profile update functionality
            include '../controllers/profileController.php';
            // Call the profileUpdate function with the form inputs
            profileUpdateModel($name, $address, $email, $mobileNumber);
        }
    }
?>

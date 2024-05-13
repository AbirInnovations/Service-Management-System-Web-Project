<?php
    // Include session check to ensure user is logged in
    require_once '../controllers/sessionCheck.php';
    // Include the user model for database interactions
    include_once '../models/userModel.php';
    
    // Initialize variables for error messages, service type, availability, and to store customer data
    $errMsg = $serviceType = $availability = "";
    // Fetch all customers initially
    $customers = findAllCustomers();

    // Check if the form has been submitted via POST method
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $flag = false; // Flag to detect validation failures

      // Check if serviceType has been provided, if not, set flag to true indicating a validation failure
      if (empty($_REQUEST['serviceType'])) {
        // Commented out error message addition to keep errMsg unchanged
        // $errMsg = "{$errMsg} <br />ServiceType is required!";
        $flag = true;
      } else {
          $serviceType = $_REQUEST['serviceType']; // Assign provided service type to variable
      }


      $availability = $_REQUEST['availability'];

      // If no validation issues, update $customers based on provided service type and availability
      if (!$flag) {
        $customers = findCustomer($serviceType, $availability);
      }
    }
?>

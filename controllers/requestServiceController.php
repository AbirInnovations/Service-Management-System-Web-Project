<?php
// Include the session check script to ensure the user is logged in
require_once '../controllers/sessionCheck.php';
// Include the user model for database operations
include_once '../models/userModel.php';
    
// Initialize variables to hold form data and error messages
$errMsg = $serviceType = $location = $date = $mobileNumber = $comment = "";
// Retrieve service requests for the logged-in user
$requestservice = viewRequestService($_COOKIE['user']);

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Collect form data from the request
  $serviceType = $_REQUEST['serviceType'];
  $location = $_REQUEST['location'];
  $date = $_REQUEST['date'];
  $mobileNumber = $_REQUEST['mobileNumber'];
  $comment = $_REQUEST['comment'];
  $owner = $_COOKIE['user']; // Owner is the currently logged-in user
  
  // Attempt to add the new service request to the database
  $result = addRequestService($serviceType, $location, $date, $mobileNumber, $comment, $owner);

  // Check if the service request was added successfully
  if ($result) {
    $errMsg = "Request added successfully!";
    // Redirect the user to the service request page
    header('location: requestService.php');
  }
}
?>

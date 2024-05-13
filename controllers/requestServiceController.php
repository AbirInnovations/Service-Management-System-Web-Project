<?php

require_once '../controllers/sessionCheck.php';
include_once '../models/userModel.php';

$errMsg = $serviceType = $location = $date = $mobileNumber = $comment = "";
$requestservice = viewRequestService($_COOKIE['user']);


if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $serviceType = $_REQUEST['serviceType'];
  $location = $_REQUEST['location'];
  $date = $_REQUEST['date'];
  $mobileNumber = $_REQUEST['mobileNumber'];
  $comment = $_REQUEST['comment'];
  $owner = $_COOKIE['user']; // Owner is the currently logged-in user
  
  $result = addRequestService($serviceType, $location, $date, $mobileNumber, $comment, $owner);


  if ($result) {
    $errMsg = "Request added successfully!";

    header('location: requestService.php');
  }
}
?>

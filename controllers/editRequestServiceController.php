<?php
include_once '../models/userModel.php';


$id = $_REQUEST['id']; 
$serviceType = $_REQUEST['serviceType'];
$location = $_REQUEST['location']; 
$date = $_REQUEST['date']; 
$mobileNumber = $_REQUEST['mobileNumber']; 
$comment = $_REQUEST['comment']; 

editRequestService($id, $serviceType, $location, $date, $mobileNumber, $comment);
?>

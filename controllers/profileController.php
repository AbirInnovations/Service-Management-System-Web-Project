<?php
function profileUpdate($name, $address, $email, $mobileNumber) {
    session_start();

    require_once('../models/userModel.php');
    profileUpdateModel($name, $address, $email, $mobileNumber);
}


require_once '../controllers/sessionCheck.php';
include_once 'header.php';
include_once '../models/userModel.php';


$errMsg = "";
$name = $email = $address = $mobileNumber = "";


$user = profile();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $flag = false; // Flag to indicate validation errors


    if (empty($_REQUEST['name'])) {
        $errMsg = "{$errMsg} <br />Name is required!";
        $flag = true;
    } else {
        $name = $_REQUEST['name'];
    }

 
    if (empty($_REQUEST['email'])) {
        $errMsg = "{$errMsg} <br />Email Address is required!";
        $flag = true;
    } else {
        $email = $_REQUEST['email'];
    }

   
    $address = $_REQUEST['address'];
    $mobileNumber = $_REQUEST['mobile_number'];

    if (!$flag) {
        profileUpdate($name, $address, $email, $mobileNumber);
    }
}
?>

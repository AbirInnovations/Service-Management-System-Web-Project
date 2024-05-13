<?php
  
    require_once '../controllers/sessionCheck.php';
    include_once 'header.php';
    include_once '../models/userModel.php';

 
    $errMsg = "";
    $name = $email = $address = $mobileNumber = "";

    $user = profile();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $flag = false; //  flag to track validation errors

        if (empty($_REQUEST['name'])) {
            $errMsg = "{$errMsg} <br />Name is required!"; //validate
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

        // Assign address and mobile number from the form, no validation applied
        $address = $_REQUEST['address'];
        $mobileNumber = $_REQUEST['mobile_number'];

        if (!$flag) {
            include '../controllers/profileController.php';
            profileUpdateModel($name, $address, $email, $mobileNumber);
        }
    }
?>

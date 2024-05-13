<?php
    require_once '../controllers/sessionCheck.php';
    include_once '../models/userModel.php';
    
    $errMsg = $serviceType = $availability = "";

    $customers = findAllCustomers();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $flag = false; // Flag to detect validation failures

    
      if (empty($_REQUEST['serviceType'])) {
        $flag = true;
      } else {
          $serviceType = $_REQUEST['serviceType']; // Assign provided service type to variable
      }


      $availability = $_REQUEST['availability'];

      if (!$flag) {
        $customers = findCustomer($serviceType, $availability); //no val issue
      }
    }
?>

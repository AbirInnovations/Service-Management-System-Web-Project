<?php
session_start(); 
require_once '../models/db.php'; 

$areaName = isset($_GET['area']) ? $_GET['area'] : '';


$con = getConnection();


$sql = "SELECT * FROM areas WHERE area = '$areaName'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    echo "Yes, this area is available.";
} else {
    echo "Not available at the moment.";
}

$con->close();
?>

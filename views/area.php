<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Check Area Availability</title>
    <script src="../js/myscript.js"></script>


</head>
<body class="dashboard-page">
<?php include 'header.php'; ?>
    <h1>Check if an Area is Available in Dhaka City</h1>
    <input type="text" id="areaName" placeholder="Enter Area Name">
    <button onclick="checkAreaAvailability()">Check Availability</button> 

    <p id="result"></p>
</body>
</html>

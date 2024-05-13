<?php
// Ensure the user session is active; otherwise, redirect or deny access
require_once '../controllers/sessionCheck.php';
// Include the user model for accessing user-related functions
include_once '../models/userModel.php';

// Fetch service requests specific to the logged-in user
$username = isset($_COOKIE['user']) ? $_COOKIE['user'] : '';
$RequestS = viewRequestService($username);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body class="dashboard-page">
    <?php include 'header.php'; ?>

    <h2 align="center">DASHBOARD</h2>

    <center>
        <a href="area.php" class="button-square">View Our Coverage Area In Dhaka City</a>
        <a href="services.php" class="button-square2">View Our Services & Units Availability</a>
    </center>

    <section>
        <table border="0" width="100%">
            <tr>
                <td width="25%"></td> <!-- Left spacer column -->
                <td>
                    <?php foreach ($RequestS as $request) { ?>
                        <table border="0" width="100%">
                            <tr>
                                <td colspan="2"><?php echo $request['comment']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Service Type: </b><?php echo $request['serviceType']; ?></td>
                                <td><b>Location: </b><?php echo $request['location']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Date: </b><?php echo $request['date']; ?></td>
                                <td><b>Contact: </b><a href="tel:<?php echo $request['mobileNumber']; ?>"><?php echo $request['mobileNumber']; ?></a></td>
                            </tr>
                        </table>
                        <hr />
                    <?php } ?>
                </td>
                <td width="25%"></td> <!-- Right spacer column -->
            </tr>
        </table>
    </section>
</body>
</html>

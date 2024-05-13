<?php
// Include session check to ensure the user is logged in
include_once '../controllers/sessionCheck.php';
// Include the user model for database interactions
include_once '../models/userModel.php';

// Check if an ID is passed in the URL and store it
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

// Fetch the specific service request details using the ID
$requestService = viewRequestServiceForId($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Correct the viewport attribute for proper mobile responsiveness -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Service Request</title>
</head>
<body class="dashboard-page">
    <?php 
    // Include the header file for navigation
    include_once 'header.php'; 
    ?>

    <section>
    <!-- Layout table to center the form on the page -->
    <table border="0" width="100%">
        <tr>
        <td width="25%"></td> <!-- Spacer column -->
        <td>
            <!-- Form for editing the service request -->
            <form method="post" action="../controllers/editRequestServiceController.php">
            <fieldset>
                <legend>Edit Service Request</legend>
                <!-- Display the post ID as read-only -->
                Post ID:
                <input type="text" name="id" value="<?=$requestService[0]['id']?>" readonly />
                <br /><br />
                <!-- Dropdown for service type selection with pre-selected value based on existing data -->
                Service Type: <select name="serviceType" required>
                    <option value="Service 1" <?php if ($requestService[0]['serviceType'] == "Service 1") echo "selected";?>>Service 1</option>
                    <option value="Service 2" <?php if ($requestService[0]['serviceType'] == "Service 2") echo "selected";?>>Service 2</option>
                    <!-- Add more services as needed -->
                </select>
                <br /><br />
                <!-- Input fields for location, date, mobile number, and comment with pre-filled existing data -->
                Location:
                <input type="text" name="location" value="<?=$requestService[0]['location']?>" required />
                <br /><br />
                Date:
                <input type="date" name="date" value="<?=$requestService[0]['date']?>" required />
                <br /><br />
                Mobile Number:
                <input type="text" name="mobileNumber" value="<?=$requestService[0]['mobileNumber']?>" required />
                <br /><br />
                Comment:
                <textarea name="comment" cols="30" rows="10"><?=$requestService[0]['comment']?></textarea>
                <br /><br />
                <!-- Submit button to save changes -->
                <input type="submit" value="Submit" />
            </fieldset>
            </form>
        </td>
        <td width="25%"></td> <!-- Spacer column -->
        </tr>
    </table>
    </section>
</body>
</html>

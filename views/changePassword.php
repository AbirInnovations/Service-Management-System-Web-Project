<?php
    // Include the password change logic controller
    require_once '../controllers/changePasswordController.php'; // Adjust the path as necessary
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Change Password</title>
    <link rel="stylesheet" href="path/to/your/styles.css"> <!-- Ensure the CSS path is correct -->
</head>
<body class="dashboard-page">
    <?php include 'header.php'; ?> <!-- Include the header navigation -->
    <section>
        <div style="width: 50%; margin: 0 auto;"> <!-- Centering the form on the page -->
            <h2>Change Password</h2>
            <p style="color: red"><?php echo $errMsg; ?></p>
            <form method="post" action="changePassword.php">
                <fieldset>
                    <legend>Change Password</legend>
                    <label for="oldPassword">Old Password:</label>
                    <input type="password" name="oldPassword" id="oldPassword" required>
                    <br /><br />
                    <label for="password">New Password:</label>
                    <input type="password" name="password" id="password" required>
                    <br /><br />
                    <label for="password2">Confirm New Password:</label>
                    <input type="password" name="password2" id="password2" required>
                    <br /><br />
                    <input type="submit" value="Change Password">
                </fieldset>
            </form>
        </div>
    </section>
</body>
</html>

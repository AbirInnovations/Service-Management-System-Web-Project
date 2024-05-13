<?php
// Including the login controller
include_once '../controllers/loginController.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body class="registration-page">
    <?php include_once 'header.php';?> <!-- Including header -->

    <section>
        <table border="0" width="100%">
            <tr>
                <td width="40%"></td>
                <td>
                    <!-- Display any error message -->
                    <p><?php echo isset($errMsg) ? $errMsg : ''; ?></p>
                    <br />
                    <!-- Login form -->
                    <form method="post" action="" enctype="">
                        <fieldset>
                            <legend><h3>Login</h3></legend>
                            <br />
                            <!-- Input fields for username and password -->
                            Username: <input type="text" name="username" />
                            <br /><br />
                            Password: <input type="password" name="password" />
                            <br /><br />
                            <input type="submit" name="submit" class="button submit" value="Login" />
                            <!-- Link to registration page -->
                            <p>Don't have an account? <a href="registration.php">Register Now</a></p>
                            <br />
                        </fieldset>
                    </form>
                </td>
                <td width="40%"></td>
            </tr>
        </table>
    </section>
</body>
</html>

<?php 

$errMsg = '';


include_once '../controllers/registrationController.php';


include_once 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body class="registration-page">

<section>
    <table width="100%">
        <tr>
            <td width="30%"></td> <!-- Spacer column -->
            <td>
                <fieldset>
                    <legend><h3>Registration</h3></legend>
               
                    <form name="myForm" method="post" action="registration.php" enctype="multipart/form-data" onsubmit="return validateForm()">
                        <table>
                            <tr><td>Username:</td><td><input type="text" name="username" value="<?php echo isset($username) ? $username : '';?>"></td></tr>
                            <tr><td>Password:</td><td><input type="password" name="password"></td></tr>
                            <tr><td>Confirm Password:</td><td><input type="password" name="password2"></td></tr>
                            <tr><td>Full Name:</td><td><input type="text" name="name" value="<?php echo isset($name) ? $name : '';?>"><div id="nameerror"></div></td></tr>
                            <tr><td>Address:</td><td><input type="text" name="address" value="<?php echo isset($address) ? $address : '';?>"></td></tr>
                            <tr><td>Email Address:</td><td><input type="email" name="email" value="<?php echo isset($email) ? $email : '';?>"><div id="emailerror"></div></td></tr>
                            <tr><td>Mobile Number:</td><td><input type="text" name="mobile_number" value="<?php echo isset($mobileNumber) ? $mobileNumber : '';?>"><div id="mobile_number_error"></div></td></tr>
                            <tr><td></td><td><input type="submit" name="submit" class="button submit" value="Submit"></td></tr>
                        </table>
                        <p>Already have an account? <a href="login.php">Login</a></p>
                    </form>
                </fieldset>
            </td>
            <td width="30%"></td> <!-- Spacer column -->
        </tr>
    </table>
</section>
<script src="../js/myscript.js"></script>
</body>
</html>

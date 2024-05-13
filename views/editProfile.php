<?php

    require_once '../controllers/editProfileController.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Profile</title>
</head>
<body class="dashboard-page">
    <?php 
    include_once 'header.php';
    ?>

    <section>
     
      <table width="100%" style="margin-top: 20px;">
        <tr>
          <td width="10%"></td> <!-- Left spacer column -->
          <td width="80%">
            <p style="color: red;"><?php echo $errMsg; ?></p>
            <fieldset>
              <legend>Edit Profile</legend>
              <img src="<?php echo $user[0]['profilePicture']; ?>" alt="Profile Picture" style="width: 200px; height: 200px;">
              <form method="post" action="editProfile.php" enctype="multipart/form-data">
                <table width="100%">
                  <tr>
                    <td style="text-align: right; padding-right: 10px;"><b>Username:</b></td>
                    <td><?php echo $user[0]['username']; ?></td>
                  </tr>
                  <tr>
                    <td style="text-align: right; padding-right: 10px;">Full Name:</td>
                    <td><input type="text" name="name" value="<?php echo $user[0]['name']; ?>" style="width: 100%;"></td>
                  </tr>
                  <tr>
                    <td style="text-align: right; padding-right: 10px;">Address:</td>
                    <td><input type="text" name="address" value="<?php echo $user[0]['address']; ?>" style="width: 100%;"></td>
                  </tr>
                  <tr>
                    <td style="text-align: right; padding-right: 10px;">Email Address:</td>
                    <td><input type="email" name="email" value="<?php echo $user[0]['email']; ?>" style="width: 100%;"></td>
                  </tr>
                  <tr>
                    <td style="text-align: right; padding-right: 10px;">Mobile Number:</td>
                    <td><input type="text" name="mobile_number" value="<?php echo $user[0]['mobileNumber']; ?>" style="width: 100%;"></td>
                  </tr>
                  <tr>
                    <td colspan="2" style="text-align: center;"><input type="submit" name="submit" value="Submit" style="margin-top: 20px;"></td>
                  </tr>
                </table>
              </form>
            </fieldset>
          </td>
          <td width="10%"></td> <!-- Right spacer column -->
        </tr>
      </table>
    </section>
</body>
</html>

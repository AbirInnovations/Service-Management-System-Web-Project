<?php

    require_once '../controllers/profileController.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profile</title>
  </head>
  <body class="dashboard-page">
    <?php 
 
    include_once 'header.php';
    ?>

    <section>
      <!-- Structure the layout with a table, centering the main content -->
      <table border="0" width="100%">
        <tr>
          <td width="10%"></td> <!-- Left spacer column -->
          <td>
            <br />
            <!-- Inner table for profile navigation and details -->
            <table border="0" width="100%">
              <tr>
                <td width="30%">
                  <!-- Profile navigation menu -->
                  <ul><a href="profile.php"><li>Your Profile</li></a></ul>
                  <ul><a href="editProfile.php"><li>Edit Profile</li></a></ul>
                  <ul><a href="changeProfilePicture.php"><li>Change Profile Picture</li></a></ul>
                  <ul><a href="changePassword.php"><li>Change Password</li></a></ul>
                </td>

                <td width="70%" style="text-align: center;">
               
                    <form method="post" action="" enctype="multipart/form-data">
                        <fieldset>
                        <legend>Your Profile</legend>
                        <br />
                        <!-- Display user profile picture -->
                        <img src="<?=$user[0]['profilePicture']?>" alt="profile-picture" width="200" height="200">
                        <br /><br />
                        <!-- Display username -->
                        <b>Username: </b><span><?=$user[0]['username']?></span>
                        <br /><br />
                        <!-- Display full name -->
                        <b>Full Name: </b><span><?=$user[0]['name']?></span>
                        <br /><br />
                        <!-- Display address -->
                        <b>Address: </b><span><?=$user[0]['address']?></span>
                        <br /><br />
                        <!-- Display email address -->
                        <b>Email Address: </b><span><?=$user[0]['email']?></span>
                        <br /><br />
                        <!-- Display mobile number -->
                        <b>Mobile Number: </b><span><?=$user[0]['mobileNumber']?></span>
                        <br /><br />
                        </fieldset>
                    </form>
                </td>
              </tr>
            </table>
            
          </td>
          <td width="25%"></td> <!-- Right spacer column -->
        </tr>
      </table>
    </section>
  </body>
</html>

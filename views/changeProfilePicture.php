<?php
include_once '../controllers/changeProfilePictureController.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Profile Picture</title>
</head>
<body class="dashboard-page">
    <?php include 'header.php'; ?>

    <section>
        <table width="100%">
            <tr>
                <td width="10%"></td>
                <td>
                    <p style="color: red"><?= $errMsg ?></p>
                    <fieldset>
                        <legend>Change Profile Picture</legend>
                        <img src="<?= $user[0]['profilePicture'] ?? 'default_profile.png' ?>" alt="Profile Picture" width="200" height="200">
                        <form method="post" enctype="multipart/form-data">
                            <br><br>
                            <input type="file" name="profilePicture" id="profilePicture">
                            <br><br>
                            <input type="submit" value="Change Profile Picture">
                        </form>
                    </fieldset>
                </td>
                <td width="25%"></td>
            </tr>
        </table>
    </section>
</body>
</html>

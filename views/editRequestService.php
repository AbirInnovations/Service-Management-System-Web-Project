<?php

include_once '../controllers/sessionCheck.php';

include_once '../models/userModel.php';


if (isset($_GET['id'])) {
    $id = $_GET['id'];
}


$requestService = viewRequestServiceForId($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Service Request</title>
</head>
<body class="dashboard-page">
    <?php 

    include_once 'header.php'; 
    ?>

    <section>

    <table border="0" width="100%">
        <tr>
        <td width="25%"></td> <!-- Spacer column -->
        <td>
    
            <form method="post" action="../controllers/editRequestServiceController.php">
            <fieldset>
                <legend>Edit Service Request</legend>
             
                Post ID:
                <input type="text" name="id" value="<?=$requestService[0]['id']?>" readonly />
                <br /><br />
           
                Service Type: <select name="serviceType" required>
                    <option value="Service 1" <?php if ($requestService[0]['serviceType'] == "Service 1") echo "selected";?>>Service 1</option>
                    <option value="Service 2" <?php if ($requestService[0]['serviceType'] == "Service 2") echo "selected";?>>Service 2</option>
         
                </select>
                <br /><br />
          
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

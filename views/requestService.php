<?php

include_once '../controllers/requestServiceController.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Service</title>
</head>
<body class="dashboard-page">
    <?php 
 
    include_once 'header.php';
    ?>

    <section>
      <table border="0" width="100%">
        <tr>
          <td width="25%"></td>
          <td>
      
            <p style="color: red"><?php echo $errMsg;?></p>
            <br />
            <form method="post" action="" enctype="">
              <fieldset>
                <legend>Request Service</legend>
                <br />
          
                Service Type: <select name="serviceType" id="serviceType" value="<?php echo $serviceType;?>" required>
                    <option value="" <?php if (isset($serviceType) && $serviceType=="") echo "selected";?>>-</option>
                    <option value="service 1" <?php if (isset($serviceType) && $serviceType=="Service 1") echo "selected";?>>Service 1</option>
                    <option value="service 2"<?php if (isset($serviceType) && $serviceType=="service2") echo "selected";?>>service 2</option>
      
                </select>
                <br /><br />
                <!-- Input for location -->
                Location:
                <input type="text" name="location" value="<?php echo $location;?>" required />
                <br /><br />
                <!-- Input for date -->
                Date:
                <input type="date" name="date" value="<?php echo $date;?>" required />
                <br /><br />
                <!-- Input for mobile number -->
                Mobile Number:
                <input type="text" name="mobileNumber" value="<?php echo $mobileNumber;?>" required />
                <br /><br />
                <!-- Textarea for additional comments -->
                Comment:
                <textarea name="comment" id="comment" cols="30" rows="10">
                    <?php echo trim($comment);?>
                </textarea>
                <br /><br />
                <!-- Submit button -->
                <input type="submit" name="submit" value="Submit" />
                <br /><br />
              </fieldset>
            </form>
          </td>
          <td width="25%"></td>
        </tr>
      </table>
    </section>

    <br /><br />
    <h2 style="text-align:center">Your Posts</h2>

    <section>
      <br>
      <table border="0" width="100%">
        <tr>
          <td width="25%">&nbsp;</td>
          <td>
          <!-- Loop through the requestservices array and display each request -->
          <?php for($i = 0; $i < count($requestservice); $i++) { ?>
            <table border="0" width="100%">
                <tr>
                    <!-- Display the comment of the request -->
                    <td colspan="2"><br /><?php echo $requestservice[$i]['comment'];?></td>
                </tr>
                <tr>
                    <td>
                        <br />
                    </td>
                </tr>
                <tr>
                    <!-- Display service type and location -->
                    <td><b>Service : </b><?php echo $requestservice[$i]['serviceType'];?></td>
                    <td style="text-align: right;"><b>Location: </b><?php echo $requestservice[$i]['location'];?></td>
                </tr>

                <tr>
                    <!-- Display date and contact information -->
                    <td><b>Date: </b><?php echo $requestservice[$i]['date'];?></td>
                    <td style="text-align: right;"><b>Contact: </b><a href="tel:<?php echo $requestservice[$i]['mobileNumber'];?>"><?php echo $requestservice[$i]['mobileNumber'];?></a></td>
                </tr>

                <tr>
                    <td colspan="2">
                        <br>
                        <!-- Edit and Delete buttons for each post -->
                        <a href="editRequestService.php?id=<?php echo $requestservice[$i]['id'];?>"><button>Edit</button></a>&nbsp;
                        <a href="../controllers/deleteRequestServiceController.php?id=<?php echo $requestservice[$i]['id'];?>"><button>Delete</button></a>
                        <br /><br />
                    </td>
                </tr>
            </table>
            <hr />
            <?php } ?>
        </td>
          <td width="25%">&nbsp;</td>
        </tr>
      </table>
    </section>
</body>
</html>

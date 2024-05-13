<?php

    include_once '../controllers/findCustomerController.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Donor</title>
</head>
<body class="dashboard-page">
    <?php include 'header.php'; ?>

    <section>
      <table border="0" width="100%">
        <tr>
          <td width="25%"></td> <!-- Spacer column -->
          <td>
            <p style="color: red"><?php echo $errMsg; ?></p>
            <br />
            <form method="post" action="" enctype="">
              <fieldset>
                <legend>Find Customer</legend>
                <br />
                ServiceType: 
                <select name="serviceType" id="serviceType">
                    <option value="" <?php if (isset($serviceType) && $serviceType == "") echo "selected"; ?>>-</option>
                    <option value="service 1" <?php if (isset($serviceType) && $serviceType == "service 1") echo "selected"; ?>>service 1</option>
                    <option value="service 2" <?php if (isset($serviceType) && $serviceType == "service 2") echo "selected"; ?>>service 2</option>
                    <option value="service 3" <?php if (isset($serviceType) && $serviceType == "service 3") echo "selected"; ?>>service 3</option>
                </select>
                <br /><br />
                Availability:
                <input type="text" name="availability" value="<?php echo $availability; ?>" />
                <br /><br />
                <input type="submit" name="submit" value="Search" />
                <br /><br />
              </fieldset>
            </form>
          </td>
          <td width="25%"></td> <!-- Spacer column -->
        </tr>
      </table>
    </section>

    <section>
      <br><br>
      <table border="0" width="100%">
        <tr>
          <td width="25%"></td> <!-- Spacer column -->
          <td>
          <table border="1" width="100%">
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>ServiceType</th>
                <th>Address</th>
                <th>Availability</th>
                <th>Contact</th>
            </tr>
            <?php for ($i = 0; $i < count($customers); $i++) { ?>
            <tr>
                <td><?php echo $customers[$i]['name']; ?></td>
                <td><?php echo $customers[$i]['age']; ?></td>
                <td><?php echo $customers[$i]['gender']; ?></td>
                <td><?php echo $customers[$i]['serviceType']; ?></td>
                <td><?php echo $customers[$i]['address']; ?></td>
                <td><?php echo $customers[$i]['availability']; ?></td>
                <td><a href="tel:<?php echo $customers[$i]['mobileNumber']; ?>"><?php echo $customers[$i]['mobileNumber']; ?></a></td>
            </tr>
            <?php } ?>
        </table>
          </td>
          <td width="25%"></td> <!-- Spacer column -->
        </tr>
      </table>
    </section>
</body>
</html>

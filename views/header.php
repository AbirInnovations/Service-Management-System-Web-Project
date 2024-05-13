<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="../css/mystyle.css?v=1.1">
</head>
<body>
    <section>
        <table border="0" width="100%">
            <tr>
                <td align="center">
                    <!-- Link to request a service -->
                    <a href="requestService.php" class="button-oval">Request Service To Admin</a>
                    &nbsp; <!-- Non-breaking spaces for spacing between links -->
                    <!-- Link to find a customer -->
                    <a href="findCustomer.php" class="button-oval">Find Customer</a>
                    &nbsp;&nbsp;
                    <a href="home.php" class="button-oval">Home</a>
                    &nbsp;&nbsp;
                    <!-- Conditional display based on cookie presence -->
                    <?php if (!isset($_COOKIE['flag'])) { ?>
                        <!-- Links for users not logged in -->
                        <a href="login.php" class="button-oval">Login</a>
                        &nbsp;&nbsp;
                        <a href="registration.php" class="button-oval">Registration</a>
                    <?php } else { ?>
                        <!-- Links for logged-in users -->
                        <a href="dashboard.php" class="button-oval">Dashboard</a>
                        &nbsp;&nbsp;
                        <a href="profile.php" class="button-oval">Profile</a>
                        &nbsp;&nbsp;
                        <a href="../controllers/logout.php" class="button-logout">Logout</a>
                    <?php } ?>
                </td>
            </tr>
        </table>
    </section>
</body>
</html>


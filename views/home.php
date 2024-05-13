<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Login</title>
    <link rel="stylesheet" href="../css/mystyle.css?v=1.1">
    <link rel="stylesheet" href="../css/slideshow.css"> <!-- Link to the slideshow styles -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <section id="slideshow-section">
        <!-- Slideshow container -->
        <div id="slideshow-container">
            <div class="slide fade">
                <img src="/Midproject/Ui/pic1.jpg" alt="Description of Image 1" style="width:100%">
            </div>
            <div class="slide fade">
                <img src="/Midproject/Ui/pic2.jpg" alt="Description of Image 2" style="width:100%">
            </div>
            <div class="slide fade">
                <img src="/Midproject/Ui/pic3.jpg" alt="Description of Image 3" style="width:100%">
            </div>
            <a class="prev">&#10094;</a>
            <a class="next">&#10095;</a>
        </div>
    </section>
    <center> <!-- Use center tag here -->
        <section>
            <img src="/Midproject/Ui/manager.png" alt="Login Cartoon" style="width: 200px; height: auto; margin-bottom: 20px;">
            <h1>MANAGER</h1>
            <p>SERVICE PROVIDING SYSTEM</p>
            <button onclick="location.href='login.php';" class="login-button">Login</button>
            <button onclick="location.href='registration.php';" class="register-button">Register</button>
        </section>
    </center>
    <script src="../js/slideshow.js"></script> <!-- Link to the jQuery script for the slideshow -->
</body>
</html>

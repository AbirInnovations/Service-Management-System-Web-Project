<?php
require_once '../controllers/sessionCheck.php';  
require_once '../models/userModel.php';          
require_once '../models/db.php';                 
$user = profile();  // user data

$errMsg = "";  

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["profilePicture"]["name"])) {
    $name = $_COOKIE['user'];  // Retrieves the current user's name from a cookie.
    $imageName = $_FILES["profilePicture"]["name"];  
    $imageSize = $_FILES["profilePicture"]["size"];  
    $tmpName = $_FILES["profilePicture"]["tmp_name"];  
    $validImageExtension = ['jpg', 'jpeg', 'png'];  
    $imageExtension = explode('.', $imageName);  // Splits the filename to extract the extension.
    $imageExtension = strtolower(end($imageExtension));  // Converts extension to lowercase for comparison.

    // Validates the file extension.
    if (!in_array($imageExtension, $validImageExtension)) {
        $errMsg = "Invalid image extension!";
    } elseif ($imageSize > 5000000) {  // Check if the file size exceeds 5MB.
        $errMsg = "File is too large!";
    } else {
        
        $newImageName = "../uploads/" . $name . " - " . date("Y.m.d") . " - " . date("h.i.sa") . '.' . $imageExtension;
        $con = getConnection(); 
        $sql = "UPDATE users SET profilePicture = '$newImageName' WHERE username = '$name'";
        $con->query($sql);  
        move_uploaded_file($tmpName, $newImageName); //function
        $con->close();  
        header('Location: changeProfilePicture.php');  
        exit();  
    }
}
?>

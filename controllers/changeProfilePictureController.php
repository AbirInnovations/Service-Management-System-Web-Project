<?php
require_once '../controllers/sessionCheck.php';
require_once '../models/userModel.php';
require_once '../models/db.php';

$user = profile(); // Assume this function fetches user data
$errMsg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["profilePicture"]["name"])) {
    $name = $_COOKIE['user'];
    $imageName = $_FILES["profilePicture"]["name"];
    $imageSize = $_FILES["profilePicture"]["size"];
    $tmpName = $_FILES["profilePicture"]["tmp_name"];
    $validImageExtension = ['jpg', 'jpeg', 'png'];
    $imageExtension = explode('.', $imageName);
    $imageExtension = strtolower(end($imageExtension));

    if (!in_array($imageExtension, $validImageExtension)) {
        $errMsg = "Invalid image extension!";
    } elseif ($imageSize > 5000000) {
        $errMsg = "File is too large!";
    } else {
        $newImageName = "../uploads/" . $name . " - " . date("Y.m.d") . " - " . date("h.i.sa") . '.' . $imageExtension;
        $con = getConnection();
        $sql = "UPDATE users SET profilePicture = '$newImageName' WHERE username = '$name'";
        $con->query($sql);
        move_uploaded_file($tmpName, $newImageName);
        $con->close();
        header('Location: changeProfilePicture.php');
        exit();
    }
}
?>

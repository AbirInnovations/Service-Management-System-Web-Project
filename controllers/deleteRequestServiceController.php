<?php

include_once '../models/db.php';

// Check if an ID is provided in the URL query string
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Convert ID to integer to prevent SQL Injection

    // Establish a database connection
    $con = getConnection();

    // Prepare a SQL statement for deleting a specific record based on the ID
    $sql = "DELETE FROM requestService WHERE id = $id";

    // Execute the SQL statement
    if ($con->query($sql)) {
        // If successful, redirect to the 'requestService.php' page
        header('Location: ../views/requestService.php');
        exit(); // Ensure script termination
    } else {
        // If the deletion fails, display an error message
        echo 'Deletion failed!';
    }

    // Close the connection
    $con->close();
}
?>

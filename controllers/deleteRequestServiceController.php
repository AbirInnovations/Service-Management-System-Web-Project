<?php

include_once '../models/db.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Convert ID to integer to prevent SQL Injection

   
    $con = getConnection();

    $sql = "DELETE FROM requestService WHERE id = $id";


    if ($con->query($sql)) {
    
        header('Location: ../views/requestService.php');
        exit(); 
    } else {
        
        echo 'Deletion failed!';
    }


    $con->close();
}
?>

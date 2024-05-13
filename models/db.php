<?php

function getConnection(){   

    $dbhost = 'localhost';
 
    $dbname = 'service_management';
  
    $dbuser = 'root';
   
    $dbpass = '';

    $con = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    return $con;
}
?>

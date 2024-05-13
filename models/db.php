<?php
// Defines a function to establish a database connection using object-oriented style
function getConnection(){   
    // Database host address
    $dbhost = 'localhost';
    // Database name
    $dbname = 'service_management';
    // Database user
    $dbuser = 'root';
    // Database password (empty for local environments by default)
    $dbpass = '';

    // Attempts to establish a connection to the MySQL database using the mysqli extension
    $con = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

    // Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    // Returns the connection object
    return $con;
}
?>

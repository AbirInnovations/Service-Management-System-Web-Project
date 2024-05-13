<?php
require_once 'db.php'; 

function fetchServices() {
    $conn = getConnection();
    $query = "SELECT service_type, units_available FROM services";
    $result = $conn->query($query);

    $services = [];
    while ($row = $result->fetch_assoc()) {
        $services[] = $row;
    }
    $conn->close();
    return $services;
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    echo json_encode(fetchServices()); //encodes the returned array as a JSON string
}
?>

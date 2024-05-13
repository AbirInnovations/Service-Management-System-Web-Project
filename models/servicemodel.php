<?php
require_once 'db.php'; // Assuming your db.php is set up correctly

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
    echo json_encode(fetchServices());
}
?>

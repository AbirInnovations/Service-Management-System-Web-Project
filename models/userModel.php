<?php

require_once('db.php');

// Function to register a new user
function registration($username, $password, $name, $address, $email, $mobileNumber) {
    $con = getConnection();
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $con->query($sql);

    if ($result->num_rows == 0) {
        $sql = "INSERT INTO users (username, password, name, address, email, mobileNumber) VALUES ('$username', '$password', '$name', '$address', '$email', '$mobileNumber')";
        if ($con->query($sql) === TRUE) {
            header('Location: ../views/login.php');
        } else {
            echo 'Error: ' . $con->error;
        }
    } else {
        echo 'Username already exists!';
    }
    $con->close();
}

// Function to log in a user

function login($username, $password) {
    $con = getConnection();
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $con->query($sql);
    $con->close();
    return $result->num_rows == 1;
}

// Function to find all customers
function findAllCustomers() {
    $con = getConnection();
    $sql = "SELECT * FROM customers";
    $customers = [];
    if ($result = $con->query($sql)) {
        while ($customer = $result->fetch_assoc()) {
            $customers[] = $customer;
        }
    }
    return $customers;
}

// Function to find customers based on service type and availability
function findCustomer($serviceType, $availability) {
    $con = getConnection();
    $sql = "SELECT * FROM customers WHERE serviceType='$serviceType' AND availability='$availability'";
    $result = $con->query($sql);
    $customers = [];
    if ($result) {
        while ($customer = $result->fetch_assoc()) {
            $customers[] = $customer;
        }
    }
    $con->close();
    return $customers;
}

// Function to get the profile of the logged-in user
function profile() {
    $con = getConnection();
    $username = $_COOKIE['user'];  
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $con->query($sql);
    $profile = [];
    if ($result) {
        while ($user = $result->fetch_assoc()) {
            $profile[] = $user;
        }
    }
    $con->close();
    return $profile;
}
// Function to update the profile information
function profileUpdateModel($name, $address, $email, $mobileNumber) {
    $username = $_COOKIE['user']; 
    $con = getConnection();
    $sql = "UPDATE users SET name = '$name', address = '$address', email = '$email', mobileNumber = '$mobileNumber' WHERE username = '$username'";
    if ($con->query($sql) === TRUE) {
        header('Location: ../views/profile.php');
    } else {
        echo "Error updating record: " . $con->error;
    }
    $con->close();
}

// Function to change the password of the logged-in user
function changePassword($oldPassword, $newPassword) {
    $username = $_COOKIE['user'];
    $con = getConnection();
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$oldPassword'";
    $result = $con->query($sql);
    if ($result->num_rows == 1) {
        $sqlUpdate = "UPDATE users SET password='$newPassword' WHERE username='$username'";
        if ($con->query($sqlUpdate) === TRUE) {
            return true;
        } else {
            echo "Error updating password: " . $con->error;
            return false;
        }
    } else {
        return false;
    }
    $con->close();
}


// Function to add a new service request

function addRequestService($serviceType, $location, $date, $mobileNumber, $comment, $owner) {
    $con = getConnection();
    $sql = "INSERT INTO requestService (serviceType, location, date, mobileNumber, comment, owner) VALUES ('$serviceType', '$location', '$date', '$mobileNumber', '$comment', '$owner')";
    if ($con->query($sql) === TRUE) {
        return true;
    } else {
        echo "Error adding request: " . $con->error;
        return false;
    }
    $con->close();
}

// Function to view all service requests or those belonging to a specific user

function viewRequestService($username) {
    $con = getConnection(); 
    $sql = "SELECT * FROM requestService WHERE owner = '$username' ORDER BY id DESC";
    $result = $con->query($sql);
    $requestService = [];
    while ($request = $result->fetch_assoc()) {
        $requestService[] = $request;
    }
    $con->close();
    return $requestService;
}



// Function to edit a specific service request by ID
function editRequestService($id, $serviceType, $location, $date, $mobileNumber, $comment) {
    $con = getConnection();
   
    $id = (int) $id; //ensure int id

    $sql = "UPDATE requestService SET 
            serviceType = '{$serviceType}', 
            location = '{$location}', 
            date = '{$date}', 
            mobileNumber = '{$mobileNumber}', 
            comment = '{$comment}' 
            WHERE id = {$id}";

    if ($con->query($sql)) {
        header('Location: ../views/requestService.php');
        exit(); 
    } else {
        echo "Error updating record: " . $con->error; 
    $con->close();
}
}


function viewRequestServiceForId($id) {
    $con = getConnection();
    $id = intval($id); // id int
    $sql = "SELECT * FROM requestService WHERE id = $id";
    $result = $con->query($sql);
    $serviceRequest = [];
    if ($result) {
        while ($request = $result->fetch_assoc()) {
            $serviceRequest[] = $request;
        }
    } else {
        echo "Error retrieving record: " . $con->error;
    }
    $con->close();
    return $serviceRequest; 
}

?>

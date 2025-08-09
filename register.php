<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "parking customer database"; // Adjust if necessary, no spaces

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data
$vehicleNumber = $_POST['vehicleNumber'];
$ownerName = $_POST['ownerName'];
$contactNumber = $_POST['contactNumber'];

// Check if the vehicle is already registered
$checkQuery = $conn->prepare("SELECT * FROM registrations WHERE vehicle_number = ?");
$checkQuery->bind_param("s", $vehicleNumber);
$checkQuery->execute();
$checkQuery->store_result();

if ($checkQuery->num_rows > 0) {
    // Vehicle is already registered
    echo json_encode([
        'success' => false,
        'isAlreadyRegistered' => true,
        'message' => 'This vehicle is already registered. Please login to continue.'
    ]);
} else {
    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO registrations (vehicle_number, owner_name, contact_number) VALUES (?, ?, ?)");
    if (!$stmt) {
        echo json_encode([
            'success' => false,
            'error' => $conn->error
        ]);
        exit();
    }

    $stmt->bind_param("sss", $vehicleNumber, $ownerName, $contactNumber);

    // Execute the statement
    if ($stmt->execute()) {
        echo json_encode([
            'success' => true,
            'isAlreadyRegistered' => false,
            'message' => 'Registration successful.'
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'error' => $stmt->error
        ]);
    }

    $stmt->close();
}

$checkQuery->close();
$conn->close();
?>

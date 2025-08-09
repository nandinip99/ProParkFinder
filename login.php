<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "parking customer database"; // Ensure this matches your actual database name

// Create a new MySQLi connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Database connection failed: ' . $conn->connect_error]);
    exit();
}

// Collect form data
$vehicleNumber = isset($_POST['vehicleNumber']) ? $_POST['vehicleNumber'] : '';
$ownerName = isset($_POST['ownerName']) ? $_POST['ownerName'] : '';

// Validate form data
if (empty($vehicleNumber) || empty($ownerName)) {
    echo json_encode(['success' => false, 'message' => 'All fields are required.']);
    exit();
}

// Prepare and execute SQL query
$query = $conn->prepare("SELECT owner_name, vehicle_number FROM registrations WHERE vehicle_number = ? AND owner_name = ?");
if ($query === false) {
    echo json_encode(['success' => false, 'message' => 'Query preparation failed: ' . $conn->error]);
    exit();
}

$query->bind_param("ss", $vehicleNumber, $ownerName);
$query->execute();
$query->store_result();

$response = [];

if ($query->num_rows > 0) {
    $query->bind_result($name, $vNumber);
    $query->fetch();

    // Set session variable
    $_SESSION['owner_name'] = $name;

    $response = ['success' => true, 'ownerName' => $name, 'vehicleNumber' => $vNumber];
} else {
    $response = ['success' => false, 'message' => 'Invalid credentials.'];
}

// Close connections
$query->close();
$conn->close();

// Send JSON response
echo json_encode($response);
?>

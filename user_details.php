<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'User not logged in']);
    exit();
}

// Fetch user details from the database
$user_id = $_SESSION['user_id'];

// Example database connection (adjust with your actual details)
$mysqli = new mysqli('localhost', 'username', 'password', 'database');

if ($mysqli->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Database connection failed']);
    exit();
}

// Prepare and execute the query
$query = $mysqli->prepare('SELECT owner_name, vehicle_number FROM users WHERE id = ?');
$query->bind_param('i', $user_id);
$query->execute();
$query->bind_result($owner_name, $vehicle_number);
$query->fetch();
$query->close();
$mysqli->close();

if ($owner_name && $vehicle_number) {
    echo json_encode([
        'success' => true,
        'ownerName' => $owner_name,
        'vehicleNumber' => $vehicle_number
    ]);
} else {
    echo json_encode(['success' => false, 'message' => 'User details not found']);
}
?>

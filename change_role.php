<?php
// Database connection details
$servername = "localhost";
$username = "id21990397_root";
$password = "@123456789CINq";
$dbname = "id21990397_rename";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_POST['id'];
    $newRole = $_POST['role'];

    // Update user role in the database
    $sql = "UPDATE users SET role = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $newRole, $userId);

    if ($stmt->execute()) {
        echo "Role updated successfully!";
    } else {
        echo "Error updating role: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

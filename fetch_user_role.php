<?php
// Database connection details
$servername = "localhost";
$username = "id21990397_root"; // Change this to your database username
$password = "@123456789CINq"; // Change this to your database password
$dbname = "id21990397_rename"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the session is active and username is set
session_start();
if (!isset($_SESSION['username'])) {
    die("Session not active or username not set.");
}

// Prepare SQL statement to fetch user role
$stmt = $conn->prepare("SELECT role FROM users WHERE username = ?");
$stmt->bind_param("s", $_SESSION['username']);

// Execute the statement
$stmt->execute();

// Bind result variables
$stmt->bind_result($userRole);

// Fetch the result
$stmt->fetch();

// Close statement
$stmt->close();

// Close connection
$conn->close();

// Return the user's role as the AJAX response
echo $userRole;
?>

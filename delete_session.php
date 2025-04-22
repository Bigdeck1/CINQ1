<?php
// Start output buffering
ob_start();

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

// Check if session_id is provided
if (!isset($_GET['session_id']) || empty($_GET['session_id'])) {
  die("Session ID not provided");
}

$session_id = $_GET['session_id'];

// Delete the session from the users table
$sql = "UPDATE users SET session_id = NULL WHERE session_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $session_id);

if ($stmt->execute()) {
  // Do not echo here, store the message in a variable instead
  $message = "Session deleted successfully.";
} else {
  // Store error message in a variable
  $message = "Error deleting session: " . $conn->error;
}

$stmt->close();
$conn->close();

// Redirect back to the sessions page
header("Location: dashboard.php#sessions");
exit;

// End output buffering and send output
ob_end_flush();
?>

<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rename"; // Replace 'rename' with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set UTF-8 encoding
mysqli_set_charset($conn, "utf8");

?>

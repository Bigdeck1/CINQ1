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

// Fetch user emails from the database
$sql = "SELECT email FROM users"; // Replace 'users' with your actual table name
$result = $conn->query($sql);

if ($result === false) {
    die("Error executing the query: " . $conn->error);
}

$emails = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $emails[] = $row['email'];
    }
} else {
    echo "No emails found in the database.";
}

// Close connection
$conn->close();

// Print the emails
foreach ($emails as $email) {
    echo $email . "<br>";
}
?>
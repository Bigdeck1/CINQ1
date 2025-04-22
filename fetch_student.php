<?php
// Database connection details
$servername = "localhost";
$username = "id21990397_root";
$password = "@123456789CINq";
$dbname = "id21990397_rename";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL to fetch student data
$sql = "SELECT * FROM students";
$result = $conn->query($sql);

$students = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $students[] = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'email' => $row['email'],
            'class' => $row['class']
        );
    }
}

// Close connection
$conn->close();

// Send JSON response
header('Content-Type: application/json');
echo json_encode($students);
?>
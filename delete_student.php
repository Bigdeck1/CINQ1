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

// Check if the ID parameter is set and not empty
if (isset($_POST['id']) && !empty($_POST['id'])) {
    // Sanitize the ID parameter to prevent SQL injection
    $studentId = $conn->real_escape_string($_POST['id']);

    // Prepare and execute the SQL statement to delete the student
    $sql = "DELETE FROM g12st1a WHERE id = '$studentId'";
    if ($conn->query($sql) === TRUE) {
        // Deletion successful
        echo "Student deleted successfully!";
    } else {
        // Error in deletion
        echo "Error deleting student: " . $conn->error;
    }
} else {
    // ID parameter not set or empty
    echo "Invalid request!";
}

// Close the database connection
$conn->close();
?>

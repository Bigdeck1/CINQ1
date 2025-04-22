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

// Get form data
$user_id = $_POST['student']; // Assuming 'student' contains the user_id
$subject = $_POST['subject'];
$first_grading = $_POST['first_grading'];
$second_grading = isset($_POST['second_grading']) ? $_POST['second_grading'] : null;

// SQL query to check if subject already exists for the user
$checkSql = "SELECT * FROM grades WHERE user_id = '$user_id' AND subject = '$subject'";
$checkResult = $conn->query($checkSql);

if ($checkResult && $checkResult->num_rows > 0) {
    // Subject already exists, show notice
    echo "<script>alert('Cannot add grades. Subject already exists for the selected student.');</script>";
    // Redirect back to tcgrades.php after 2 seconds
    echo '<script>setTimeout(function(){ window.location.href = "tcgrades.php"; }, 2000);</script>';
} else {
    // Subject does not exist, proceed with insertion
    // Insert data into the grades table
    if ($second_grading !== null) {
        // Both first and second grading provided
        $sql = "INSERT INTO grades (user_id, subject, first_grading, second_grading) VALUES ('$user_id', '$subject', '$first_grading', '$second_grading')";
    } else {
        // Only first grading provided
        $sql = "INSERT INTO grades (user_id, subject, first_grading) VALUES ('$user_id', '$subject', '$first_grading')";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Grades inserted successfully!"; // Display success message
        // Redirect back to tcgrades.php after 0.5 seconds
        echo '<script>setTimeout(function(){ window.location.href = "tcgrades.php"; }, 500);</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

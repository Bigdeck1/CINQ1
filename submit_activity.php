<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection details
     $servername = "localhost";
    $username = "id21990397_root";
    $password = "@123456789CINq";
    $dbname = "id21990397_rename";


    // Establishing a connection to the database
    $conn = mysqli_connect($servername, $username, $password, $dbname);

        // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Escape user inputs to prevent SQL injection
    $assignmentTitle = mysqli_real_escape_string($conn, $_POST['assignmentTitle']);
    $assignmentDescription = mysqli_real_escape_string($conn, $_POST['assignmentDescription']);
    $dueDate = mysqli_real_escape_string($conn, $_POST['dueDate']);

    // SQL query to insert data into the database
                $sql = "INSERT INTO activities (title, description, due_date) VALUES ('$assignmentTitle', '$assignmentDescription', '$dueDate')";

                // Execute the query
    if (mysqli_query($conn, $sql)) {
        // Close database connection
        mysqli_close($conn);
        // Redirect back to TC.php
        header("Location: TC.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close database connection
    mysqli_close($conn);
}

// Fetch and display activities
include_once 'fetch_activities.php'; // Include PHP script to fetch activities
?>

    
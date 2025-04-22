<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection details
$servername = "localhost";
$username = "id21990397_root";
$password = "@123456789CINq";
$dbname = "id21990397_rename";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are provided
    if (isset($_POST['class_id'], $_POST['day'], $_POST['start_time'], $_POST['end_time'], $_POST['subject'])) {
        // Extract form data
        $class_id = $_POST['class_id'];
        $day = $_POST['day'];
        $start_time = $_POST['start_time'];
        $end_time = $_POST['end_time'];
        $subject = $_POST['subject'];

        // Validate class_id to prevent SQL injection
        if (!is_numeric($class_id)) {
            $error_message = "Invalid class ID.";
        } else {
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Prepare SQL statement to insert schedule
            $insert_sql = "INSERT INTO schedules (class_id, day, start_time, end_time, subject) VALUES (?, ?, ?, ?, ?)";
            $insert_stmt = $conn->prepare($insert_sql);

            // Bind parameters and execute the statement
            $insert_stmt->bind_param("issss", $class_id, $day, $start_time, $end_time, $subject);
            if ($insert_stmt->execute()) {
                // Display success message
                echo "<p>Schedule added successfully.</p>";
            } else {
                // Display error message
                echo "<p>Error: " . $insert_stmt->error . "</p>";
            }

            // Close statement and connection
            $insert_stmt->close();
            $conn->close();
        }
    } else {
        // Display error message if required fields are missing
        echo "<p>All fields are required.</p>";
    }
}
?>

<!-- Schedule Container -->
<div class="schedules-container">
    <h3>Schedule Container</h3>
    <?php
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to retrieve schedules
    $schedule_sql = "SELECT * FROM schedules WHERE class_id = ?";
    $schedule_stmt = $conn->prepare($schedule_sql);
    $schedule_stmt->bind_param("i", $class_id);
    $schedule_stmt->execute();
    $result = $schedule_stmt->get_result();

    // Check if there are schedules
    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<p>Day: " . $row["day"] . " - Time: " . $row["start_time"] . " to " . $row["end_time"] . " - Subject: " . $row["subject"] . "</p>";
        }
    } else {
        echo "No schedules available.";
    }

    // Close statement and connection
    $schedule_stmt->close();
    $conn->close();
    ?>
</div>
<!-- Closing schedules-container div -->

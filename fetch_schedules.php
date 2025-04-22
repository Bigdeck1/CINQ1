<?php
// Include database connection details
include_once 'db_connect.php';

// Check if class ID is provided
if (isset($_GET['class_id'])) {
    $class_id = $_GET['class_id'];

    // Prepare SQL statement to fetch schedules for the class
    $schedule_sql = "SELECT * FROM schedules WHERE class_id = ?";
    $schedule_stmt = $conn->prepare($schedule_sql);
    $schedule_stmt->bind_param("i", $class_id);
    $schedule_stmt->execute();
    $schedule_result = $schedule_stmt->get_result();

    // Check if schedules are found
    if ($schedule_result && $schedule_result->num_rows > 0) {
        // Initialize schedules variable to store HTML markup
        $schedules = '';

        // Loop through each schedule and generate HTML markup
        while ($schedule_row = $schedule_result->fetch_assoc()) {
            $schedules .= "<div class='schedule-item'>";
            $schedules .= "<h3>Schedule</h3>";
            $schedules .= "<p>Day: " . $schedule_row['day'] . "</p>";
            $schedules .= "<p>Start Time: " . $schedule_row['start_time'] . "</p>";
            $schedules .= "<p>End Time: " . $schedule_row['end_time'] . "</p>";
            $schedules .= "<p>Subject: " . $schedule_row['subject'] . "</p>";
            $schedules .= "</div>";
        }

        // Output schedules HTML markup
        echo $schedules;
    } else {
        // Output message if no schedules found
        echo "<p>No schedules found for this class.</p>";
    }

    // Close statement
    $schedule_stmt->close();
} else {
    // Output error message if class ID is not provided
    echo "Class ID is missing.";
}

// Close connection
$conn->close();
?>

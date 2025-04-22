<?php
session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if activities are selected
    if(isset($_POST['activity'])) {
        $completedActivities = $_POST['activity'];

        // Connect to the database
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

        // Loop through selected activities and remove them
        foreach($completedActivities as $activityId) {
            $sql = "DELETE FROM activities WHERE id = $activityId";
            if ($conn->query($sql) !== TRUE) {
                echo "Error deleting activity: " . $conn->error;
            }
        }

        // Close database connection
        $conn->close();

        // Redirect back to the activity form
        header("Location: activity.php");
        exit();
    } else {
        echo "No activities selected.";
    }
} else {
    echo "Invalid request.";
}
?>

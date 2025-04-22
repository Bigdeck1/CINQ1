<?php
    ob_start(); // Start output buffering

    $servername = "localhost";
    $username = "id21990397_root"; 
    $password = "@123456789CINq";
    $dbname = "id21990397_rename"; 

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['announcement_id'])) {
        $announcement_id = $_POST['announcement_id'];

        $delete_sql = "DELETE FROM announcements WHERE id = ?";
        $delete_stmt = $conn->prepare($delete_sql);
        $delete_stmt->bind_param("i", $announcement_id);

        if ($delete_stmt->execute()) {
            // Redirect back to the page where announcements are displayed
            header("Location: view_class.php?class_id=$class_id");
            exit();
        } else {
            // Display error message if deletion fails
            echo "Error deleting announcement: " . $delete_stmt->error;
        }

        $delete_stmt->close();
    }

    $conn->close();

    ob_end_flush(); // Flush the output buffer and send the output to the browser
?>

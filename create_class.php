<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection details
    $servername = "localhost";
    $username = "id21990397_root";
    $password = "@123456789CINq";
    $dbname = "id21990397_rename";

    // Get the class name and students' emails from the form
    $className = $_POST["className"];
    $studentsEmails = $_POST["studentsEmails"];

    // Check if the class name and students' emails are provided
    if (!empty($className) && !empty($studentsEmails)) {
        // Establish a connection to the database
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Insert the new class into the database
        $sql = "INSERT INTO classes (class_name, students_emails) VALUES ('$className', '$studentsEmails')";

        if ($conn->query($sql) === TRUE) {
            // Get the ID of the newly inserted class
            $class_id = $conn->insert_id;
            echo "Class created successfully! Class ID: " . $class_id;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close the database connection
        $conn->close();
    } else {
        echo "Class name and students' emails are required.";
    }
}
?>

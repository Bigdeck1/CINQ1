<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection details
    $servername = "localhost";
    $username = "id21990397_root";
    $password = "@123456789CINq";
    $dbname = "id21990397_rename";
}
// Check if form is submitted for adding/editing a student
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action == 'addStudent') {
        // Extract form data for adding a student
        $name = $_POST['studentName'];
        $class = $_POST['studentClass'];

        // Insert student into the database
        $insert_sql = "INSERT INTO students (name, class) VALUES (?, ?)";
        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bind_param("ss", $name, $class);

        if ($insert_stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => $insert_stmt->error]);
        }

        $insert_stmt->close();
    } elseif ($action == 'editStudent') {
        // Extract form data for editing a student
        $id = $_POST['editStudentId'];
        $name = $_POST['editStudentName'];
        $class = $_POST['editStudentClass'];

        // Update student in the database
        $update_sql = "UPDATE students SET name = ?, class = ? WHERE id = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("ssi", $name, $class, $id);

        if ($update_stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => $update_stmt->error]);
        }

        $update_stmt->close();
    } elseif ($action == 'addTeacher') {
        // Extract form data for adding a teacher
        $name = $_POST['teacherName'];
        $subject = $_POST['teacherSubject'];

        // Insert teacher into the database
        $insert_sql = "INSERT INTO teachers (name, subject) VALUES (?, ?)";
        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bind_param("ss", $name, $subject);

        if ($insert_stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => $insert_stmt->error]);
        }

        $insert_stmt->close();
    } elseif ($action == 'editTeacher') {
        // Extract form data for editing a teacher
        $id = $_POST['editTeacherId'];
        $name = $_POST['editTeacherName'];
        $subject = $_POST['editTeacherSubject'];

        // Update teacher in the database
        $update_sql = "UPDATE teachers SET name = ?, subject = ? WHERE id = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("ssi", $name, $subject, $id);

        if ($update_stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => $update_stmt->error]);
        }

        $update_stmt->close();
    }
}

// Load students data
$sql_students = "SELECT * FROM students";
$result_students = $conn->query($sql_students);

// Load teachers data
$sql_teachers = "SELECT * FROM teachers";
$result_teachers = $conn->query($sql_teachers);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Admin Panel</title>
    <!-- Include Bootstrap for styling and jQuery for AJAX -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        /* Add your CSS styles here */
    </style>
</head>
<body>
    <!-- Your HTML content goes here -->

    <!-- JavaScript code for interacting with the database using AJAX -->
    <script>
        $(document).ready(function() {
            // JavaScript code for handling AJAX requests and DOM manipulation
            // Add, edit, load functionalities using AJAX here
        });
    </script>
</body>
</html>

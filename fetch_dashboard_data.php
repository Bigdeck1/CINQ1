<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection details
    $servername = "localhost";
    $username = "id21990397_root";
    $password = "@123456789CINq";
    $dbname = "id21990397_rename";

    try {
        // Create a PDO connection
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

        // Set PDO to throw exceptions on error
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Fetch total number of students
        $stmt = $pdo->prepare('SELECT COUNT(*) AS totalStudents FROM students');
        $stmt->execute();
        $totalStudents = $stmt->fetch(PDO::FETCH_ASSOC)['totalStudents'];

        // Fetch total number of teachers
        $stmt = $pdo->prepare('SELECT COUNT(*) AS totalTeachers FROM teachers');
        $stmt->execute();
        $totalTeachers = $stmt->fetch(PDO::FETCH_ASSOC)['totalTeachers'];

        // Fetch total number of courses
        $stmt = $pdo->prepare('SELECT COUNT(*) AS totalCourses FROM courses');
        $stmt->execute();
        $totalCourses = $stmt->fetch(PDO::FETCH_ASSOC)['totalCourses'];

        // Return JSON response with dashboard data
        echo json_encode(array(
            'totalStudents' => $totalStudents,
            'totalTeachers' => $totalTeachers,
            'totalCourses' => $totalCourses
        ));
    } catch (PDOException $e) {
        // Handle database connection or query errors
        echo json_encode(array('error' => 'Database error: ' . $e->getMessage()));
    }
}
?>

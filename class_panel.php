<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class Panel</title>
    <!-- Add your CSS and Bootstrap links here -->
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <a href="attendance.php">Attendance</a>
        <a href="activities.php">Activities</a>
        <a href="grades.php">Grades</a>
    </div>

    <!-- Main Content Area -->
    <div class="main-content">
        <?php
        // Fetch and display class details here based on the URL parameter
        $className = $_GET['class_name'];
        echo "<h2>Class: $className</h2>";
        // Add more class details here
        ?>
    </div>
</body>
</html>

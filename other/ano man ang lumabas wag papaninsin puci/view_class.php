<?php
// Database connection details
$servername = "localhost";
$username = "id21990397_root";
$password = "@123456789CINq";
$dbname = "id21990397_rename";

$error_message = "";

// Check if $class_id is set and not empty, otherwise initialize it to an empty string
$class_id = isset($_GET['class_id']) ? $_GET['class_id'] : '';

// Check if form is submitted for adding schedules
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['class_id'], $_POST['day'], $_POST['start_time'], $_POST['end_time'], $_POST['subject'])) {
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

        // Prepare SQL statement to check if the class ID exists
        $check_sql = "SELECT id FROM classes WHERE id = ?";
        $check_stmt = $conn->prepare($check_sql);
        $check_stmt->bind_param("i", $class_id);
        $check_stmt->execute();
        $check_stmt->store_result();

        // If no rows are returned, the class ID is invalid
        if ($check_stmt->num_rows === 0) {
            $error_message = "Invalid class ID.";
        } else {
            // Prepare SQL statement to insert schedule
            $insert_sql = "INSERT INTO schedules (class_id, day, start_time, end_time, subject) VALUES (?, ?, ?, ?, ?)";
            $insert_stmt = $conn->prepare($insert_sql);

            // Bind parameters and execute the statement
            $insert_stmt->bind_param("issss", $class_id, $day, $start_time, $end_time, $subject);
            if ($insert_stmt->execute()) {
                // Redirect to view_class.php with the class_id parameter
                header("Location: view_class.php?class_id=$class_id");
                exit();
            } else {
                // Display error message
                $error_message = "Error: " . $insert_stmt->error;
            }

            // Close statement
            $insert_stmt->close();
        }

        // Close connection
        $conn->close();
    }
}

// Check if form is submitted for adding announcements
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['announcement_content'])) {
    // Extract form data
    $announcement_content = $_POST['announcement_content'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to insert announcement
    $insert_announcement_sql = "INSERT INTO announcements (class_id, announcement_content) VALUES (?, ?)";
    $insert_announcement_stmt = $conn->prepare($insert_announcement_sql);

    // Bind parameters and execute the statement
    $insert_announcement_stmt->bind_param("is", $class_id, $announcement_content);
    if ($insert_announcement_stmt->execute()) {
        // Redirect to view_class.php with the class_id parameter
        header("Location: view_class.php?class_id=$class_id");
        exit();
    } else {
        // Display error message
        $error_message = "Error: " . $insert_announcement_stmt->error;
    }

    // Close statement
    $insert_announcement_stmt->close();

    // Close connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedules</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar {
            overflow: hidden;
            background: linear-gradient(to bottom, #007bff 0%, #87cefa 50%, #ffffff 100%);
        }

        .navbar a {
            float: left;
            display: block;
            color: #000;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        .navbar a:hover {
            background: #ddd;
            color: black;
        }

        .main-content {
            display: flex;
            justify-content: center;
            align-items: flex-start; /* Align items to the top */
            padding: 40px;
        }

        .container-left {
            flex: 1; /* Take up half of the available space */
            padding-right: 20px; /* Add some space between containers */
        }

        .container-right {
            flex: 2; /* Take up double the space of the left container */
            padding-left: 20px; /* Add some space between containers */
        }

        .announcements-container {
            padding: 20px;
            background-color: #f8f9fa; /* Light background color for the container */
            border-radius: 10px;
            max-width: 800px; /* Maximum width */
        }

        .announcements-container form {
            padding: 20px;
            background-color: #ffffff; /* White background for the form */
        }

        .announcements-container input {
            width: 100%;
            margin-bottom: 10px;
            padding: 5px;
            border-radius: 5px; /* Rounded corners for the input fields */
            border: 1px solid #ccc; /* Light border for the input fields */
            font-size: 1em; /* Relative font size for better accessibility */
        }

        .announcements-container button {
            cursor: pointer;
            width: 100%;
            padding: 10px;
            background-color: #3047dd;
            color: white;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease; /* Smooth transition for hover effect */
            font-size: 1em; /* Relative font size for better accessibility */
        }

        .announcements-container button:hover {
            background-color: #536391; /* Darker shade for hover effect */
        }

        .announcement-content {
            display: flex;
            justify-content: space-between;
        }

        .col-6 {
            padding: 20px;
            border-radius: 10px;
            transition: 0.3s;
        }

        .col-6:hover {
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="navbar">
    <a href="TC.php">HOME</a>
    <a href="view_class.php">CLASS ANNOUNCEMENTS</a>
    <a href="stem1astudent.php">STUDENTS</a>
    <a href="attendance.php">ATTENDANCE</a>
    <a href="stem1activities.php">ACTIVITIES</a>
    <a href="tcgrades.php">GRADE</a>
</div>

<!-- Main Content Area -->
<div class="main-content">
    <!-- Container on the right -->
    <div class="container-right">
        <!-- Announcements Container -->
        <div class="announcements-container">
            <!-- Form to add new announcement -->
            <form method="post" action="">
                <fieldset>
                    <legend>Announcements</legend>
                    <input type="hidden" name="class_id" value="<?php echo $class_id; ?>">
                    <label for="announcement_content">Announcement:</label>
                    <input type="text" name="announcement_content">
                    <button type="submit">Add Announcement</button>
                </fieldset>
            </form>
        </div>
    </div>

    <!-- Container on the left -->
    <div class="container-left">
        <!-- Your existing container content goes here -->
        <div class="col-6">
            <h2 class="text-center">Posted Announcements</h2>
            <?php
            // PHP code to fetch and display posted announcements from the database
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Prepare SQL statement to retrieve announcements
            $announcement_sql = "SELECT id, announcement_content FROM announcements WHERE class_id = ?";
            $announcement_stmt = $conn->prepare($announcement_sql);
            $announcement_stmt->bind_param("i", $class_id);
            $announcement_stmt->execute();
            $announcement_result = $announcement_stmt->get_result();

            // Check if there are announcements
            if ($announcement_result->num_rows > 0) {
                // Output data of each row
                while ($row = $announcement_result->fetch_assoc()) {
                    // Display announcement content and delete button
                    echo "<div class='alert alert-primary' role='alert'>";
                    echo "<div class='announcement-content'>";
                    echo $row["announcement_content"];
                    echo "<form method='post' action='delete_announcement.php' style='margin-left: auto;'>";
                    echo "<input type='hidden' name='announcement_id' value='" . $row["id"] . "'>";
                    echo "<button type='submit' class='btn btn-danger btn-sm'>Delete</button>";
                    echo "</form></div></div>";
                }
            } else {
                echo "<div class='alert alert-danger' role='alert'>No announcements available.</div>";
            }

            // Close statement and connection
            $announcement_stmt->close();
            $conn->close();
            ?>
        </div>
    </div>
</div>

</body>
</html>

<?php
// Start session
session_start();

// Include database connection details
include_once 'includes/db_connect.php';

$error_message = "";

// Check if $class_id is set and not empty, otherwise initialize it to an empty string
$class_id = isset($_GET['class_id']) ? $_GET['class_id'] : '';

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
        }
    } else {
        // Display error message if required fields are missing
        $error_message = "All fields are required.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags, title, and CSS links -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/loginform.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('zimage/cinq_backgorund2.jpg');
            margin: 0;
            padding: 0;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: #000;
        }

        .logo-text {
            color: #000;
            font-size: 24px;
            font-family: 'Michroma', sans-serif; /* Change the font-family here */
        }
        
        .bg-dark {
            background: linear-gradient(to bottom, #007bff 0%, #87cefa 50%, #ffffff 100%);
        }

        .container {
            margin-top: 100px;
            position: relative;
            z-index: 0;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            background: linear-gradient(to bottom, #007bff 0%, #87cefa 50%, #ffffff 100%);
        }

        .main-content {
            background-color: rgb(0 0 0 / 0%);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgb(0 0 0 / 0%);
        }
        
        .announcement-container {
            margin-top: 20px;
            position: relative;
            z-index: 1;
            padding: 20px;
            border-radius: 10px;
        }
        
        .announcement {
            background-color: #eee; /* Grey background for individual announcements */
            border: 1px solid #ccc; /* Grey border */
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
            position: relative;
            z-index: 1;
            animation: fade-in 1s ease;
        }
        
        .announcement h5 {
            color: #000000;
            font-size: 24px;
            margin-bottom: 10px;
        }

        .announcement p {
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 10px;
            color: #000;
        }

        .no-announcement {
            text-align: center;
            color: #000;
            font-style: italic;
        }

        .text-center {
            text-align: center;
        }

        /* Transparent Navbar */
        .navbar {
            background-color: #000;
        }
        
        .navbar-dark .navbar-nav .nav-link {
    color: rgb(0 0 0);
}

        .bg-dark {
            background-color: #4fa1f2 !important;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            width: 250px;
            background-color: #333;
            padding-top: 50px;
            transition: transform 0.3s ease;
            z-index: 1000;
            overflow-y: auto;
            transform: translateX(-250px);
        }

        .sidebar.show {
            transform: translateX(0);
        }

        .sidebar ul {
            list-style-type: none;
            padding-left: 20px;
        }

        .sidebar ul li {
            margin-bottom: 10px;
        }

        .sidebar ul li a {
            color: #000000;
            text-decoration: none;
        }

        .sidebar ul li a:hover {
            color: #f8f9fa;
        }

        /* Dropdown Menu */
        .dropdown-menu {
            background-color: #333;
            border: 1px solid #444;
        }

        .dropdown-menu .dropdown-item {
            color: #ffffff;
        }

        .dropdown-menu .dropdown-item:hover {
            background-color: #444;
        }

        .container {
            box-shadow: 0 0 10px white; 
            padding: 20px; 
            border-radius: 10px;
        }

        .card {
            margin-bottom: 15px;
        }

        .card-link {
            color: #007bff;
        }
        
        /* Custom Footer Style */
        .custom-footer {
    background: linear-gradient(to bottom, #ffffff 0%, #87cefa 50%, #007bff 100%);
    color: #000;
    padding: 20px;
    text-align: center;
    position: relative; /* Change from relative to fixed */
    left: 0;
    bottom: 0;
    width: 100%;
}

        
        .custom-footer p {
            margin-bottom: 10px;
        }
        
        .custom-footer .callus {
            margin-top: 20px;
        }
        
        .custom-footer h2 {
            font-size: 20px; 
        }
        
        .custom-footer ul {
            list-style-type: none;
            padding: 0; 
        }
        
        .custom-footer ul li {
            display: inline;
            margin-right: 10px; 
        }
        
        .custom-footer ul li a {
            color: #fff; 
            text-decoration: none;
            transition: color 0.3s; 
        }
        
        .custom-footer ul li a:hover {
            color: #f00; 
        }
    </style>
</head>
<body>  

   <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <h1 class="logo-text mr-auto">CINQ</h1>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Menu
                        </a>
                          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="homepage.php">Home</a>
                            <a class="dropdown-item" href="student.php">Student</a>
                            <a class="dropdown-item" href="grades.php">Grades</a>
                            <a class="dropdown-item" href="subjects.php">Classes</a>
                            <a class="dropdown-item" href="activity.php">To do</a>
                            <a class="dropdown-item" href="teacher_announcement.php">Teachers Announcements</a>
                            <a class="dropdown-item" href="organization.php">Organizations</a>
                            <a class="dropdown-item" href="login.php">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <!-- Main Content Area -->
                <div class="main-content">
                    <h1 class="text-center">Teacher's Announcements</h1>
                    <div class="announcement-container">
                        <?php 
                        // Fetch announcements from the database
                        $sql = "SELECT * FROM announcements ORDER BY created_at DESC";
                        $result = $conn->query($sql);

                        // Display announcements
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<div class="announcement">';
                                if(isset($row['announcement_title'])) {
                                    echo '<h3>' . $row['announcement_title'] . '</h3>';
                                }
                                if(isset($row['announcement_content'])) {
                                    echo '<p>' . $row['announcement_content'] . '</p>';
                                }
                                if(isset($row['created_at'])) {
                                    echo '<p class="announcement-date">Posted on: ' . $row['created_at'] . '</p>';
                                }
                                echo '</div>';
                            }
                        } else {
                            echo '<p class="no-announcement">No announcements available.</p>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div><br><br><br><br><br><br><br><br><br><br><br><br>
<footer class="custom-footer">
        <p>&copy; 2024 CINQ. All rights reserved.</p>
        <p>Contact: CINQ@gmail.com </p>
        <p>
            <i class="map marker alternate icon address-icon"></i>
            M.L QUEZON EXT. ANTIPOLO CITY
        </p>
    </footer>
  
 <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Your custom scripts -->
    <script>
        $(document).ready(function () {
            $('.navbar-toggler').on('click', function () {
                $('.sidebar').toggleClass('show');
            });
        });
    </script>
</body>
</html>

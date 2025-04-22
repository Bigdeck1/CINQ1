<?php
// Database connection details
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

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve subject from the form
    $subject = $_POST["subject"];
    
    // SQL query to check if subject already exists
    $checkSql = "SELECT * FROM grades WHERE subject = '$subject'";
    $checkResult = $conn->query($checkSql);
    
    if ($checkResult && $checkResult->num_rows > 0) {
        // Subject already exists, show warning
        echo "<script>alert('Subject already exists. Please choose a different subject.');</script>";
    } else {
        // Subject does not exist, proceed with insertion
        // Retrieve other form data
        $firstGrading = $_POST["first_grading"];
        $secondGrading = $_POST["second_grading"];
        
        // SQL query to insert new grade into database
        $insertSql = "INSERT INTO grades (subject, first_grading, second_grading) VALUES ('$subject', '$firstGrading', '$secondGrading')";
        
        if ($conn->query($insertSql) === TRUE) {
            // Grade inserted successfully
            echo "<script>alert('Grade added successfully.');</script>";
        } else {
            // Error inserting grade
            echo "<script>alert('Error: " . $conn->error . "');</script>";
        }
    }
}

// SQL query to retrieve grades
$sql = "SELECT subject, first_grading, second_grading FROM grades";
$result = $conn->query($sql);

$grades = []; // Array to store grades
$totalSubjects = 0;
$totalFirstGrading = 0;
$totalSecondGrading = 0;

// Check if there are any results
if ($result && $result->num_rows > 0) {
    // Fetch each row and store the data in the $grades array
    while ($row = $result->fetch_assoc()) {
        $grades[] = $row;
        $totalSubjects++;
        $totalFirstGrading += $row['first_grading'];
        $totalSecondGrading += $row['second_grading'];
    }

    // Calculate the general average
    $generalAverage = round(($totalFirstGrading + $totalSecondGrading) / ($totalSubjects * 2));
} else {
    echo "No grades found.";
}

$conn->close(); // Close the database connection
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CINQ</title>
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

        .table .thead-dark th {
            color: #fff;
            background-color: #063360;
            border-color: #84c1ff;
        }

        .container {
            margin-top: 100px; /* Adjust margin-top to account for the fixed header */
            position: relative;
            z-index: 0;
            padding: 20px; /* Add padding for spacing */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2); /* Shadow effect */
        }

    .grade-table {
        width: 100%;
        border-collapse: collapse;
        position: relative;
    }

    .grade-table th,
    .grade-table td {
        border: 1px solid #dee2e6;
        padding: 12px;
        text-align: center;
    }

    .grade-table thead {
        background-color: #343a40;
        color: #ffffff;
    }

    .grade-table tbody tr:nth-child(even) {
        background-color: #e9ecef;
    }

        .announcement-container {
            margin-top: 20px;
            position: relative;
            z-index: 1;
        }

        .container {
            margin-top: 100px; /* Adjust margin-top to account for the fixed header */
            position: relative;
            z-index: 0;
            padding: 20px; /* Add padding for spacing */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2); /* Shadow effect */
        }
        
        .announcement-container {
            margin-top: 20px;
            position: relative;
            z-index: 1;
            background-color: rgb(255 255 255);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgb(81 78 78);
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
            color: #000000;
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
    background: linear-gradient(to bottom, #007bff 0%, #87cefa 50%, #ffffff 100%);
}
        

        /* Fade-in Animation */
        @keyframes fade-in {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
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
        .back-button {
                margin-top: 20px;
                padding: 10px 20px;
                background-color: #000000;
                color: #000000;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                transition: background-color 0.3s;
            }

            .back-button:hover {
                background-color: #555;
            }

          footer {
                background: linear-gradient(to bottom, #ffffff 0%, #87cefa 50%, #007bff 100%);
                color: #000; 
                padding: 20px;
                text-align: center; 
                position: relative;
                bottom: 0;
                width: 100%;
            }
            
            footer p {
                margin-bottom: 10px;
            }
            
            footer .callus {
                margin-top: 20px;
            }
            
            footer h2 {
                font-size: 20px; 
            }
            
            footer ul {
                list-style-type: none;
                padding: 0; 
            }
            
            footer ul li {
                display: inline;
                margin-right: 10px; 
            }
            
            footer ul li a {
                color: #fff; 
                text-decoration: none;
                transition: color 0.3s; 
            }
            
            footer ul li a:hover {
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
        <h2 class="text-center mb-4">Grade Sheet</h2>

        <table class="table table-bordered grade-table">
            <thead>
                <tr>
                    <th>Subject</th>
                    <th>1st Grading</th>
                    <th>2nd Grading</th>
                    <th>GWA</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($grades as $grade) : ?>
                    <?php
                    // Calculate GWA for each subject and round off
                    $gwa = round(($grade['first_grading'] + $grade['second_grading']) / 2);
                    ?>
                    <tr>
                        <td><?php echo $grade['subject']; ?></td>
                        <td><?php echo $grade['first_grading']; ?></td>
                        <td><?php echo $grade['second_grading']; ?></td>
                        <td><?php echo $gwa; ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="3"><strong>General Average</strong></td>
                    <td><?php echo isset($generalAverage) ? $generalAverage : 'N/A'; ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <footer class="ui segment"
    <div class="ui container">
      <p>&copy; 2024 CINQ. All rights reserved.</p>
      <p>Contact: CINQ@gmail.com </p>
      <p>
        <i class="map marker alternate icon address-icon"></i>
       M.L QUEZON EXT. ANTIPOLO CITY
      </p>
    </div>
  </footer>


    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
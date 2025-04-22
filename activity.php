<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curriculum Information Quicklink</title>
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
            margin-top: 100px;
            position: relative;
            z-index: 0;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgb(173 65 65);
        }

        .announcement-container {
            margin-top: 20px;
            position: relative;
            z-index: 1;
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
            background-color: #eee;
            /* Grey background for individual announcements */
            border: 1px solid #ccc;
            /* Grey border */
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
        
       footer {
    background: linear-gradient(to bottom, #ffffff 0%, #87cefa 50%, #007bff 100%);
    color: #000; 
    padding: 20px;
    text-align: center; 
    position: relative; /* Change from fixed to absolute */
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
        <div class="row">
            <div class="col-md-6">
                <div class="activity-container">
                    <h2>Posted Activities</h2>

                    <!-- Activity form -->
                    <form action="complete_activity.php" method="post">
                        <?php
                        // PHP code to fetch and display posted activities
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

                        // SQL query to fetch activities from the database
                        $sql = "SELECT id, title, description, due_date, attachment FROM activities";
                        $result = $conn->query($sql);

                        $activitiesExist = false; // Flag to check if activities exist

                        if ($result->num_rows > 0) {
                            // Output data of each row
                            while ($row = $result->fetch_assoc()) {
                                echo "<div class='card'>";
                                echo "<div class='card-body'>";
                                echo "<h5 class='card-title'>" . $row['title'] . "</h5>";
                                echo "<p class='card-text'>Description: " . $row['description'] . "</p>";
                                echo "<p class='card-text'>Due Date: " . $row['due_date'] . "</p>";
                                echo "<a href='attachments/" . $row['attachment'] . "' class='card-link'>Download Attachment</a>";
                                echo "<div class='form-group'>";
                                echo "<label for='fileUpload_" . $row['id'] . "'>Upload File:</label>";
                                echo "<input type='file' class='form-control-file' id='fileUpload_" . $row['id'] . "' name='fileUpload[]' accept='image/*,audio/*'>";
                                echo "</div>";
                                echo "<input type='checkbox' name='activity[]' value='" . $row['id'] . "' class='mr-2'>";
                                echo "</div>";
                                echo "</div>";
                                // Set the flag indicating that activities exist
                                $activitiesExist = true;
                            }
                        } else {
                            echo "No activities found";
                        }
                        $conn->close();
                        ?>
                        <?php if ($activitiesExist): ?>
                            <button type="submit" class="btn btn-primary" id="submitBtn" disabled>Complete Selected Activities</button>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>
    </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
     
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
    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Custom Script to enable/disable submit button based on file selection -->
    <script>
        $(document).ready(function () {
            $('input[type="file"]').on('change', function () {
                var fileInput = $(this);
                var submitBtn = $('#submitBtn');
                if (fileInput.get(0).files.length > 0) {
                    submitBtn.prop('disabled', false);
                } else {
                    submitBtn.prop('disabled', true);
                }
            });
        });
    </script>
</body>

</html>
        
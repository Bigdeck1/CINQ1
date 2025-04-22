<?php
session_start();

?>

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
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
            color: #000;
        }

        .logo-text {
            color: #000;
            font-size: 24px;
            font-family: 'Michroma', sans-serif;
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
        }

        @media (min-width: 768px) {
            .container {
                width: 80%;
                margin: 100px auto;
            }
        }

        .announcement-container {
            margin-top: 20px;
            position: relative;
            z-index: 1;
            background: linear-gradient(to bottom, #007bff 0%, #87cefa 50%, #ffffff 100%);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgb(81 78 78);
        }

        .announcement {
            background: linear-gradient(to bottom, #007bff 0%, #87cefa 50%, #ffffff 100%);
            border: 1px solid #ccc;
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

        .text-center {
            text-align: center;
        }

        .navbar {
            background-color: #000;
        }

        @keyframes fade-in {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
        
        .navbar-dark .navbar-nav .nav-link {
    color: rgb(0 0 0);
}

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
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header><br<br><br><br>

<!-- Announcements Section -->
<section class="container mt-5 announcement-container">
    <h2 class="text-center">Announcements</h2>
    <div class="row">
        <div class="col-md-6">
            <div class="announcement">
                <div class="card-body">
                    <h5 class="card-title">Exciting News</h5>
                    <p class="card-text">The annual school carnival will be held on April 20, 2024. Get ready for a
                        day filled with fun, games, and entertainment!</p>
                </div>
            </div>
            <div class="announcement">
                <div class="card-body">
                    <h5 class="card-title">Academic Reminder</h5>
                    <p class="card-text">Midterm exams for all grades will commence from March 10 to March 15.
                        Prepare well and best of luck to everyone!</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="announcement">
                <div class="card-body">
                    <h5 class="card-title">Attention Seniors</h5>
                    <p class="card-text">Graduation ceremony rehearsals will take place on May 5. Attendance is
                        mandatory for all graduating students.</p>
                </div>
            </div>
            <div class="announcement">
                <div class="card-body">
                    <h5 class="card-title">Call for Volunteers</h5>
                    <p class="card-text">The school is looking for volunteers to assist in organizing the
                        upcoming Science Fair. If interested, please sign up at the main office.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="ui segment">
        <p>&copy; 2024 CINQ. All rights reserved.</p>
        <p>Contact: CINQ@gmail.com </p>
        <p>
            <i class="map marker alternate icon address-icon"></i>
            M.L QUEZON EXT. ANTIPOLO CITY
        </p>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function () {
        $('.navbar-toggler').on('click', function () {
            $('.sidebar').toggleClass('show');
        });
    });
</script>
</body>

</html>

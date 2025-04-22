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

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            width: 250px;
            background-color: #ffffff;
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

        .dropdown-menu .dropdown-item {
            color: #ffffff;
        }



        .back-button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #000000;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .back-button:hover {
            background-color: #555;
        }

        .dropdown-toggle::after {
            display: none;
        }

        .card-container {
            position: relative;
            overflow: hidden;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            margin-bottom: 2px; 
        }
          .card-container:hover {
              transform: translateY(-5px);
            background: linear-gradient(to bottom, #007bff 0%, #87cefa 50%, #ffffff 100%);
          }
      
         .card-content {
            padding: 15px; 
            background: linear-gradient(to bottom, #007bff 0%, #87cefa 50%, #ffffff 100%);
            border-radius: 8px;
        }

         .ui.primary.button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px; 
            border-radius: 5px; 
            text-decoration: none; 
            display: inline-block;
            transition: background-color 0.3s, color 0.3s;
        }

         .ui.primary.button:hover {
            background-color: #0056b3;
        }

         .ui.primary.button:active {
            background-color: #003a76; 
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
                            <a class="dropdown-item" href="login.php">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
</head>
<br>
    <main class="ui container">
        <div class="ui container card-container">
          <div class="card-content">
            <section id="st1a" class="ui segment btn-container">
              <h2 class="ui header">GRADE 11 - 1ST SEMESTER</h2>
              <p></p>
               <a href="grade11_1stsem.php" class="ui primary button">VIEW</a>
            </section>
          </div>
        </div>
        <div class="ui container card-container">
          <div class="card-content">
            <section id="st1b" class="ui segment btn-container">
              <h2 class="ui header">GRADE 11 - 2ND SEMESTER</h2>
              <p></p>
               <a href="grade11_2ndsem.php" class="ui primary button">VIEW</a>
            </section>
          </div>
        </div>
        <div class="ui container card-container">
          <div class="card-content">
            <section id="st1c" class="ui segment btn-container">
              <h2 class="ui header">GRADE 12 - 1ST SEMESTER</h2>
              <p></p>
              <a href="grade12_1stsem.php" class="ui primary button">VIEW</a>
            </section>
          </div>
        </div>
        <div class="ui container card-container">
          <div class="card-content">
            <section id="st1d" class="ui segment btn-container">
              <h2 class="ui header">GRADE 12 - 2ND SEMESTER</h2>
              <p></p>
              <a href="grade12_2ndsem.php" class="ui primary button">VIEW</a>
            </section>
          </div>
        </div>
</main>

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

<!-- Optimized Semantic UI JavaScript -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
        document.addEventListener('DOMContentLoaded', function () {
            // Get all "Select File" buttons by their common class
            var selectFileButtons = document.querySelectorAll('.select-file-button');
    
            // Attach click event listeners to each button
            selectFileButtons.forEach(function (button) {
                button.addEventListener('click', function () {
                    // Get the target dropdown menu ID from the data attribute
                    var targetMenuId = button.getAttribute('data-target-menu');
                    var targetMenu = document.getElementById(targetMenuId);
    
                    // Toggle the display of the target dropdown menu
                    if (targetMenu.style.display === 'block') {
                        targetMenu.style.display = 'none';
                    } else {
                        targetMenu.style.display = 'block';
                    }
                });
            });
        });
            function toggleDropdown(menuId) {
                var targetMenu = document.getElementById(menuId);
                if (targetMenu.style.display === 'block') {
                    targetMenu.style.display = 'none';
                } else {
                    targetMenu.style.display = 'block';
                }
            }
        
    </script>
    </body>
    </html>
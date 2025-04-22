<?php
    // Initialize $students array
    $students = [];

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

    // Fetch data from table 'g12st1a' in the database
    $sql = "SELECT * FROM users WHERE grade = '11' AND section = 'st1c'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch data row by row
        while ($row = $result->fetch_assoc()) {
            // Add each row to the $students array
            $students[] = $row;
        }
    } else {
        echo "No data found in table 'g11st1c'!";
    }

    $conn->close();
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Manage Students - Admin Panel</title>
        <!-- Semantic UI CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.2/semantic.min.css">
        <style>
            body {
                background-color: #f8f9fa;
                margin: 0;
                padding: 0;
            }

            header {
                background: linear-gradient(to bottom, #007bff 0%, #87cefa 50%, #ffffff 100%);
                color: #000;
                padding: 10px 0; /* Adjusted padding */
                text-align: center;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                z-index: 1000;
            }

            nav ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
                text-align: center;
                display: flex;
                justify-content: center;
            }

            nav ul li {
                margin-right: 20px;
            }

            nav ul li a {
                color: #000;
                text-decoration: none;
                font-size: 16px;
                transition: color 0.3s ease;
            }

            nav ul li a:hover {
                color: #f8f9fa;
            }

            .page-container {
                padding: 20px;
            }

            .ui.grid>.row>.column:not(.row),
            .ui.grid>.row:not(.column)>.column {
                padding-left: 0;
                padding-right: 0;
            }

            .student-list {
                margin-top: 20px;
            }

            .student-card {
                background-color: #fff;
                border-radius: 8px;
                padding: 20px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                transition: transform 0.3s ease;
                border-top: 3px solid transparent;
            }

            .student-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
                border-top: 3px solid #2185d0; /* Highlight border on hover */
            }

            .student-card h3 {
                margin-bottom: 10px;
                color: #333;
            }

            .student-card p {
                color: #777;
                margin-bottom: 8px;
            }

            .action-buttons {
                margin-top: 20px;
                text-align: right;
            }

            .ui.primary.button.add-student-button {
                background-color: #2185d0;
                color: #fff;
                border-radius: 30px; /* Increased border radius */
                padding: 12px 32px; /* Adjusted padding */
                text-transform: uppercase;
                font-weight: bold;
                transition: background-color 0.3s ease, transform 0.2s ease;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }

            .ui.primary.button.add-student-button:hover {
                background-color: #1678c2;
                transform: scale(1.05); /* Slightly scale up on hover */
            }

            .ui.secondary.button {
                background-color: #f2711c;
                color: #fff;
            }

            .ui.red.button {
                background-color: #db2828;
                color: #fff;
            }

            .ui.button.view-button:hover,
            .ui.button.edit-button:hover,
            .ui.button.delete-button:hover {
                opacity: 0.9;
            }

            /* Responsive styles */
            @media (max-width: 768px) {
                nav ul li {
                    display: block;
                    margin-bottom: 10px;
                }
            }

            /* Search bar styling */
            .ui.action.input>input[type="text"],
            .ui.action.input>button.ui.button {
                border-radius: 0;
                border-color: #2185d0; /* Semantic UI primary button color */
                color: #2185d0; /* Semantic UI primary button text color */
            }

            .ui.action.input>input[type="text"]:focus,
            .ui.action.input>button.ui.button:focus {
                border-color: #1678c2; /* Semantic UI primary button hover color */
                color: #1678c2; /* Semantic UI primary button hover text color */
                box-shadow: none;
            }

            .ui.action.input>button.ui.button {
                background-color: #fff;
            }

            .ui.action.input>button.ui.button:hover {
                background-color: #f8f9fa; /* Background color on hover */
            }

            /* Complex CSS */
            .student-card {
                background: linear-gradient(to bottom, #ffffff, #f8f9fa);
            }

            .student-card:hover {
                background: linear-gradient(to bottom, #ffffff, #e7f1ff);
            }

            .student-card h3 {
                font-size: 1.5rem;
            }

            .ui.buttons .button:not(:first-child) {
                margin-left: -1px;
            }

            .ui.mini.buttons .button {
                padding: 8px 12px;
                font-size: 12px;
            }

            .add-student-button:hover {
                background-color: #1678c2;
            }

            main {
                margin-top: 60px; /* Adjust based on header height */
                padding: 20px;
            }
            
            .slot-info {
                margin-top: 20px;
                padding: 10px;
                background-color: #f0f0f0;
                border-radius: 5px;
                text-align: center;
            }

            .slot-info h4 {
                margin-bottom: 5px;
                color: #333;
            }

            .slot-info p {
                margin: 0;
                color: #777;
            }

            .container-box {
                margin-top: 20px;
                background-color: #ffffff;
                border-radius: 8px;
                padding: 20px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }
        </style>
    </head>

    <body>
        <header class="bg-gradient-to-b from-blue-500 to-light-blue-300 text-white py-2">
            <h1>CINQ ADMIN PANEL</h1>

            <!-- Navigation Menu -->
            <nav>
                <ul>
                    <li><a href="dashboard.php" onclick="loadSection('dashboard')">Dashboard</a></li>
                    <li><a href="manageStudents.php" onclick="loadSection('manageStudents')">Manage Students</a></li>
                    <li><a href="manageTeachers.php" onclick="loadSection('manageTeachers')">Manage Teachers</a></li>
                    <li><a href="manageCourses.php" onclick="loadSection('manageCourses')">Manage Courses</a></li>
                    <li><a href="index.php">Logout</a></li>
                </ul>
            </nav>
        </header> <br><br><br><br><br><br><br>
        <div class="ui container page-container">
            <!-- Search Bar -->
            <div class="ui grid">
                <div class="row">
                    <div class="ten wide column">
                        <div class="ui action input">
                            <input id="email-search" type="text" placeholder="Search by email...">
                            <button id="search-btn" class="ui primary button">Search</button>
                        </div>
                    </div>

            <div class="slot-info">
            <h4>ST-1C SLOTS</h4>
            <p>Total Slots: 50</p>
            <p>Taken Slots: <?php echo count($students); ?></p>
        </div>

            <!-- Student List Container -->
            <div class="student-list ui grid">
                <?php foreach ($students as $student): ?>
                <div class="row">
                    <div class="sixteen wide column">
                        <div class="student-card">
                            <h3><?php echo $student['name']; ?></h3>
                            <p>Email: <?php echo $student['email']; ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Semantic UI JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.2/semantic.min.js"></script>
        <!-- Include jQuery and jQuery UI -->
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

        <script>
            $(document).ready(function () {
                // Initialize autocomplete on the email-search input
                $("#email-search").autocomplete({
                    source: [
                        <?php
                        // Generate a JavaScript array of email addresses for autocomplete suggestions
                        $emailArray = [];
                        foreach ($students as $student) {
                            $emailArray[] = $student['email'];
                        }
                        echo '"' . implode('", "', $emailArray) . '"';
                        ?>
                    ],
                    minLength: 1 // Minimum characters required before showing suggestions
                });

                // Search button click event
                $('#search-btn').click(function () {
                    var searchText = $('#email-search').val().toLowerCase();
                    $('.student-card').each(function () {
                        var emailText = $(this).find('p:nth-child(2)').text().toLowerCase(); // Email is the second <p> element
                        if (emailText.includes(searchText)) {
                            $(this).show();
                        } else {
                            $(this).hide();
                        }
                    });
                });

                // View button click handler
                $('.view-button').click(function () {
                    var studentId = $(this).data('id');
                    // Implement view details functionality
                });

                // Edit button click handler
                $('.edit-button').click(function () {
                    var studentEmail = $(this).data('email');
                    // Implement edit functionality
                });

                // Delete button click handler
                $('.delete-button').click(function () {
                    var studentId = $(this).data('id');
                    // Confirm deletion
                    if (confirm('Are you sure you want to delete this student?')) {
                        // AJAX request to delete the student
                        $.ajax({
                            type: 'POST',
                            url: 'delete_student.php', // Replace with the actual delete script URL
                            data: { id: studentId },
                            success: function (response) {
                                // Refresh the page or update the student list as needed
                                location.reload();
                            },
                            error: function (xhr, status, error) {
                                console.error(xhr.responseText);
                            }
                        });
                    }
                });
            });
        </script>

    </body>

    </html>

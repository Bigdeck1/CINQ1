<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Admin Panel</title>
    <!-- Include Bootstrap for styling and jQuery for AJAX -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        /* Custom CSS for header and charts */
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        
        header {
            background: linear-gradient(to bottom, #007bff 0%, #87cefa 50%, #ffffff 100%);
            color: #000;
            padding: 10px 0;
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
            display: flex; /* Use flexbox for one-line navigation */
            justify-content: center; /* Center items horizontally */
        }

        nav ul li {
            margin-right: 20px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 16px;
            transition: color 0.3s ease;
        }

        nav ul li a:hover {
            color: #f8f9fa;
        }

        main {
            margin-top: 60px; /* Adjust based on header height */
            padding: 20px;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            nav ul li {
                display: block;
                margin-bottom: 10px;
            }
        }

        /* Larger chart container */
        .chart-container {
            margin-top: 20px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .chart-container canvas {
            width: 100%;
            height: 400px;
        }
        /* Custom styles for enhanced appeal */
        .navbar {
            background-color: #007bff !important;
        }

        .navbar-nav .nav-link {
            color: #fff !important;
        }

        .navbar-nav .nav-link:hover {
            color: #f8f9fa !important;
        }

        .top-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .count-box {
            background-color: #f8f9fa;
            border-radius: 5px;
            padding: 10px;
        }

        .count-box h3 {
            margin-bottom: 5px;
            font-size: 1.5rem;
        }

        .chart-container {
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #f8f9fa;
            padding: 20px;
            display: flex;
            align-items: center;
        }

        .card {
            width: 100%;
        }

        .card-header {
            background-color: #f8f9fa;
            border-bottom: none;
        }

        .card-title {
            font-size: 1.5rem;
        }

        .card-footer {
            background-color: #f8f9fa;
            border-top: none;
            display: flex;
            justify-content: center;
        }

        .card-footer a {
            color: #007bff;
            text-decoration: none;
            font-weight: 600;
        }

        .card-footer a:hover {
            color: #0056b3;
        }
    </style>
</head>

<body>
    <header>
        <h1>School Admin Panel</h1>
        <nav>
            <ul>
                <li><a href="admin_panel.php">Dashboard</a></li>
                <li><a href="admin_panel.php" onclick="loadSection('dashboard')">Balances</a></li>
                <li><a href="javascript:void(0);" onclick="loadSection('manageStudents')">Manage Students</a></li>
                <li><a href="javascript:void(0);" onclick="loadSection('manageTeachers')">Manage Teachers</a></li>
                <li><a href="javascript:void(0);" onclick="loadSection('manageCourses')">Manage Courses</a></li>
                <li><a href="index.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <!-- Main Content -->
    <main>
        <div class="top-section">
            <div class="count-box">
                <h3>Total Students</h3>
                <p id="totalStudentsCount">500</p>
            </div>
            <div class="count-box">
                <h3>Total Teachers</h3>
                <p id="totalTeachersCount">30</p>
            </div>
            <div class="count-box">
                <h3>Courses Available</h3>
                <p id="totalCoursesCount">20</p>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="chart-container">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Failing Students</h3>
                </div>
                <div class="card-body">
                    <canvas id="failingStudentsChart"></canvas>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>

        <div class="chart-container">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Sales Overview</h3>
                </div>
                <div class="card-body">
                    <canvas id="barChart"></canvas>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>

        <div class="chart-container">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Visitors</h3>
                </div>
                <div class="card-body">
                    <canvas id="lineChart"></canvas>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>

        <div class="chart-container">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Color Distribution</h3>
                </div>
                <div class="card-body">
                    <canvas id="pieChart"></canvas>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>
    </main>

    <!-- Include modals for managing students and teachers -->
    <?php include 'modals.php'; ?>

    <!-- Script for initializing charts and handling navigation -->
    <script>
        $(document).ready(function () {
            // Function to load different sections dynamically
            function loadSection(event, section) {
                event.preventDefault(); // Prevent default link behavior

                if ($('#mainContent').data('section') !== section) {
                    $.ajax({
                        url: section + '.php',
                        method: 'GET',
                        success: function (response) {
                            $('#mainContent').html(response);
                            $('#mainContent').data('section', section);
                        },
                        error: function (xhr, status, error) {
                            console.error('Error loading section:', status, error);
                        }
                    });
                }
            }

            // Load the initial dashboard section on page load
            $(document).ready(function () {
    // Function to load different sections dynamically
    function loadSection(event, section) {
        // Your AJAX code for loading sections goes here
    }

    // Call loadSection to load the 'dashboard' section initially
    loadSection(event, 'dashboard');


            // Sample data for failing students (replace with actual data)
            const failingStudentsData = [20, 15, 25, 30, 18, 22, 16];

            // Initialize and update failing students chart
            const failingStudentsChartCtx = document.getElementById('failingStudentsChart').getContext('2d');
            const failingStudentsChart = new Chart(failingStudentsChartCtx, {
                type: 'bar',
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                    datasets: [{
                        label: 'Failing Students',
                        data: failingStudentsData,
                        backgroundColor: 'rgba(255, 99, 132, 0.5)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Update total counts dynamically (replace with actual data)
            $('#totalStudentsCount').text('500');
            $('#totalTeachersCount').text('30');
            $('#totalCoursesCount').text('20');

            // Chart data for other charts (lineChart, barChart, pieChart)
            const barChartData = {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                    label: 'Sales',
                    data: [10, 20, 30, 25, 35, 45, 40],
                    backgroundColor: '#3490dc',
                    borderColor: '#3490dc',
                    borderWidth: 1,
                }]
            };

            const lineChartData = {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                    label: 'Visitors',
                    data: [50, 55, 60, 65, 70, 75, 80],
                    backgroundColor: '#38a169',
                    borderColor: '#38a169',
                    borderWidth: 1,
                }]
            };

            const pieChartData = {
                labels: ['Red', 'Blue', 'Yellow'],
                datasets: [{
                    data: [10, 20, 30],
                    backgroundColor: ['#e3342f', '#3490dc', '#f6993f'],
                    hoverBackgroundColor: ['#f00', '#00f', '#ff0'],
                }]
            };

            // Initialize and update other charts (lineChart, barChart, pieChart)
            const barChartCtx = document.getElementById('barChart').getContext('2d');
            new Chart(barChartCtx, {
                type: 'bar',
                data: barChartData,
                options: {
                    responsive: true,
                    maintainAspectRatio: false, // Ensure the chart fits its container
                }
            });

            const lineChartCtx = document.getElementById('lineChart').getContext('2d');
            new Chart(lineChartCtx, {
                type: 'line',
                data: lineChartData,
                options: {
                    responsive: true,
                    maintainAspectRatio: false, // Ensure the chart fits its container
                }
            });

            const pieChartCtx = document.getElementById('pieChart').getContext('2d');
            new Chart(pieChartCtx, {
                type: 'pie',
                data: pieChartData,
                options: {
                    responsive: true,
                    maintainAspectRatio: false, // Ensure the chart fits its container
                }
            });

            // Event listener for navigation links
            $('.nav-link').click(function (event) {
                const section = $(this).attr('href');
                loadSection(event, section);
            });
        });
    </script>
</body>

</html>
 <header>
        <h1>School Admin Panel</h1>
        <nav>
            <ul>
                <li><a href="admin_panel.php;" onclick="loadSection('dashboard')">Dashboard</a></li>
                <li><a href="admin_panel.php;" onclick="loadSection('dashboard')">Balances</a></li>
                <li><a href="javascript:void(0);" onclick="loadSection('manageStudents')">Manage Students</a></li>
                <li><a href="javascript:void(0);" onclick="loadSection('manageTeachers')">Manage Teachers</a></li>
                <li><a href="javascript:void(0);" onclick="loadSection('manageCourses')">Manage Courses</a></li>
                <li><a href="index.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main id="mainContent">
        <!-- Content will be loaded dynamically here -->
    </main>

    <!-- Include modals for managing students and teachers -->
    <?php include 'modals.php'; ?>

    <div class="container-fluid chart-container">
        <div class="row">
            <div class="col-lg-4">
                <canvas id="barChart"></canvas>
            </div>
            <div class="col-lg-4">
                <canvas id="lineChart"></canvas>
            </div>
            <div class="col-lg-4">
                <canvas id="pieChart"></canvas>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            // Function to load different sections dynamically
            function loadSection(section) {
                $.ajax({
                    url: section + '.php', // PHP script for the corresponding section
                    method: 'GET',
                    success: function (response) {
                        $('#mainContent').html(response);
                        renderCharts(); // Call the function to render charts after loading content
                    },
                    error: function (xhr, status, error) {
                        console.error('Error loading section:', status, error);
                    }
                });
            }

            // Load the initial dashboard section on page load
            loadSection('dashboard');

            // Function to render charts
            function renderCharts() {
                // Assume $totalStudents, $totalTeachers, $totalCourses, $enrolleesData, $graduationsData, $yearlyCountsData are fetched from your database or other sources
                const totalStudents = 500;
                const totalTeachers = 30;
                const totalCourses = 20;

                const enrolleesData = [100, 120, 150, 130]; // Sample data for bar graph
                const graduationsData = [20, 25, 30, 35]; // Sample data for line graph (graduations)
                const yearlyCountsData = [400, 420, 450, 480]; // Sample data for line graph (yearly counts)
                const courseDistributionData = [25, 35, 20, 15]; // Sample data for pie chart (course distribution)

                // Chart configurations
                const barChartConfig = {
                    type: 'bar',
                    data: {
                        labels: ['January', 'February', 'March', 'April'],
                        datasets: [{
                            label: 'Enrollees',
                            data: enrolleesData,
                            backgroundColor: 'rgba(54, 162, 235, 0.5)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                };

                const lineChartConfig = {
                    type: 'line',
                    data: {
                        labels: ['January', 'February', 'March', 'April'],
                        datasets: [{
                            label: 'Graduations',
                            data: graduationsData,
                            backgroundColor: 'rgba(255, 99, 132, 0.5)',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Yearly Counts',
                            data: yearlyCountsData,
                            backgroundColor: 'rgba(75, 192, 192, 0.5)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                };

                const pieChartConfig = {
                    type: 'pie',
                    data: {
                        labels: ['Math', 'Science', 'History', 'English'],
                        datasets: [{
                            label: 'Course Distribution',
                            data: courseDistributionData,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.5)',
                                'rgba(54, 162, 235, 0.5)',
                                'rgba(255, 206, 86, 0.5)',
                                'rgba(75, 192, 192, 0.5)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true
                    }
                };

                // Get chart contexts
                const barChartCtx = document.getElementById('barChart').getContext('2d');
                const lineChartCtx = document.getElementById('lineChart').getContext('2d');
                const pieChartCtx = document.getElementById('pieChart').getContext('2d');

                // Render charts
                new Chart(barChartCtx, barChartConfig);
                new Chart(lineChartCtx, lineChartConfig);
                new Chart(pieChartCtx, pieChartConfig);
            }

            // Event listener for navigation links
            $('.nav-link').click(function () {
                const section = $(this).attr('href');
                loadSection(section);
            });
        });
    </script>
</body>

</html>

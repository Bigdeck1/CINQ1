<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.1/aos.css" />
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }

        @keyframes fadeIn {
            0% {opacity: 0;}
            100% {opacity: 1;}
        }
        .animated {
            animation: fadeIn 2s ease-in-out;
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
            color: #286fb6;
        }
       
        main {
            flex: 1;
            margin-top: 70px;
            padding: 20px;
        }
        .card-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            grid-gap: 20px;
            justify-items: center;
        }

        .card-container {
            transform: translateY(-5px); /* Move the section up by 5px on hover */
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1); /* Add a shadow effect */
        }

        /* Adjust hover effect on the buttons within the sections */
        .card-container {
            transform: scale(1.05); /* Scale up the button slightly on hover */
        }
        .btn-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        footer {
            background-image: url(image/for_foorter.jpg);
            border: none;
            border-radius: 0;
            margin-top: 2em;
            padding: 2em 0;
            color: #000000;
            text-align: center;
        }

        .ui .containers{
            background-image: url(image/for_foorter.jpg);
        }

        .parallax {
            background: linear-gradient(to bottom, #007bff 0%, #87cefa 50%, #ffffff 100%);
            min-height: 50px; 
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .overlay {
            background-color: rgba(0, 0, 0, 0.5);
            width: 100%;
            height: 100%;
            width: 100%;
            color: #000;
        }

        .title {
            font-size: 2em; 
            font-weight: bold;
            color: #000000; 
        }
        
        .description {
            font-size: 1.2em; 
            color: #000000;
        }

        .container {
            display: flex;
            justify-content: center;
        }

        .back-button {
            display: inline-block;
            padding: 10px 20px;
            margin: 20px 0;
            font-size: 18px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .back-button:hover {
            background-color: #0056b3;
            transform: scale(1.1);
        }
        
    </style>
</head>
<body>
    <header class="ui segment animate__animated animate__fadeInDown">
        <div class="ui container card-container parallax" data-aos="fade-up" data-aos-duration="2000">
            <h1 class="ui center aligned header">Grade 11 Students</h1>

            <nav>
                <ul>
                    <li><a href="dashboard.php" onclick="loadSection('dashboard')">Dashboard</a></li>
                    <li><a href="manageStudents.php" onclick="loadSection('manageStudents')">Manage Students</a></li>
                    <li><a href="manageTeachers.php" onclick="loadSection('manageTeachers')">Manage Teachers</a></li>
                    <li><a href="manageCourses.php" onclick="loadSection('manageCourses')">Manage Courses</a></li>
                    <li><a href="index.php">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main class="ui container">
        <div class="ui container card-container" data-aos="fade-up" data-aos-duration="2000">
            <!-- Repeat this section for each class -->
            <section id="st1a" class="ui raised segment btn-container" data-aos="fade" data-aos-delay="0">
                <h2 class="ui header title">ST-1A</h2>
                <p class="description">Welcome to ST-1A content for Grade 11 students.</p>
                <a href="g11st1a.php" class="ui primary button">VIEW</a>
            </section>
            <section id="st1b" class="ui raised segment btn-container" data-aos="fade" data-aos-delay="200">
                <h2 class="ui header title">ST-1B</h2>
                <p class="description">Welcome to ST-1B content for Grade 11 students.</p>
                <a href="g11st1b.php" class="ui primary button">VIEW</a>
            </section>
            <section id="st1c" class="ui raised segment btn-container" data-aos="fade" data-aos-delay="200">
                <h2 class="ui header title">ST-1C</h2>
                <p class="description">Welcome to ST-1C content for Grade 11 students.</p>
                <a href="g11st1c.php" class="ui primary button">VIEW</a>
            </section>
            <section id="st1d" class="ui raised segment btn-container" data-aos="fade" data-aos-delay="200">
                <h2 class="ui header title">ST-1D</h2>
                <p class="description">Welcome to ST-1D content for Grade 11 students.</p>
                <a href="g11st1d.php" class="ui primary button">VIEW</a>
            </section>
              <section id="st1d" class="ui raised segment btn-container" data-aos="fade" data-aos-delay="200">
                <h2 class="ui header title">ST-2A</h2>
                <p class="description">Welcome to ST-2A content for Grade 11 students.</p>
                <a href="g11st2a.php" class="ui primary button">VIEW</a>
            </section>
            <section id="st1d" class="ui raised segment btn-container" data-aos="fade" data-aos-delay="200">
                <h2 class="ui header title">ST-2B</h2>
                <p class="description">Welcome to ST-2B content for Grade 11 students.</p>
                <a href="g11st2B.php" class="ui primary button">VIEW</a>
            </section>
            <section id="st1d" class="ui raised segment btn-container" data-aos="fade" data-aos-delay="200">
                <h2 class="ui header title">ST-2c</h2>
                <p class="description">Welcome to ST-2c content for Grade 11 students.</p>
                <a href="g11st2C.php" class="ui primary button">VIEW</a>
            </section>
            <section id="st1d" class="ui raised segment btn-container" data-aos="fade" data-aos-delay="200">
                <h2 class="ui header title">ST-2D</h2>
                <p class="description">Welcome to ST-2D content for Grade 11 students.</p>
                <a href="g11st2d.php" class="ui primary button">VIEW</a>
            </section>
            <!-- Add more sections here with increasing delay values -->
        </div>
        <div class="container" data-aos="fade" data-aos-delay="200">
            <a href="manageStudents.php" class="back-button">Back</a>
        </div>
    </main>
    
    <footer class="ui segment animate__animated animate__fadeIn">
        <div class="ui containers">
            <p>© 2024 CINQ. All rights reserved.</p>
            <p>Contact: CINQ@gmail.com </p>
            <p>
                <i class="map marker alternate icon address-icon"></i>
                M.L QUEZON EXT. ANTIPOLO CITY
            </p>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.1/aos.js"></script>
    <script>
        AOS.init();
    </script>

</body>
</html>

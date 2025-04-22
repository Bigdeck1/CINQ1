tcProfile.php<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Profile</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/tcprofile.css">
</head>
<body>
    <div class="container">
        <h2><a href="TC.php">Profile</a></h2>
        <div class="teacher-biodata">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="avatar"></label>
                        <img src="image/Nitro_Wallpaper_01_3840x2400.jpg" alt="Teacher Avatar" id="avatar" class="img-fluid">
                    </div>
                </div>
                <div class="col-md-8">
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Master Teacher V:</strong> GG.SIR</li>
                        <li class="list-group-item"><strong>Email:</strong> pogi@gmail.com</li>
                        <li class="list-group-item"><strong>Age:</strong> 18</li>
                        <li class="list-group-item"><strong>Subject:</strong> Mathematics</li>
                        <li class="list-group-item"><strong>Experience:</strong> 10 years</li>
                        <li class="list-group-item"><strong>Location:</strong> Antipolo</li>
                        <li class="list-group-item"><strong>Nationality:</strong> Filipino</li>
                        <li class="list-group-item"><strong>Birth Date:</strong> 2005-03-10</li>
                        <li class="list-group-item"><strong>Birth Place:</strong> Cityville</li>
                        <li class="list-group-item"><strong>Education:</strong> Bachelor's Degree in Mathematics</li>
                        <li class="list-group-item"><strong>Contact number of student:</strong> +1 (555) 987-6543</li>
                        <li class="list-group-item"><strong>Certifications:</strong> Bachelor's Degree in Mathematics</li>
                        <li class="list-group-item"><strong>Teaching Style:</strong> Interactive and engaging</li>
                        <li class="list-group-item"><strong>Availability:</strong> Monday to Friday, 9:00 AM - 5:00 PM</li>
                        <li class="list-group-item"><strong>Specializations:</strong> Algebra, Geometry, Calculus</li>
                        <li class="list-group-item"><strong>Extra-curricular Activities:</strong> Jackstone Club Advisor, Math Olympiad Coach</li>
                    </ul>
                    <button class="btn btn-primary mt-3" onclick="goBack()">Go Back</button>
                </div>
            </div>
        </div>
    </div>

    <footer class="fixed-bottom">
        <div class="container">
            <p>&copy; 2024 CINQ. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS and jQuery (for dropdowns and other features) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>

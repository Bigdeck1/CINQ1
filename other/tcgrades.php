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

// Fetch students from the database
$sql = "SELECT id, name FROM users WHERE role = 'student'";
$result = $conn->query($sql);

$students = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $students[] = $row;
    }
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $student = $conn->real_escape_string($_POST["student"]);
    $subject = $conn->real_escape_string($_POST["subject"]);
    $firstGrading = $conn->real_escape_string($_POST["first_grading"]);
    $secondGrading = $conn->real_escape_string($_POST["second_grading"]);

    // SQL query to check if subject already exists for the student
    $checkSql = "SELECT * FROM grades WHERE student_id = ? AND subject = ?";
    $stmt = $conn->prepare($checkSql);
    $stmt->bind_param("is", $student, $subject);
    $stmt->execute();
    $checkResult = $stmt->get_result();

    if ($checkResult && $checkResult->num_rows > 0) {
        // Subject already exists for the student, show notice
        echo "<script>alert('Cannot add grades. Subject already exists for the selected student.');</script>";
    } else {
        // Subject does not exist for the student, proceed with insertion
        // SQL query to insert new grade into database
        $insertSql = "INSERT INTO grades (student_id, subject, first_grading, second_grading) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($insertSql);
        $stmt->bind_param("isss", $student, $subject, $firstGrading, $secondGrading);

        if ($stmt->execute() === TRUE) {
            // Grade inserted successfully
            echo "<script>alert('Grade added successfully.');</script>";
        } else {
            // Error inserting grade
            echo "<script>alert('Error: " . $conn->error . "');</script>";
        }
    }
    $stmt->close();
}

$conn->close(); // Close the database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Grades</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
      
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"], select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        
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

    </style>
</head>
<body>
    
    <div class="navbar">
        <a href="TC.php">HOME</a>
        <a href="view_class.php">CLASS ANNOUNCEMENTS</a>
        <a href="stem1astudent.php">STUDENTS</a>
        <a href="attendance.php">ATTENDANCE</a>
        <a href="stem1activities.php">ACTIVITIES</a>
        <a href="tcgrades.php">GRADE</a>
    </div>
    
    <h2>Grades</h2>
    <form action="insert_grade.php" method="post">
        <label for="student">Select Student:</label>
        <select id="student" name="student" required>
            <option value="">Select a student</option>
            <?php foreach($students as $student): ?>
                <option value="<?php echo $student['id']; ?>"><?php echo htmlspecialchars($student['name']); ?></option>
            <?php endforeach; ?>
        </select><br><br>
        
        <label for="subject">Subject:</label>
        <select id="subject" name="subject" required>
            <option value="">Select a subject</option>
            <option value="Contemporary Philippine Arts From the Region">Contemporary Philippine Arts From the Region</option>
            <option value="Media and Information Literacy">Media and Information Literacy</option>
            <option value="Physical Education and Health 3">Physical Education and Health 3</option>
            <option value="Understanding Culture, Society and Politics">Understanding Culture, Society and Politics</option>
            <option value="English for Academic and Professional Purposes">English for Academic and Professional Purposes</option>
            <option value="Pagsulat sa Filipino sa Piling Larangan (Akademik)">Pagsulat sa Filipino sa Piling Larangan (Akademik)</option>
            <option value="General Physics 2">General Physics 2</option>
            <option value="General Chemistry 2">General Chemistry 2</option>
            <option value="General Biology 2">General Biology 2</option>
            <option value="Research Project">Research Project</option>
            <option value="Practical Research 2">Practical Research 2</option>
            <option value="Physical Education and Health 4">Physical Education and Health 4</option>
            <option value="21st Literature from the Philippines and to the World">21st Literature from the Philippines and to the World</option>
            <option value="Entrepreneurship">Entrepreneurship</option>
            <option value="Work Immersion">Work Immersion</option>
            <option value="Basic Calculus">Basic Calculus</option>
            <option value="Calculus">Calculus</option>
        </select><br><br>
        
        <label for="first_grading">First Grading:</label>
        <input type="text" id="first_grading" name="first_grading" required><br><br>
        
        <label for="second_grading">Second Grading:</label>
        <input type="text" id="second_grading" name="second_grading" required><br><br>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>

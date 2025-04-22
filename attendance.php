<?php
// Establish PDO database connection
$servername = "localhost";
$username = "id21990397_root";
$password = "@123456789CINq";
$dbname = "id21990397_rename";

$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Fetch unique attendance dates from the database
$uniqueDates = [];
$sqlDates = "SELECT DISTINCT attendance_date FROM attendance";
$stmtDates = $pdo->query($sqlDates);
if ($stmtDates) {
    while ($rowDate = $stmtDates->fetch(PDO::FETCH_ASSOC)) {
        $uniqueDates[] = $rowDate['attendance_date'];
    }
}

// Check if the form is submitted with a selected date
if (isset($_POST['attendanceDate'])) {
    try {
        // Get the selected date from the form
        $selectedDate = $_POST['attendanceDate'];

        // Fetch attendance data for the selected date from the database
        $attendanceData = [];
        $sql = "SELECT student_name, attendance_status FROM attendance WHERE attendance_date = :selectedDate";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':selectedDate', $selectedDate);
        $stmt->execute();
        
        // Fetch attendance data only if the query is successful
        if ($stmt) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $attendanceData[] = [
                    'student' => $row['student_name'],
                    'status' => $row['attendance_status']
                ];
            }
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include custom CSS file -->
    <link rel="stylesheet" href="css/stem1astudent.css">
    <style>
        /* Custom CSS */
        .custom-circle {
            position: relative;
            top: 4px; /* Adjust the top position to move the circles */
            margin-right: 5px; /* Add margin to separate circles */
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

        .attendances-date {
            margin-bottom: 20px;
        }

        .attendance-container {
            margin-top: 20px;
        }

        .attendances-container {
            margin-top: 20px;
        }

        .attendance-item {
            margin-bottom: 10px;
        }

        .attendances-item {
            margin-bottom: 10px;
        }
/* Main container styling */
.main-container {
    display: flex;
    justify-content: space-around;
    padding: 20px;
    background-color: #f8f9fa;
}

/* First container styling */
.attendances-container-1 {
    width: 45%;
    padding: 20px;
    border: 1px solid #ced4da;
    border-radius: 5px;
    background-color: #ffffff;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

/* Second container styling */
.attendances-container-2 {
    width: 45%;
    padding: 20px;
    border: 1px solid #ced4da;
    border-radius: 5px;
    background-color: #ffffff;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

/* Attendance data container styling */
.attendance-data-container {
    margin-top: 20px;
}

/* Attendance item styling */
.attendances-item {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
    padding: 10px;
    border-bottom: 1px solid #dee2e6;
}

.form-group {
    margin-bottom: 1em;
}
.list-group-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border: 1px solid #ddd;
    padding: 0.5em;
    margin-bottom: 0.5em;
}
.list-group-item label {
    margin-right: 1em;
}
.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
    color: white;
    padding: 0.5em 1em;
    text-decoration: none;
    cursor: pointer;
}
.btn-primary:hover {
    background-color: #0056b3;
    border-color: #0056b3;
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

<div class="container mt-4">
    <h1><a href="view_class.php">ATTENDANCE</a></h1>
    <div class="attendances-date">
        <!-- Display attendance date -->
        <p><strong>Attendance Date:</strong> <?php echo date("Y-m-d"); ?></p>
    </div>

    <!-- Main container for attendance data -->
    <div class="main-container">
        <!-- Form to select attendance date -->
        <form action="attendance.php" method="post">
            <div class="form-group">
                <label for="attendanceDate">Select Date:</label>
                <select class="form-control" id="attendanceDate" name="attendanceDate" required>
                    <option value="">Select Date</option>
                    <?php foreach ($uniqueDates as $date) { ?>
                        <option value="<?php echo $date; ?>"><?php echo $date; ?></option>
                    <?php } ?>
                </select>
            </div>
            <input type="submit" class="btn btn-primary" name="viewAttendance" value="View Attendance">
        </form>

        <div class="container mt-4">
            <!-- Your container content -->
            <!-- Display attendance data from database -->
            <div class="attendance-data-container">
                <?php
                // Display attendance data for the selected date
                if (isset($_POST['attendanceDate']) && !empty($attendanceData)) {
                    echo "<h2>Attendance for Date: $selectedDate</h2>";
                    foreach ($attendanceData as $data) {
                        $student = $data['student'];
                        $status = $data['status'];
        
                        echo "<div class='attendances-item'>
                                <span>$student:</span>
                                <span>$status</span>
                              </div>";
                    }
                } elseif (isset($_POST['attendanceDate']) && empty($attendanceData)) {
                    echo "<h2>No attendance data found for Date: $selectedDate</h2>";
                }
                ?>
            </div>
        </div>
    <!-- Add more containers as needed -->

    <!-- Form to update attendance -->
    <form action="process_attendance.php" method="post">
        <div class="form-group">
            <label for="attendanceDate">Date:</label>
            <input type="date" class="form-control" id="attendanceDate" name="attendanceDate" required>
        </div>
        <ul class="list-group">
            <!-- PHP loop to generate student list -->
            <?php
            $students = [
                "Leurcalliv, Aira", "Aldea, Alaiza", "Oliveros, Alexia", "Zapanta, Aliah", "Guzman, Alisheba AZ",
                "Anonuevo, Angela Mae Advincula", "Agunia, Apreal", "Velasquez, Carl Angelo", "Renzo, Carl ", "Conge, Cassandra",
                "Flores, Charlie Kin", "Cativo, Isabel Carla", "Sinforoso, Chesca", "Magpantay, Clark", "Marte, Danycha",
                "Gilbolingo, Desiree Yvonne", "Languido, Eleah ", "Elle Altarejos", "Ramos, Fionah Crizelle", "Ann, Hazel",
                "Omega, Jake French"
            ];
            foreach ($students as $student) {
                echo "<li class='list-group-item'>
                        <input type='hidden' name='student[]' value='$student'>
                        <label for='attendance_$student'>$student</label>
                        <input type='radio' id='present_$student' name='attendance_status[$student]' value='present'>
                        <label for='present_$student'>Present</label>
                        <input type='radio' id='late_$student' name='attendance_status[$student]' value='late'>
                        <label for='late_$student'>Late</label>
                        <input type='radio' id='absent_$student' name='attendance_status[$student]' value='absent' checked>
                        <label for='absent_$student'>Absent</label>
                    </li>";
            }
            ?>
        </ul>
        <input type="submit" class="btn btn-primary mt-3" name="submitAttendance" value="Submit Attendance">
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Function to update attendance data asynchronously
    function updateAttendance() {
        var formData = new FormData($('form')[0]);
        $.ajax({
            type: 'POST',
            url: 'process_attendance.php',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                $('#attendanceDataContainer').load(location.href + ' #attendanceDataContainer');
            }
        });
        return false; // Prevent the form from submitting in the traditional way
    }
</script>
</body>
</html>

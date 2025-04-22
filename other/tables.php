<?php
// Database connection details
$servername = "localhost";
$username = "id21990397_root";
$password = "@123456789CINq";
$dbname = "id21990397_rename";

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Fetch students data
$sql = "SELECT id, name, email, grade, section, mobile_phone, home_address, home_phone, age, religion, civil_status, birth_place, lrn FROM users WHERE role = 'student'";
$result = $conn->query($sql);
if ($result === false) {
  die("Error fetching students data: " . $conn->error);
}
$students = [];

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $students[] = $row;
  }
}

// Fetch teachers data
$teachers = [];
$sql = "SELECT id, name, email, grade, section, class_name FROM users WHERE role = 'teacher'";
$result = $conn->query($sql);
if ($result === false) {
  die("Error fetching teachers data: " . $conn->error);
}

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $teachers[] = $row;
  }
}

$conn->close();
?>

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

        .card-container:hover {
            transform: translateY(-5px);
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
        }

        .card-container:hover .btn-container {
            transform: scale(1.05);
        }

        .btn-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
            transition: all 0.3s ease;
        }

        footer {
            background-image: url('image/for_footer.jpg');
            border: none;
            border-radius: 0;
            margin-top: 2em;
            padding: 2em 0;
            color: #000000;
            text-align: center;
        }

        .ui.containers {
            background-image: url('image/for_footer.jpg');
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

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        .editable {
            background-color: #fffbe0;
        }
    </style>
</head>
<body>
    <header class="ui segment animate__animated animate__fadeInDown">
        <div class="ui container card-container parallax" data-aos="fade-up" data-aos-duration="2000">
            <h1 class="ui center aligned header">Manage Grades & Sections</h1>
            <nav>
                <ul>
                    <li><a href="dashboard.php" onclick="loadSection('dashboard')">Dashboard</a></li>
                    <li><a href="tables.php" onclick="loadSection('tables')">Tables</a></li>
                    <li><a href="manageStudents.php" onclick="loadSection('manageStudents')">Manage Students</a></li>
                    <li><a href="manageTeachers.php" onclick="loadSection('manageTeachers')">Manage Teachers</a></li>
                    <li><a href="manageCourses.php" onclick="loadSection('manageCourses')">Manage Courses</a></li>
                    <li><a href="index.php">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main class="ui container">
        <h2>STUDENTS TABLE</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Grade</th>
                    <th>Section</th>
                    <th>Mobile Number</th>
                    <th>Home Address</th>
                    <th>Home Phone</th>
                    <th>Age</th>
                    <th>Religion</th>
                    <th>Civil Status</th>
                    <th>Birth Place</th>
                    <th>LRN</th>
                </tr>
            </thead>
<tbody>
    <?php foreach ($students as $student): ?>
    <tr data-id="<?php echo htmlspecialchars($student['id'] ?? ''); ?>">
        <td><?php echo htmlspecialchars($student['id'] ?? ''); ?></td>
        <td contenteditable="true" class="editable"><?php echo htmlspecialchars($student['name'] ?? ''); ?></td>
        <td contenteditable="true" class="editable"><?php echo htmlspecialchars($student['email'] ?? ''); ?></td>
        <td contenteditable="true" class="editable"><?php echo htmlspecialchars($student['grade'] ?? ''); ?></td>
        <td contenteditable="true" class="editable"><?php echo htmlspecialchars($student['section'] ?? ''); ?></td>
        <td contenteditable="true" class="editable"><?php echo htmlspecialchars($student['mobile_phone'] ?? ''); ?></td>
        <td contenteditable="true" class="editable"><?php echo htmlspecialchars($student['home_address'] ?? ''); ?></td>
        <td contenteditable="true" class="editable"><?php echo htmlspecialchars($student['home_phone'] ?? ''); ?></td>
        <td contenteditable="true" class="editable"><?php echo htmlspecialchars($student['age'] ?? ''); ?></td>
        <td contenteditable="true" class="editable"><?php echo htmlspecialchars($student['religion'] ?? ''); ?></td>
        <td contenteditable="true" class="editable"><?php echo htmlspecialchars($student['civil_status'] ?? ''); ?></td>
        <td contenteditable="true" class="editable"><?php echo htmlspecialchars($student['birth_place'] ?? ''); ?></td>
        <td contenteditable="true" class="editable"><?php echo htmlspecialchars($student['lrn'] ?? ''); ?></td>
    </tr>
    <?php endforeach; ?>
</tbody>

        </table>
        <button onclick="saveChanges()">Save Changes</button>


        <h2>TEACHERS TABLE</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Grade</th>
                    <th>Section</th>
                    <th>Class Name</th>
                </tr>
            </thead>
           <tbody>
    <?php foreach ($teachers as $teacher): ?>
    <tr data-id="<?php echo htmlspecialchars($teacher['id'] ?? ''); ?>">
        <td><?php echo htmlspecialchars($teacher['id'] ?? ''); ?></td>
        <td contenteditable="true" class="editable"><?php echo htmlspecialchars($teacher['name'] ?? ''); ?></td>
        <td contenteditable="true" class="editable"><?php echo htmlspecialchars($teacher['email'] ?? ''); ?></td>
        <td contenteditable="true" class="editable"><?php echo htmlspecialchars($teacher['grade'] ?? ''); ?></td>
        <td contenteditable="true" class="editable"><?php echo htmlspecialchars($teacher['section'] ?? ''); ?></td>
        <td contenteditable="true" class="editable"><?php echo htmlspecialchars($teacher['class_name'] ?? ''); ?></td>
    </tr>
    <?php endforeach; ?>
</tbody>

        </table>
        <button class="ui button save-button" onclick="saveTeacherChanges()">Save Teachers</button>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    AOS.init();
    
function saveChanges() {
    let rows = document.querySelectorAll("tbody tr");
    rows.forEach(row => {
        let id = row.dataset.id;
        let name = row.children[1].innerText;
        let email = row.children[2].innerText;
        let grade = row.children[3].innerText;
        let section = row.children[4].innerText;
        let mobile_phone = row.children[5].innerText;
        let home_address = row.children[6].innerText;
        let home_phone = row.children[7].innerText;
        let age = row.children[8].innerText;
        let religion = row.children[9].innerText;
        let civil_status = row.children[10].innerText;
        let birth_place = row.children[11].innerText;
        let lrn = row.children[12].innerText;

        // Send the data to the server
        $.ajax({
            url: 'updateStudent.php',
            type: 'POST',
            data: {
                id: id,
                name: name,
                email: email,
                grade: grade,
                section: section,
                mobile_phone: mobile_phone,
                home_address: home_address,
                home_phone: home_phone,
                age: age,
                religion: religion,
                civil_status: civil_status,
                birth_place: birth_place,
                lrn: lrn
            },
            success: function(response) {
          console.log('Success:', response);
        },
        error: function(xhr, status, error) {
          console.error('Error updating record:', error);
        }
      });
    });
  }

    function saveTeacherChanges() {
        let rows = document.querySelectorAll("table#teachers-table tbody tr");
        rows.forEach(row => {
            let id = row.dataset.id;
            let name = row.children[1].innerText;
            let email = row.children[2].innerText;
            let grade = row.children[3].innerText;
            let section = row.children[4].innerText;
            let class_name = row.children[5].innerText;

            // Send the data to the server
            $.ajax({
                url: 'save_teacher.php',
                type: 'POST',
                data: {
                    id: id,
                    name: name,
                    email: email,
                    grade: grade,
                    section: section,
                    class_name: class_name
                },
                 success: function(response) {
        console.log('Success:', response);
      },
      error: function(xhr, status, error) {
        console.error('Error updating record:', error);
      }
    });
  });
}

    $("#email-search").autocomplete({
        source: [
            <?php
            // Generate a JavaScript array of email addresses for autocomplete suggestions
            $emailArray = [];
            foreach ($teachers as $teacher) {
                $emailArray[] = $teacher['email'];
            }
            echo '"' . implode('", "', $emailArray) . '"';
            ?>
        ],
        minLength: 1 // Minimum characters required before showing suggestions
    });

    // Search button click event
    $('#search-btn').click(function () {
        var searchText = $('#email-search').val().toLowerCase();
        $('table#teachers-table tbody tr').each(function () {
            var emailText = $(this).find('td:nth-child(3)').text().toLowerCase(); // Email is the third <td> element
            if (emailText.includes(searchText)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });
    </script>
</body>
</html>

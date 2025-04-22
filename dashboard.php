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

// Query to get student count
$sql = "SELECT COUNT(*) AS student_count FROM users WHERE role = 'student'";
$result = $conn->query($sql);
if ($result === false) {
  die("Error fetching student count: " . $conn->error);
}
$studentCount = ($result->num_rows > 0) ? $result->fetch_assoc()["student_count"] : 0;

// Query to get teacher count
$sql = "SELECT COUNT(*) AS teacher_count FROM users WHERE role = 'teacher'";
$result = $conn->query($sql);
if ($result === false) {
  die("Error fetching teacher count: " . $conn->error);
}
$teacherCount = ($result->num_rows > 0) ? $result->fetch_assoc()["teacher_count"] : 0;

// Fetch users with 'for_confirmation' status from the database
$usersForConfirmation = [];
$sql = "SELECT * FROM users WHERE role = 'for_confirmation'";
$result = $conn->query($sql);
if ($result === false) {
  die("Error fetching users for confirmation: " . $conn->error);
}

if ($result->num_rows > 0) {
    // Fetch data row by row
    while ($row = $result->fetch_assoc()) {
        // Add each row to the $usersForConfirmation array
        $usersForConfirmation[] = $row;
    }
} else {
    echo "No data found for users with 'for_confirmation' status!";
}

// Fetch students data
$sql = "SELECT id, name, email, grade, section FROM users WHERE role = 'student'";
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

// Fetch sessions data
$sessions = [];
$sql = "SELECT DISTINCT session_id FROM users WHERE session_id IS NOT NULL";
$result = $conn->query($sql);
if ($result === false) {
  die("Error fetching sessions data: " . $conn->error);
}

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $sessions[] = $row;
  }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.2/semantic.min.css">
  <title>CINQ ADMIN PANEL</title>
  <style>
    body {
      background-color: #f8f9fa;
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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

    .ui.cards .card {
      width: 100%;
      padding: 20px;
      margin-bottom: 20px;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .ui.grid .row {
      padding: 20px;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .ui.grid .row .column {
      padding: 10px;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .ui.modal {
      background-color: rgba(0, 0, 0, 0.5) !important;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    /* Custom styles for chart containers */
    .chart-container {
      padding: 2Opx;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .chart-container canvas {
      width: 80% !important;
      height: 250px !important;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    /* Custom styles for pie chart */
    .pie-chart-container {
      width: 25%;
      text-align: center;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .ui.card .header {
      margin-bottom: 1em;
    }

    /* Container Box */
    .container-box {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
    }

    /* Cards */
    .ui.card {
      width: 100%;
      margin-bottom: 20px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      transition: box-shadow 0.3s ease;
    }

    .ui.card:hover {
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .ui.card .content {
      padding: 20px;
    }

    .ui.card .header {
      font-size: 1.5rem;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .ui.card .description {
      font-size: 1rem;
      line-height: 1.4;
    }
    
    .ui.container.page-container {
  padding: 20px;
  background-color: #f4f4f4;
  border-radius: 8px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.ui.header {
  font-size: 2rem;
  color: #333;
  margin-bottom: 20px;
}

.ui.divided.items .item {
  padding: 20px;
  background-color: #fff;
  border-radius: 8px;
  box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
  margin-bottom: 20px;
}

.ui.divided.items .item .ui.image {
  margin-right: 20px;
}

.ui.divided.items .item .content .header {
  font-size: 1.5rem;
  color: #007bff;
}

.ui.divided.items .item .content .meta {
  font-size: 1rem;
  color: #666;
  margin-bottom: 10px;
}

.ui.divided.items .item .content .description {
  font-size: 1rem;
  color: #333;
  margin-bottom: 10px;
}

.ui.divided.items .item .content .extra .ui.buttons .button {
  margin-right: 10px;
}

.ui.divided.items .item .content .extra .ui.buttons .button.primary {
  background-color: #007bff;
  color: #fff;
}

.ui.divided.items .item .content .extra .ui.buttons .button.negative {
  background-color: #ff4d4d;
  color: #fff;
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
  <header class="bg-gradient-to-b from-blue-500 to-light-blue-300 text-white py-2">
    <h1>CINQ ADMIN PANEL</h1>
    <!-- Navigation Menu -->
    <nav>
      <ul>
        <li><a href="dashboard.php" onclick="loadSection('dashboard')">Dashboard</a></li>
        <li><a href="tables.php" onclick="loadSection('dashboard')">Tables</a></li>
        <li><a href="manageStudents.php" onclick="loadSection('manageStudents')">Manage Students</a></li>
        <li><a href="manageTeachers.php" onclick="loadSection('manageTeachers')">Manage Teachers</a></li>
        <li><a href="manageCourses.php" onclick="loadSection('manageCourses')">Manage Courses</a></li>
        <li><a href="index.php">Logout</a></li>
      </ul>
    </nav>
  </header>
  <br><br><br><br><br><br><br><br>
 
  <div class="container-box">
    <div class="ui container">
      <div class="ui four cards">
        <!-- Card 1: Total Students -->
        <div class="ui card">
          <div class="content">
            <div class="header">Total Students</div>
            <div class="description">
              <?php echo $studentCount; ?>
            </div>
          </div>
        </div>
        
        <!-- Card 2: Total Teachers -->
        <div class="ui card">
          <div class="content">
            <div class="header">Total Teachers</div>
            <div class="description">
              <?php echo $teacherCount; ?>
            </div>
          </div>
        </div>
        
        <!-- Card 3: Total Courses -->
        <div class="ui card">
          <div class="content">
            <div class="header">Total Courses</div>
            <div class="description">2</div>
          </div>
        </div>
        
        <!-- Card 4: Latest Activity -->
        <div class="ui card">
          <div class="content">
            <div class="header">Latest Activity</div>
            <div class="description">Sumulong day Event</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- User Confirmation Section -->
  <div class="ui container page-container">
    <h2>Users for Confirmation</h2>
    <div class="ui divided items" id="users-list">
      <?php foreach ($usersForConfirmation as $user): ?>
      <div class="item">
        <div class="content">
          <h3 class="header"><?php echo $user['name']; ?></h3>
          <div class="meta">
            <span>Email: <?php echo $user['email']; ?></span>
          </div>
          <div class="extra">
            <div class="ui buttons">
              <button class="ui button primary" onclick="changeRole('<?php echo $user['id']; ?>', 'teacher')">Make Teacher</button>
              <button class="ui button" onclick="changeRole('<?php echo $user['id']; ?>', 'student')">Make Student</button>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>


  <!-- Chart Section -->
  <div class="eight wide column">
    <div class="chart-container pie-chart-container">
      <h2 class="ui header">TEACHER AND STUDENT COUNT</h2>
      <canvas id="colorDistributionChart"></canvas>
    </div>
  </div>
  <!--Session container-->
    <div id="sessions" class="ui container page-container">
      <h2 class="ui header">Sessions</h2>
      <table class="ui celled table">
        <thead>
          <tr>
            <th>Session ID</th>
            <th>Role</th>
            <th>Name</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($sessions as $session): ?>
            <tr>
              <td data-label="Session ID"><?php echo $session['session_id']; ?></td>
              <td data-label="Role"><?php echo $session['role']; ?></td>
              <td data-label="Name"><?php echo $session['name']; ?></td>
                 <div>Session Deletion Countdown: <span id="sessionCountdown"></span></div>
        <div class="extra">
          <div class="ui buttons">
            <a href="delete_session.php?session_id=<?php echo urlencode($session['session_id']); ?>" class="ui button negative">Delete</a>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script>
   function changeRole(userId, newRole) {
    $.ajax({
      type: 'POST',
      url: 'change_role.php', // Replace with the actual change role script URL
      data: { id: userId, role: newRole },
      success: function (response) {
        alert('Role changed successfully!');
        location.reload(); // Refresh the page to reflect changes
      },
      error: function (xhr, status, error) {
        console.error(xhr.responseText);
      }
    });
  }

  // JavaScript to render the pie chart with PHP data
  const studentCount = <?php echo $studentCount; ?>;
  const teacherCount = <?php echo $teacherCount; ?>;

  function updateChart(studentCount, teacherCount) {
    const colorDistributionChart = new Chart(document.getElementById('colorDistributionChart'), {
      type: 'pie',
      data: {
        labels: ['Students', 'Teachers'],
        datasets: [{
          data: [studentCount, teacherCount],
          backgroundColor: ['red', 'blue']
        }]
      },
      options: {
        responsive: true
      }
    });
  }

  // Initialize chart on page load
  $(document).ready(function() {
    updateChart(studentCount, teacherCount);
  });

  function saveChanges() {
    let rows = document.querySelectorAll("tbody tr");
    rows.forEach(row => {
      let id = row.dataset.id;
      let name = row.children[1].innerText;
      let grade = row.children[3].innerText;
      let section = row.children[4].innerText;

      // Send the data to the server
      $.ajax({
        url: 'updateStudent.php',
        type: 'POST',
        data: {
          id: id,
          name: name,
          grade: grade,
          section: section
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

  async function deleteSession(id) {
    if (!confirm('Are you sure you want to delete this session?')) {
      return;
    }

    try {
      const response = await fetch('delete_session.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({ id: id })
      });

      if (!response.ok) {
        throw new Error('Network response was not ok');
      }

      const result = await response.json();
      if (result.success) {
        alert('Session deleted successfully!');
        location.reload();
      } else {
        alert('Failed to delete session.');
      }
    } catch (error) {
      console.error('There was a problem with the fetch operation:', error);
    }
  }

  function saveTeacherChanges() {
    let rows = document.querySelectorAll("table#teachers-table tbody tr");
    rows.forEach(row => {
      let id = row.dataset.id;
      let name = row.children[1].innerText;
      let email = row.children[2].innerText;
      let grade = row.children[3].innerText;
      let section = row.children[4].innerText;

      // Send the data to the server
      $.ajax({
        url: 'save_teacher.php',
        type: 'POST',
        data: {
          id: id,
          name: name,
          email: email,
          grade: grade,
          section: section
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

  function startCountdown(duration, display) {
    let timer = duration, minutes, seconds;
    setInterval(function () {
      minutes = parseInt(timer / 60, 10);
      seconds = parseInt(timer % 60, 10);

      minutes = minutes < 10 ? "6" + minutes : minutes;
      seconds = seconds < 10 ? "0" + seconds : seconds;

      display.textContent = minutes + ":" + seconds;

      if (--timer < 0) {
        timer = duration;
      }
    }, 1000);
  }

  // Function to calculate the remaining time until session deletion (1 hour)
  function calculateRemainingTime() {
    let now = new Date();
    let expiration = new Date(now.getTime() + 60 * 60 * 1000); // 1 hour from now

    return expiration;
  }

  // Function to initialize the countdown timer
  function initializeCountdown() {
    let display = document.querySelector('#sessionCountdown');
    let remainingTime = calculateRemainingTime();
    startCountdown(remainingTime.getSeconds(), display);
  }

  // Call the initializeCountdown function when the page loads
  document.addEventListener('DOMContentLoaded', function() {
    initializeCountdown();
  });
  
     $("#email-search").autocomplete({
        source: [
            <?php
            // Generate a JavaScript array of email addresses for autocomplete suggestions
            $emailArray = [];
            foreach ($teachers as $teacher) { // Update to target teachers
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

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

// Fetch students data
$sql = "SELECT id, name, email, grade, section FROM users WHERE role = 'student'";
$result = $conn->query($sql);
$students = [];

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $students[] = $row;
  }
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Students</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.2/semantic.min.css">
  <style>
    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      margin: 0;
      background-color: #f4f4f4;
    }

    .parallax {
      background: linear-gradient(to bottom, #007bff 0%, #87cefa 50%, #ffffff 100%);
      min-height: 250px; 
      background-attachment: fixed;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    nav {
      margin-top: 20px;
    }

    .ui.menu .item {
      color: #ffffff;
    }

    .ui.menu .item:hover {
      background-color: #286fb6;
    }

    .main-container {
      flex: 1;
      padding: 20px;
      background-color: #ffffff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
      margin-top: -100px;
      z-index: 1;
      position: relative;
    }

    footer {
      margin-top: 20px;
      padding: 20px;
      background-color: #007bff;
      color: #ffffff;
      text-align: center;
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
  <header class="ui inverted segment parallax">
    <div class="ui container">
      <h1 class="ui inverted header">Your Application</h1>
      <h2 class="ui inverted sub header">Manage your educational resources efficiently</h2>
    </div>
  

  <div class="ui inverted menu">
    <div class="ui container">
      <a href="dashboard.php" class="item">Dashboard</a>
      <a href="edit-student.php" class="item">Edit Students</a>
      <a href="manageStudents.php" class="item">Manage Students</a>
      <a href="manageTeachers.php" class="item">Manage Teachers</a>
      <a href="manageCourses.php" class="item">Manage Courses</a>
      <div class="right menu">
        <a href="index.php" class="item">Logout</a>
      </div>
    </div>
  </div>
  </header>
  <main>
    <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Grade</th>
        <th>Section</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($students as $student): ?>
        <tr data-id="<?php echo htmlspecialchars($student['id']); ?>">
          <td><?php echo htmlspecialchars($student['id']); ?></td>
          <td contenteditable="true" class="editable"><?php echo htmlspecialchars($student['name']); ?></td>
          <td><?php echo htmlspecialchars($student['email']); ?></td>
          <td contenteditable="true" class="editable"><?php echo htmlspecialchars($student['grade']); ?></td>
          <td contenteditable="true" class="editable"><?php echo htmlspecialchars($student['section']); ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <button onclick="saveChanges()">Save Changes</button><br>
  <button href="dashboard.php">back</button>
    </main>
    
      <footer class="ui inverted vertical segment">
    <div class="ui container">
      <p>© 2024 Your Company. All rights reserved.</p>
    </div>
  </footer>
  <script>
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
  </script>
</body>
</html>

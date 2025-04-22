<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Get data from POST request
    $name = $_POST['name'];
    $email = $_POST['email'];
    $class = $_POST['class']; // Assuming your form has a field named 'class'

   // Function to check if email already exists in the g12st1a table
function isEmailExists($conn, $email) {
    $checkSql = "SELECT * FROM g12st1a WHERE email = '$email'";
    // Debugging line
    $result = $conn->query($checkSql);
    return ($result->num_rows > 0);
}

    if (isEmailExists($conn, $email)) {
        $errorMessage = '<div class="ui negative message">Error: Email already exists in the database!</div>';
    } else {
        // SQL to insert data into the g12st1a table
        $sql = "INSERT INTO g12st1a (name, email, class) VALUES ('$name', '$email', '$class')";

        if ($conn->query($sql) === TRUE) {
            $successMessage = '<div class="ui positive message">Student added successfully!</div>';
        } else {
            $errorMessage = '<div class="ui negative message">Error: ' . $sql . "<br>" . $conn->error . '</div>';
        }
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student - Admin Panel</title>
    <!-- Semantic UI CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.2/semantic.min.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Custom CSS */
        body {
            background: #fff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }

        .ui.container {
            margin-top: 20px;
            background-color: linear-gradient(to right, #4d94ff, #66ccff);
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .ui.form .field input {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        .ui.form .field label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        .ui.form .field.error input {
            border-color: #e53935;
        }

        .ui.form .field.error label {
            color: #e53935;
        }

        .ui.message {
            margin-top: 10px;
        }

        .ui.message .header {
            font-weight: bold;
        }

        .ui.positive.message,
        .ui.negative.message {
            padding: 10px;
            border-radius: 4px;
        }

        .ui.positive.message {
            background-color: #d4edda;
            color: #244cbb;
            border-color: #c3e6cb;
        }

        .ui.negative.message {
            background-color: #f8d7da;
            color: #721c24;
            border-color: #f5c6cb;
        }

       .ghost-button {
  border: 2px solid #3550d6;
  color: #104bef;
  padding: 10px 24px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.ghost-button:hover {
  background-color: #2863d1;
  color: white;
}

.field {
  width: 200px;
  margin-left: 0 auto;
  padding: 20px;
}

label {
  display: block;
  margin-bottom: 10px;
  color: #000000;
  font-size: 18px;
}

.ui.dropdown {
  display: block;
  width: 100%;
  height: 35px;
  padding: 5px 10px;
  border-radius: 5px;
  border: 1px solid #287cfa;
  background: #f8f8f8;
  color: #333;
  font-size: 16px;
}

.ui.dropdown:focus {
  outline: none;
  border-color: #f4f4f4;
}

.ui.dropdown option {
  color: #333;
  background: #f8f8f8;
}

    </style>
</head>

<body>
    <div class="ui container">
        <h1 class="ui dividing header"></h1>
<h2>ADD STUDENT TO ST-1A </h2>
        <!-- Form to add a student -->
        <form class="ui form" method="POST">
            <div class="field">
                <label>Name</label>
                <input type="text" placeholder="Enter name" name="name">
            </div>
            <div class="field">
                <label>Email</label>
                <input type="email" placeholder="Enter email" name="email">
            </div>
           <div class="field">
  <label>Class</label>
  <select class="ui dropdown" name="class">
    <option value="">Select Class</option>
    <option value="ST-1A">ST-1A</option>
    <!-- Add more options if needed -->
  </select>
</div>
          <button class="ghost-button" type="submit">
  <i class="fas fa-check"></i> Submit
</button>
<br>
      <a href="g12st1a.php" class="ghost-button">
  <i class="fas fa-arrow-left"></i> Back
</a>

        <!-- Display success or error message -->
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($successMessage)) {
                echo $successMessage;
            } elseif (isset($errorMessage)) {
                echo $errorMessage;
            }
        }
        ?>
    </div>

    <!-- Semantic UI JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.2/semantic.min.js"></script>
</body>

</html>

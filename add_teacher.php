<?php
// Check if the request method is POST
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
    $subject = $_POST['subject'];
    $email = $_POST['email'];

    // Validate form fields
    if (empty($name) || empty($email) || empty($subject)) {
        $errorMessage = '<div class="ui negative message">Please fill in all fields.</div>';
    } else {
        // Check if email already exists in the database
        $checkEmailQuery = "SELECT * FROM teachers WHERE email = '$email'";
        $result = $conn->query($checkEmailQuery);
        if ($result->num_rows > 0) {
            $errorMessage = '<div class="ui negative message">Email already exists in the database.</div>';
        } else {
            // SQL to insert data into the database
            $sql = "INSERT INTO teachers (name, subject, email) VALUES ('$name', '$subject', '$email')";
            if ($conn->query($sql) === TRUE) {
                $successMessage = '<div class="ui positive message">Student added successfully!</div>';
            } else {
                $errorMessage = '<div class="ui negative message">Error: ' . $sql . "<br>" . $conn->error . '</div>';
            }
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
    <style>
        /* Custom CSS */
        body {
            background: linear-gradient(to right, #4d94ff, #66ccff);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }

        .ui.container {
            margin-top: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .ui.form .field input,
        .ui.form .field select {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        .ui.form .field label {
            margin-bottom: 5px;
            font-weight: bold;
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
            color: #155724;
            border-color: #c3e6cb;
        }

        .ui.negative.message {
            background-color: #f8d7da;
            color: #721c24;
            border-color: #f5c6cb;
        }

        .ui.primary.button {
            margin-top: 10px;
        }

        /* Updated style for dropdown options */
        .ui.selection.dropdown .menu .item {
            padding: 10px;
        }

        .ui.selection.dropdown .menu .item:hover {
            background-color: #f0f0f0;
        }

        .back-button {
            background-color: #2185d0;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 15px;
            text-transform: uppercase;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 50%; /* Set button width to 50% */
        }

        .back-button:hover {
            background-color: #0a63a5;
        }

        /* Updated style for submit button using Semantic UI */
        .submit-button {
            background-color: #2185d0;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 15px;
            text-transform: uppercase;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 50%; /* Set button width to 50% */
        }

        .submit-button:hover {
            background-color: #0a63a5;
        }

        /* Validation error message */
        .error-message {
            color: #e53935;
            margin-top: 5px;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="ui container">
        <h1 class="ui dividing header"></h1>

        <!-- Form to add a student -->
        <form class="ui form" method="POST" onsubmit="return validateForm()">
            <div class="field">
                <label>Name</label>
                <input type="text" placeholder="Enter name" name="name" id="name">
            </div>
            <div class="field">
                <label>Email</label>
                <input type="email" placeholder="Enter email" name="email" id="email">
            </div>
            <div class="field">
                <label>Subject</label>
                <select name="subject" id="subject">
                    <option value="">Select Subject</option>
                    <option value="General Biology 1">General Biology 1</option>
                    <option value="General Biology 2">General Biology 2</option>
                    <option value="General Physics 1">General Physics 2</option>
                    <option value="Work Immersion">Work Immersion</option>
                    <option value="Project Research">Project Research</option>
                    <option value="Practical Research 1">Practical Research 1</option>
                    <option value="Practical Research 2">Practical Research 2</option>
                </select>
            </div>
            <button class="ui primary button submit-button" type="submit">Submit</button>
            <br>
            <br>
            <a href="manageTeachers.php" class="ui primary button back-button">Back</a>
        </form>

        <!-- Display success or error message -->
        <?php
        if (isset($successMessage)) {
            echo $successMessage;
        } elseif (isset($errorMessage)) {
            echo $errorMessage;
        }
        ?>

        <!-- Semantic UI JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.2/semantic.min.js"></script>
        <script>
            function validateForm() {
                var name = document.getElementById('name').value;
                var email = document.getElementById('email').value;
                var subject = document.getElementById('subject').value;
                var isValid = true;

                // Reset error messages
                document.getElementById('nameError').innerHTML = '';
                document.getElementById('emailError').innerHTML = '';
                document.getElementById('subjectError').innerHTML = '';

                // Check if name is empty
                if (name.trim() === '') {
                    document.getElementById('nameError').innerHTML = 'Name is required';
                    isValid = false;
                }

                // Check if email is empty
                if (email.trim() === '') {
                    document.getElementById('emailError').innerHTML = 'Email is required';
                    isValid = false;
                }

                // Check if subject is empty
                if (subject.trim() === '') {
                    document.getElementById('subjectError').innerHTML = 'Subject is required';
                    isValid = false;
                }

                return isValid;
            }
        </script>
    </div>
</body>

</html>

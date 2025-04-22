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

// Check if POST data is set
if (isset($_POST['id'], $_POST['name'], $_POST['email'], $_POST['grade'], $_POST['section'], $_POST['mobile_phone'], $_POST['home_address'], $_POST['home_phone'], $_POST['age'], $_POST['religion'], $_POST['civil_status'], $_POST['birth_place'], $_POST['lrn'])) {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $grade = $_POST['grade'];
  $section = $_POST['section'];
  $mobile_phone = $_POST['mobile_phone'];
  $home_address = $_POST['home_address'];
  $home_phone = $_POST['home_phone'];
  $age = $_POST['age'];
  $religion = $_POST['religion'];
  $civil_status = $_POST['civil_status'];
  $birth_place = $_POST['birth_place'];
  $lrn = $_POST['lrn'];

  // Prepare and bind
  $stmt = $conn->prepare("UPDATE users SET name = ?, email = ?, grade = ?, section = ?, mobile_phone = ?, home_address = ?, home_phone = ?, age = ?, religion = ?, civil_status = ?, birth_place = ?, lrn = ? WHERE id = ?");
  $stmt->bind_param("sssssissssssi", $name, $email, $grade, $section, $mobile_phone, $home_address, $home_phone, $age, $religion, $civil_status, $birth_place, $lrn, $id);

  // Execute the statement
  if ($stmt->execute()) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . $stmt->error;
  }

  // Close statement
  $stmt->close();
} else {
  echo "Invalid input";
}

// Close connection
$conn->close();
?>

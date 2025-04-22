
<?php
$servername = "localhost";
$username = "root";
$password = "123456789CINq";
$database = "id21990397_rename";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

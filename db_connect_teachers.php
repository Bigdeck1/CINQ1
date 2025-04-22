<?php
$servername = "localhost";
$username = "root"; 
$password = "@123456789CINq";
$dbname = "id21990397_rename"; 

$conn_teachers = new mysqli($servername, $username, $password, $dbname);

if ($conn_teachers->connect_error) {
    die("Connection failed: " . $conn_teachers->connect_error);
}
?>

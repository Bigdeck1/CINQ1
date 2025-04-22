<?php
// PHP code to fetch and display posted activities 
$servername = "localhost";
$username = "root";
$password = "@123456789CINq";
$dbname = "id21990397_rename";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch activities from the database
$sql = "SELECT title, description, due_date, attachment FROM activities";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<div class='activity-item'>";
        echo "<h3>" . $row['title'] . "</h3>";
        echo "<p>Description: " . $row['description'] . "</p>";
        echo "<p>Due Date: " . $row['due_date'] . "</p>";
        echo "<a href='attachments/" . $row['attachment'] . "'>Download Attachment</a>";
        echo "</div>";
    }
} else {
    echo "No activities found";
}
$conn->close();
?>

<?php
session_start(); // Start session for user authentication

// Include database connection for activities
include_once 'db_connect_activities.php'; // Assuming db_connect_activities.php contains the connection details for activities database

// Define pagination variables
$limit = isset($_GET['limit']) ? $_GET['limit'] : 10; // Number of activities per page (default: 10)
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;

// Initialize search variables
$search = '';
$searchQuery = '';

// Check if search query is provided
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $searchQuery = "WHERE title LIKE '%$search%' OR description LIKE '%$search%'";
}

// Initialize sorting variables
$sortField = isset($_GET['sort']) ? $_GET['sort'] : 'due_date';
$sortOrder = isset($_GET['order']) ? $_GET['order'] : 'asc';
$validSortFields = ['title', 'due_date']; // Define valid sorting fields

// Validate sorting field
if (!in_array($sortField, $validSortFields)) {
    $sortField = 'due_date'; // Default to 'due_date' if invalid sorting field provided
}

// Validate sorting order
$sortOrder = ($sortOrder == 'asc') ? 'asc' : 'desc'; // Ensure valid sorting order

// SQL query to fetch activities with pagination, sorting, and search
$sql = "SELECT * FROM activities $searchQuery ORDER BY $sortField $sortOrder LIMIT $start, $limit";
$result = $conn->query($sql); // Using $conn from db_connect_activities.php

// Check if activities are found
if ($result) {
    if ($result->num_rows > 0) {
        // Output activities
        while ($row = $result->fetch_assoc()) {
            echo "<div class='activity-item'>";
            echo "<h3>" . $row['title'] . "</h3>";
            echo "<p>Description: " . $row['description'] . "</p>";
            echo "<p>Due Date: " . $row['due_date'] . "</p>";
            echo "<a href='attachments/" . $row['attachment'] . "'>Download Attachment</a>";
            echo "<a href='edit_activity.php?id=" . $row['id'] . "' class='btn btn-primary btn-sm'>Edit</a>";
            echo "<a href='delete_activity.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm'>Delete</a>";
            echo "</div>";
        }
    } else {
        echo "<p>No activities found</p>";
    }
} else {
    echo "<p>Error: " . $conn->error . "</p>"; // Display error if SQL query fails
}

// Pagination links
$totalPagesQuery = "SELECT COUNT(id) AS total FROM activities $searchQuery";
$totalPagesResult = $conn->query($totalPagesQuery);
$totalPagesRow = $totalPagesResult->fetch_assoc();
$totalPages = ceil($totalPagesRow["total"] / $limit);

echo "<nav aria-label='Page navigation'>";
echo "<ul class='pagination'>";
for ($i = 1; $i <= $totalPages; $i++) {
    $active = ($i == $page) ? "active" : "";
    echo "<li class='page-item $active'><a class='page-link' href='fetch_activities.php?page=$i&sort=$sortField&order=$sortOrder&search=$search&limit=$limit'>$i</a></li>";
}
echo "</ul>";
echo "</nav>";

// Close connection
$conn->close();
?>

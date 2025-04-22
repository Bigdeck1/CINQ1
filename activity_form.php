<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity Form</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/activitiform.css">
</head>
<body>
<div class="container">
    <div class="activity-form-container">
        <a class="back-button" href="stem1astudent.php">Back</a>
        <h2>Activity Form</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <label for="assignmentTitle">Assignment Title:</label><br>
            <input type="text" id="assignmentTitle" name="assignmentTitle" required><br>
            <label for="assignmentDescription">Assignment Description:</label><br>
            <textarea id="assignmentDescription" name="assignmentDescription" required></textarea><br>
            <label for="dueDate">Due Date:</label><br>
            <input type="date" id="dueDate" name="dueDate" required><br>
            <label for="fileUpload">Attach File:</label><br>
            <input type="file" id="fileUpload" name="fileUpload"><br><br>
            <input type="submit" value="Submit Assignment" class="btn btn-primary">
        </form>
    </div>

    <div class="activity-list-container">
        <h2>Posted Activities</h2>
        <?php include 'fetch_activities.php'; ?>
        <!-- Example activity items (replace with dynamic PHP code above) -->
        <div class="activity-item">
            <h3>Assignment Title 1</h3>
            <p>Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            <p>Due Date: 2024-03-15</p>
            <a href="#">Download Attachment</a>
        </div>
        <div class="activity-item">
            <h3>Assignment Title 2</h3>
            <p>Description: Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <p>Due Date: 2024-03-18</p>
            <a href="#">Download Attachment</a>
        </div>
        <!-- Add more activity items as needed -->
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

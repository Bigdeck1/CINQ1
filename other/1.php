
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLASSES</title>
    <link rel="stylesheet" href="css/TC.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .profile-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }
        
        .bg-dark {
            background: linear-gradient(to bottom, #007bff 0%, #87cefa 50%, #ffffff 100%); 
        }
        
        .navbar-dark .navbar-nav .nav-link {
            color: rgb(0 0 0);
        }
    </style>
</head>
<body>

<!-- Bootstrap navbar -->
<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
        <img src="image/stem1.png" width="90" height="20" class="d-inline-block align-top" alt="Logo">
    </a>
    <div class="navbar-nav ml-auto">
        <!-- Profile Image and Link -->
        <a class="nav-item nav-link" href="tcProfile.php">
            <img src="image/scas.jpg" class="profile-img" alt="Profile Image">
        </a>
        <a class="nav-item nav-link" href="login.php">Logout</a>
    </div>
</nav>

<div class="container mt-4">

<!-- Bootstrap card deck -->
<div class="card-deck">
    <!-- PHP Loop to generate card for each class -->
    <?php if ($result->num_rows > 0) : ?>
        <?php while ($row = $result->fetch_assoc()) : ?>
            <div class="card">
                <a href="view_class.php?id=<?= htmlspecialchars($row["id"]) ?>" class="container-link">
                    <img class="card-img-top avatar" src="image/scas.jpg" alt="Avatar">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?= htmlspecialchars($row["class_name"]) ?></h5>
                        <?php
                        // Check if grade and section are set and not empty
                        if (isset($row["grade"]) && isset($row["section"]) && !empty($row["grade"]) && !empty($row["section"])) {
                            $grade = $conn->real_escape_string($row["grade"]);
                            $section = $conn->real_escape_string($row["section"]);

                            // Query to fetch users with the same grade and section
                            $usersSql = "SELECT name FROM users WHERE grade = '$grade' AND section = '$section'";
                            $usersResult = $conn->query($usersSql);

                            if ($usersResult && $usersResult->num_rows > 0) {
                                echo "<p>Students Enrolled in Grade $grade, Section $section:</p>";
                                echo "<ul>";
                                while ($userRow = $usersResult->fetch_assoc()) {
                                    echo "<li>" . htmlspecialchars($userRow['name']) . "</li>";
                                }
                                echo "</ul>";
                            } else {
                                echo "<p>No students enrolled</p>";
                            }
                        } else {
                            echo "<p>Grade or Section information is missing</p>";
                        }
                        ?>
                    </div>
                </a>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
</div><!-- End of card deck -->


</div><!-- End of container -->

<!-- Create Class Button -->
<div class="container mt-4">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createClassModal">
        Create Class
    </button>
</div>

<!-- Add Class Modal -->
<div class="modal fade" id="createClassModal" tabindex="-1" role="dialog" aria-labelledby="createClassModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createClassModalLabel">Create Class</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="createClassForm" action="create_class.php" method="post">
                    <div class="form-group">
                        <label for="className">Class Name:</label>
                        <input type="text" class="form-control" id="className" name="className" required>
                    </div>
                    <div class="form-group">
                        <label for="grade">Grade:</label>
                        <select class="form-control" id="grade" name="grade" required>
                            <option value="">Select Grade</option>
                            <?php foreach ($gradesSections as $gs) : ?>
                                <option value="<?= htmlspecialchars($gs['grade']) ?>"><?= htmlspecialchars($gs['grade']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="section">Section:</label>
                        <select class="form-control" id="section" name="section" required>
                            <option value="">Select Section</option>
                            <?php foreach ($gradesSections as $gs) : ?>
                                <option value="<?= htmlspecialchars($gs['section']) ?>"><?= htmlspecialchars($gs['section']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="studentsEmails">Students' Emails (comma-separated):</label>
                        <textarea class="form-control" id="studentsEmails" name="studentsEmails" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap and jQuery JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Script to handle avatar upload -->
<script src="js/avatar_upload.js"></script>

</body>
</html>

<?php
// Close connection
$conn->close();
?>

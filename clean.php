<?php
// Check if a file was uploaded
if (isset($_FILES['fileToUpload'])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES['fileToUpload']['name']);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file is an allowed type (for example, only allow text files for simplicity)
    if ($fileType != "txt") {
        echo "Sorry, only TXT files are allowed.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, the file already exists.";
        $uploadOk = 0;
    }

    // Check file size (limit to 1MB for demonstration)
    if ($_FILES['fileToUpload']['size'] > 1000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Upload file if everything is okay
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)) {
            // Perform malware detection (dummy example - replace with your actual malware detection logic)
            $fileContent = file_get_contents($target_file);
            if (strpos($fileContent, 'malware') !== false) {
                echo "File is infected with malware.";
            } else {
                echo "File is clean.";
            }
            unlink($target_file); // Remove uploaded file after scanning (optional)
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
} else {
    echo "No file uploaded.";
}
?>

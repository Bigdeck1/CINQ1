<?php
session_start();

// Check if the user is not logged in or session data is missing
if (!isset($_SESSION['username']) || !isset($_SESSION['hashedPassword']) || !isset($_SESSION['email']) || !isset($_SESSION['otp'])) {
    header("Location: register.php");
    exit;
}

// Initialize variables
$username = $_SESSION['username'];
$hashedPassword = $_SESSION['hashedPassword'];
$email = $_SESSION['email'];
$otp = $_SESSION['otp'];
$verificationError = "";

// Check if the form is submitted for OTP verification
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $enteredOTP = $_POST['otp'];

    // Check if entered OTP matches the generated OTP
    if ($enteredOTP == $otp) {
        // OTP matched, register the user in the database
        // Your database insertion code here...

        // Unset session variables
        unset($_SESSION['username']);
        unset($_SESSION['hashedPassword']);
        unset($_SESSION['email']);
        unset($_SESSION['otp']);

        // Redirect user to a success page or dashboard
        header("Location: registration_success.php");
        exit;
    } else {
        $verificationError = "Invalid OTP. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">Email Verification</h2>
                    </div>
                    <div class="card-body">
                        <p>Please check your email for the OTP and enter it below to verify your email address.</p>
                        <?php if (!empty($verificationError)) { ?>
                            <div class="alert alert-danger"><?php echo $verificationError; ?></div>
                        <?php } ?>
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <div class="form-group">
                                <label for="otp">Enter OTP:</label>
                                <input type="text" class="form-control" id="otp" name="otp" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Verify Email</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

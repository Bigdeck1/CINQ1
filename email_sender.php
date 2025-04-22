<?php

// include PHPMailer autoload file
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require_once __DIR__ . '/composer/autoload_real.php';

return ComposerAutoloaderInitabcd1234::getLoader();

// Function to send OTP email
function sendOTPEmail($email, $otp) {
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'officialcinq1@gmail.com'; // Your Gmail email
        $mail->Password   = '090123CINQ';  // Your Gmail password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom('your@gmail.com', 'Your Name');
        $mail->addAddress($email);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Your One-Time Password (OTP)';
        $mail->Body    = 'Your OTP is: ' . $otp;

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

// Generate random OTP
function generateOTP() {
    return rand(100000, 999999);
}
?>
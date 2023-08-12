<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    
    // Generate a confirmation token (you would need your own logic for this)
    $confirmation_token = generateToken();

    // Send confirmation email
    $to = $email;
    $subject = "Confirmation Email";
    $message = "Click the link below to confirm your registration:\n";
    $message .= "https://relearns.vercel.app/confirm.php?token=$confirmation_token";
    $headers = "From: faizulha2003@gmail.com";

    if (mail($to, $subject, $message, $headers)) {
        echo "Confirmation email sent. Please check your inbox.";
    } else {
        echo "Failed to send confirmation email.";
    }
}
?>

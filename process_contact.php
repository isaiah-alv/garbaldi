<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Set up the email parameters
    $to = "locoistaco84@gmail.com";  // Replace with your email address
    $subject = "New Contact Form Submission";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Compose the email body
    $email_body = "Name: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Message:\n$message";

    // Send the email
    $mailResult = mail($to, $subject, $email_body, $headers);

    if ($mailResult) {
        // Display a thank you message
        echo "<h2>Thank you for your message, $name!</h2>";
        echo "<p>We will get back to you at $email as soon as possible.</p>";
    } else {
        echo "<p>Failed to send the email. Please try again later.</p>";
    }
}
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form inputs and sanitize them
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Set up email details
    $to = "victorosunrinde@gmail.com"; // Replace with your email address
    $subject = "New Contact Form Submission";
    $body = "You have received a new message:\n\n" .
            "Name: $name\n" .
            "Email: $email\n\n" .
            "Message:\n$message";

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "<p>Message sent successfully! We'll get back to you shortly.</p>";
    } else {
        echo "<p>Failed to send the message. Please try again later.</p>";
    }
} else {
    echo "<p>Invalid request method.</p>";
}
?>
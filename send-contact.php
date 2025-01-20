<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate form data
    $name = filter_var(trim($_POST["YourName"]), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST["EmailID"]), FILTER_SANITIZE_EMAIL);
    $subject = filter_var(trim($_POST["subject"]), FILTER_SANITIZE_STRING);
    $message = filter_var(trim($_POST["message"]), FILTER_SANITIZE_STRING);

    // Check if email is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }

    // Email settings
    $to = "officialibiks@gmail.com";  // Replace with your email address
    $from = $email;  // The sender's email address
    $headers = "From: " . $from . "\r\n";
    $headers .= "Reply-To: " . $from . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Email body
    $email_subject = "New Message from " . $name . " - " . $subject;
    $email_body = "<html><body>";
    $email_body .= "<h2>Message Details</h2>";
    $email_body .= "<p><strong>Name:</strong> " . $name . "</p>";
    $email_body .= "<p><strong>Email:</strong> " . $email . "</p>";
    $email_body .= "<p><strong>Subject:</strong> " . $subject . "</p>";
    $email_body .= "<p><strong>Message:</strong><br>" . nl2br($message) . "</p>";
    $email_body .= "</body></html>";

    // Send email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "Thank you for reaching out! We'll get back to you soon.";
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }
}
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['YourName']);
    $email = htmlspecialchars($_POST['EmailID']);
    $phone = htmlspecialchars($_POST['Phone']);
    $plan = htmlspecialchars($_POST['Plan']);

    $to = "officialibiks@gmail.com"; // Replace with your email address
    $subject = "New Plan Selection";
    $message = "
        Name: $name\n
        Email: $email\n
        Phone: $phone\n
        Selected Plan: $plan
    ";
    $headers = "From: no-reply@yourdomain.com";

    if (mail($to, $subject, $message, $headers)) {
        echo "Thank you! Your plan selection has been submitted.";
    } else {
        echo "Sorry, there was an error sending your submission. Please try again.";
    }
} else {
    echo "Invalid request method.";
}
?>

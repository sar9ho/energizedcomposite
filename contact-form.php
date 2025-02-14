<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize user inputs
    $firstName = htmlspecialchars(strip_tags(trim($_POST['firstName'])));
    $lastName = htmlspecialchars(strip_tags(trim($_POST['lastname'])));
    $email = filter_var($_POST['fromEmail'], FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars(strip_tags(trim($_POST['phoneNumber'])));
    $message = htmlspecialchars(strip_tags(trim($_POST['comments'])));

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }

    // Email details
    $to = "sar9h.ouda@gmail.com";
    $subject = "New Contact Form Submission from $firstName $lastName";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    $body = "Name: $firstName $lastName\n";
    $body .= "Email: $email\n";
    $body .= "Phone: $phone\n\n";
    $body .= "Message:\n$message\n";

    // Send email
    if (mail($to, $subject

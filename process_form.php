<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data using the POST method
    $name = $_POST['name'] ?? 'N/A';
    $email = $_POST['email'] ?? 'N/A';
    $phone = $_POST['phone'] ?? 'N/A';
    $subject = $_POST['subject'] ?? 'N/A';
    $message = $_POST['message'] ?? 'N/A';

    // Sanitize data
    $name = htmlspecialchars(trim($name));
    $email = htmlspecialchars(trim($email));
    $phone = htmlspecialchars(trim($phone));
    $subject = htmlspecialchars(trim($subject));
    $message = htmlspecialchars(trim($message));

    // Basic email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("<h2>Invalid Email Address</h2>");
    }

    // Display the submitted data
    echo "<h1>Thank You for Contacting Us!</h1>";
    echo "<h2>Your Details:</h2>";
    echo "<table border='1' cellpadding='10' cellspacing='0'>";
    echo "<tr><th>Field</th><th>Value</th></tr>";
    echo "<tr><td>Name</td><td>" . $name . "</td></tr>";
    echo "<tr><td>Email</td><td>" . $email . "</td></tr>";
    echo "<tr><td>Phone</td><td>" . $phone . "</td></tr>";
    echo "<tr><td>Subject</td><td>" . $subject . "</td></tr>";
    echo "<tr><td>Message</td><td>" . nl2br($message) . "</td></tr>";
    echo "</table>";

    // (Optional) Send the data via email
    /*
    $to = "your_email@example.com"; // Replace with your email address
    $email_subject = "New Contact Us Message: " . $subject;
    $email_body = "Name: $name\nEmail: $email\nPhone: $phone\nMessage:\n$message";
    $headers = "From: $email";

    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "<p>Email sent successfully!</p>";
    } else {
        echo "<p>Failed to send email. Please try again later.</p>";
    }
    */
} else {
    echo "<h2>No form data received.</h2>";
}
?>

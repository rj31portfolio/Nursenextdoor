<?php
// Set the recipient email address
$to = 'info@gurujihealthcare.ca';

// Get form fields
$name    = isset($_POST['form_name']) ? strip_tags(trim($_POST['form_name'])) : '';
$email   = isset($_POST['form_email']) ? filter_var(trim($_POST['form_email']), FILTER_SANITIZE_EMAIL) : '';
$subject = isset($_POST['form_subject']) ? strip_tags(trim($_POST['form_subject'])) : 'Contact Form Submission';
$phone   = isset($_POST['form_phone']) ? strip_tags(trim($_POST['form_phone'])) : '';
$message = isset($_POST['form_message']) ? strip_tags(trim($_POST['form_message'])) : '';

// Validate fields
if (empty($name) || empty($email) || empty($message)) {
    http_response_code(400);
    echo "Please fill in all required fields.";
    exit;
}
// Build the email content
$email_content  = "Name: $name\n";
$email_content .= "Email: $email\n";
$email_content .= "Phone: $phone\n";
$email_content .= "Subject: $subject\n";
$email_content .= "Message:\n$message\n";

// Email headers
$headers  = "From: $name <$email>\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// Send the email
if (mail($to, $subject, $email_content, $headers)) {
    http_response_code(200);
    echo "Your message has been sent successfully.";
} else {
    http_response_code(500);
    echo "Something went wrong. Please try again later.";
}
?>



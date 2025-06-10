<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "info.viraladsmedia@gmail.com"; // Replace with your email
    $subject = "New Form Submission - Talk To An Expert";

    $message = "You have received a new submission:\n\n";
    $message .= "First Name: " . htmlspecialchars($_POST["first_name"]) . "\n";
    $message .= "Last Name: " . htmlspecialchars($_POST["last_name"]) . "\n";
    $message .= "Mobile: " . htmlspecialchars($_POST["mobile"]) . "\n";
    $message .= "Email: " . htmlspecialchars($_POST["email"]) . "\n";
    $message .= "Address: " . htmlspecialchars($_POST["address"]) . "\n";
    $message .= "City: " . htmlspecialchars($_POST["city"]) . "\n";
    $message .= "State: " . htmlspecialchars($_POST["state"]) . "\n";
    $message .= "ZIP Code: " . htmlspecialchars($_POST["zip"]) . "\n";
 
    $headers = "From: no-reply@gurujihealthcare.com\r\n";
    $headers .= "Reply-To: " . $_POST["email"] . "\r\n";

    if (mail($to, $subject, $message, $headers)) {
        echo "success";
    } else {
        echo "fail";
    }
}
?>
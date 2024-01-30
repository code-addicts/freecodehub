<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $message = $_POST["message"];

    // Construct email message
    $to = "pawansuthar310@gmail.com"; // Replace with your email address
    $subject = "New Contact Form Submission";
    $body = "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Mobile: $mobile\n";
    $body .= "Message: $message\n";
    $headers = "From: $email";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo json_encode(array("status" => "success", "message" => "Thank you! Your message has been sent."));
    } else {
        $error = error_get_last();
        echo json_encode(array("status" => "error", "message" => "Oops! Something went wrong. Please try again later.", "error" => $error));
    }
} else {
    echo json_encode(array("status" => "error", "message" => "Invalid request method."));
}
?>

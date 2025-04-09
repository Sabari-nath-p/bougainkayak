
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$errorMSG = "";

// Validate Name
if (empty($_POST["name"])) {
    $errorMSG .= "Name is required. ";
} else {
    $name = htmlspecialchars($_POST["name"]);
}

// Validate Email
if (empty($_POST["email"])) {
    $errorMSG .= "Email is required. ";
} elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    $errorMSG .= "Invalid email format. ";
} else {
    $email = $_POST["email"];
}

// Validate Message
if (empty($_POST["message"])) {
    $errorMSG .= "Message is required. ";
} else {
    $message = htmlspecialchars($_POST["message"]);
}

// Validate Terms
if (!isset($_POST["terms"])) {
    $errorMSG .= "You must accept the terms. ";
}

if (empty($errorMSG)) {
    $EmailTo = "nandhudevanand4419@gmail.com"; // Your email
    $Subject = "New message from Bougain Kayak";

    // Email Body
    $Body = "Name: $name\n";
    $Body .= "Email: $email\n";
    $Body .= "Message: $message\n";

    // Email Headers
    $headers = "From: no-reply@gmail.com\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Send Mail
    $success = mail($EmailTo, $Subject, $Body, $headers);

    if ($success) {
        echo "success";
    } else {
        echo "Mail sending failed!";
    }
} else {
    echo $errorMSG;
}
?>

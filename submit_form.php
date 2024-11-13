<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'portfolio_db');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Basic form validation
    if (!empty($name) && !empty($email) && !empty($message)) {
        // Insert form data into the database
        $sql = "INSERT INTO contact_form (name, email, message) VALUES ('$name', '$email', '$message')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Message sent successfully!";
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Please fill in all fields.";
    }
}

$conn->close();
?>

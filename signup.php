<?php
// Database connection
$conn = new mysqli("localhost", "root", '', "covid");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted




// Get form data
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
// Add other necessary fields

// Perform data validations

// Check if username is already taken
$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "Username already taken";
} else {
    // Insert new user into the database
    $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
    if ($conn->query($sql) === TRUE) {
        echo "User registered successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>

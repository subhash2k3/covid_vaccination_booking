<?php
// Start session
session_start();

// Database connection
$conn = new mysqli("localhost", "root", "", "covid");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$username = $_POST['username'];
$password = $_POST['password'];

// Perform admin authentication
if ($username === 'admin' && $password === 'admin') {
    // Admin authenticated, set session variable
    $_SESSION['admin'] = $username;
    header("Location: admin_dashboard.php"); // Redirect to the admin dashboard
} else {
    // Invalid username or password
    $_SESSION['admin_error'] = "Invalid username or password";
    header("Location: admin_login.html"); // Redirect back to the admin login page
}

// Close the connection
$conn->close();
?>

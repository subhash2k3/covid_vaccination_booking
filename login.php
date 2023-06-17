<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "covid");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$username = $_POST['username'];
$password = $_POST['password'];

// Prepare the SQL statement with parameterized query
$sql = "SELECT * FROM users WHERE username=? AND password=?";
$stmt = $conn->prepare($sql);

if ($stmt) {
    // Bind the parameters
    $stmt->bind_param("ss", $username, $password);

    // Execute the query
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // User authenticated, set session variable
        $_SESSION['user'] = $username;
        header("Location: user_dashboard.html"); // Redirect to the user dashboard
    } else {
        echo "Invalid username or password";
    }

    // Close the statement
    $stmt->close();
} else {
    echo "Failed to prepare the statement";
}

// Close the connection
$conn->close();
?>

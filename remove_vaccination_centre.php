<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "covid");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$centre_id = $_POST['centerId'];

// Delete vaccination center from the database
$sql = "DELETE FROM vaccination_centers WHERE id='$centre_id'";
if ($conn->query($sql) === TRUE) {
    echo "Vaccination Centre removed successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>

<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "covid");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$address = $_POST['address'];
$working_hours = $_POST['working_hours'];

// Insert new vaccination centre into the database
$sql = "INSERT INTO vaccination_centers (name, address, working_hours) VALUES ('$name', '$address', '$working_hours')";

if ($conn->query($sql) === TRUE) {
    $message = "Vaccination Centre added successfully";
} else {
    $message = "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Vaccination Centre</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 40px;
            background-color: #fff;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }

        p {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Add Vaccination Centre</h1>

        <?php
        if (isset($message)) {
            echo "<p>$message</p>";
        }
        ?>

        <a href="admin_dashboard.php">Go back to Admin Dashboard</a>
    </div>
</body>
</html>

<?php
if (isset($_GET['address'])) {
    $searchQuery = $_GET['address'];

    // Database connection
    $conn = new mysqli("localhost", "root", "", "covid");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Perform search
    $sql = "SELECT * FROM vaccination_centers WHERE address LIKE '%$searchQuery%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Display search results
        while ($row = $result->fetch_assoc()) {
            echo "Vaccination Centre: " . $row['name'] . "<br>";
            echo "Address: " . $row['address'] . "<br>";
            echo "Working Hours: " . $row['working_hours'] . "<br>";

            // Booking form
            echo '<form action="apply.html" method="POST">';
            echo '<input type="hidden" name="center" value="' . $row['name'] . '">';
            echo '<input type="hidden" name="user_id" value="123">';
            echo '<button type="submit">Book Slot</button>';
            echo '</form>';

            echo "<br>";
        }
    } else {
        echo "No vaccination centers found for the given address.";
    }

    // Close the connection
    $conn->close();
} else {
    echo "Address parameter is missing.";
}
?>

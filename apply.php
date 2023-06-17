<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['center']) && isset($_POST['user_id'])) {
    $center = $_POST['center'];
    $user_id = $_POST['user_id'];

    // Database connection
    $conn = new mysqli("localhost", "root", "", "covid");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the user has already booked a slot for the selected center
    $checkQuery = "SELECT * FROM vaccination_slots WHERE center = '$center' AND user_id = '$user_id'";
    $checkResult = $conn->query($checkQuery);

    if ($checkResult->num_rows > 0) {
        echo "You have already booked a slot for this vaccination center.";
    } else {
        // Check if the maximum number of slots (10) for the center has been reached
        $slotCountQuery = "SELECT COUNT(*) AS slot_count FROM vaccination_slots WHERE center = '$center'";
        $slotCountResult = $conn->query($slotCountQuery);

        if ($slotCountResult && $slotCountResult->num_rows > 0) {
            $row = $slotCountResult->fetch_assoc();
            $slotCount = $row['slot_count'];

            if ($slotCount < 10) {
                // Insert the booking into the database
                $insertQuery = "INSERT INTO vaccination_slots (center, user_id, created_at) VALUES ('$center', '$user_id', NOW())";
                if ($conn->query($insertQuery) === TRUE) {
                    echo "Vaccination slot booked successfully.";
                    exit; // Stop the script execution after displaying the success message
                } else {
                    echo "Error booking the vaccination slot: " . $conn->error;
                }
            } else {
                echo "Sorry, all slots for this vaccination center have been filled.";
            }
        }
    }

    // Close the connection
    $conn->close();
} else {
    echo "Invalid request.";
}
?>

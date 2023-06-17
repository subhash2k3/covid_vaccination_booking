<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
</head>
<body>
    <?php
    session_start();

    // Check if the user is logged in
    if (isset($_SESSION['user_id'])) {
        // Display welcome message
        $username = $_SESSION['username'];
        echo "<h1>Welcome, $username!</h1>";

        // Display buttons
        echo '<button onclick="location.href=\'search_vaccination_center.php\'">Searching for Vaccination Centre</button>';
        echo '<button onclick="location.href=\'apply_for_slot.php\'">Apply for a Vaccination Slot</button>';
        echo '<button onclick="location.href=\'logout.php\'">Logout</button>';
    } 
    ?>
</body>
</html>

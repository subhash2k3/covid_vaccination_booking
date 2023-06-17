<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
</head>
<body>
    <h1>Welcome User</h1>

    <!-- Search Vaccination Center -->
    <h2>Search Vaccination Center</h2>
    <form action="search_vaccination_center.php" method="POST">
        <label for="search_query">Search:</label>
        <input type="text" name="search_query" required>
        <button type="submit">Search</button>
    </form>

    <!-- Apply for Vaccination Slot -->
    <h2>Apply for Vaccination Slot</h2>
    <form action="apply_vaccination_slot.php" method="POST">
        <label for="user_id">User ID:</label>
        <input type="text" name="user_id" required><br>
        <label for="vaccination_center_id">Vaccination Center ID:</label>
        <input type="text" name="vaccination_center_id" required><br>
        <button type="submit">Apply</button>
    </form>

    <!-- Logout -->
    <h2>Logout</h2>
    <a href="logout.php">Logout</a>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
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

        h1, h2 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 12px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        button[type="submit"] {
            padding: 12px;
            font-size: 14px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        .dosage-details {
            margin-top: 20px;
        }

        .dosage-details p {
            margin: 0;
        }

        .logout {
            text-align: right;
            margin-top: -45px;
        }

        .logout a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }

        .logout a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logout">
            <a href="index.php">Logout</a>
        </div>
        <h1>Welcome Admin</h1>

        <!-- Add Vaccination Centres -->
        <h2>Add Vaccination Centre</h2>
        <form action="add_vaccination_centre.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" name="name" required>
            <label for="address">Address:</label>
            <input type="text" name="address" required>
            <label for="working_hours">Working Hours:</label>
            <input type="text" name="working_hours" required>
            <button type="submit">Add Centre</button>
            <button type="button" class="remove-centre" onclick="location.href='remove_vaccination_centre.html'">Remove Centre</button>

        </form>

        <!-- Dosage Details -->
        <h2>Dosage Details</h2>
        <div class="dosage-details">
            <?php
            // Database connection
            $conn = new mysqli("localhost", "root", "", "covid");

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch dosage details grouped by centres
            $sql = "SELECT vaccination_centers.name, COUNT(*) AS dosage_count FROM vaccination_centers
                    INNER JOIN vaccination_slots ON vaccination_centers.id = vaccination_slots.center
                    GROUP BY vaccination_centers.id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<p>{$row['name']}: {$row['dosage_count']} dosages administered</p>";
                }
            } else {
                echo "<p>No dosage details available</p>";
            }

            // Close the connection
            $conn->close();
            ?>
        </div>
    </div>
</body>
</html>

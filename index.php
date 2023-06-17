<!DOCTYPE html>
<html>
<head>
    <title>COVID Vaccination Booking</title>
    <style>
        body {
            background: linear-gradient(45deg, #FF9D6C, #FF6C8C, #C468FF);
            background-size: 400% 400%;
            animation: gradientAnimation 10s ease infinite;
        }

        @keyframes gradientAnimation {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .container {
            display: flex;
            align-items: flex-start;
            margin-top: 50px;
            color: #fff;
        }

        .sidebar {
            width: 200px;
            background-color: #333;
            padding: 20px;
            margin-right: 20px;
        }

        .sidebar h2 {
            margin-bottom: 10px;
        }

        .content {
            flex: 1;
            text-align: center;
        }

        .container h1 {
            margin-bottom: 20px;
        }

        .container .dropdown {
            display: inline-block;
            margin-right: 10px;
        }

        .container .dropdown select {
            padding: 10px 20px;
            font-size: 18px;
            background-color: #fff;
            color: #333;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .container .login-button {
            display: inline-block;
        }

        .container .login-button button {
            padding: 10px 20px;
            font-size: 18px;
            background-color: #FF6C8C;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .container p {
            margin-top: 50px;
            font-size: 16px;
            line-height: 1.5;
        }

        .container table {
            margin: 0 auto;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .container table th,
        .container table td {
            padding: 8px;
            border: 1px solid #fff;
        }

        .container table th {
            font-weight: bold;
        }

        .container table td.highlight {
            color: #fff;
            font-weight: bold;
        }

        .lower-bar {
            background-color: #333;
            padding: 10px;
            text-align: center;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            color: #fff;
            font-size: 14px;
        }

        .lower-bar a {
            color: #fff;
            text-decoration: underline;
        }

        /* Clock font style */
        .clock-font {
            font-family: 'Courier New', Courier, monospace;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <h2>Vaccinated Population</h2>
            <p id="vaccinated-count" class="clock-font">0</p>
            
            <p id="your-turn">Next is your turn</p>
        </div>
        <div class="content">
            <h1>Welcome to COVID Vaccination Booking</h1>
            <div class="dropdown">
                <select id="user-type">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <div class="login-button">
                <button id="login-button">Sign In</button>
            </div>
            <p>Here are some important measures to follow during vaccination:</p>
            <table>
                <tr>
                    <th>Measures</th>
                </tr>
                <tr>
                    <td>Wear a mask at all times.</td>
                </tr>
                <tr>
                    <td>Maintain social distancing.</td>
                </tr>
                <tr>
                    <td>Use hand sanitizers frequently.</td>
                </tr>
                <tr>
                    <td>Arrive at the vaccination center at the scheduled time.</td>
                </tr>
                <tr>
                    <td>Bring your identification documents.</td>
                </tr>
            </table>
        </div>
    </div>

    <div class="lower-bar">
        For more information, visit <a href="https://www.who.int/health-topics/coronavirus">https://www.who.int/health-topics/coronavirus</a>
    </div>

    <script>
        // Event listener for the "Sign In" button
        document.getElementById('login-button').addEventListener('click', function() {
            var userType = document.getElementById('user-type').value;
            if (userType === 'user') {
                window.location.href = 'login.html';
            } else if (userType === 'admin') {
                window.location.href = 'admin_login.html';
            }
        });

        // Function to update the vaccinated count
        function updateVaccinatedCount() {
            var vaccinatedCount = 2206732370; // Replace with actual value from the database
            document.getElementById('vaccinated-count').textContent = vaccinatedCount.toLocaleString();
        }

        // Initial update
        updateVaccinatedCount();

        // Update every 3 hours
        setInterval(updateVaccinatedCount, 3 * 60 * 60 * 1000);
    </script>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Flight Booking</title>
    <style>
        /* Background image */
        body {
            background-image: url('https://images.pexels.com/photos/163792/model-planes-airplanes-miniatur-wunderland-hamburg-163792.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2');
            background-size: cover;
            background-repeat: no-repeat;
        }

        .content {
            text-align: center;
            z-index: 1; /* Ensure the content appears above the background image */
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .textbox {
            background-color: black;
            padding: 20px;
            border-radius: 10px;
            display: inline-block;
        }

        h1 {
            font-size: 48px;
            font-weight: bold;
            color: white;
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            margin-bottom: 30px;
            color: white;
        }

        .button-container {
            display: flex;
            justify-content: center;
        }

        .button {
            display: inline-block;
            padding: 12px 24px;
            background-color: #4CAF50;
            color: #fff;
            font-size: 18px;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
            margin-right: 10px;
        }

        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="textbox">
                <h1>Welcome to Flight Booking</h1>
                <p>Book your flights conveniently and securely.</p>
                <div class="button-container">
                    <a href="login.php" class="button">Login</a>
                    <a href="signup.html" class="button">Sign Up</a>
                    <a href="admin.php" class="button">Admin</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

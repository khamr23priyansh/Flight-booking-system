<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: Registrationform.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation - Arrow Ways</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #0047AB;
            --secondary-color: #4169E1;
            --accent-color: #1E90FF;
            --text-color: #333;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f5f5;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .confirmation-container {
            background-color: white;
            width: 500px;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .confirmation-icon {
            color: var(--primary-color);
            font-size: 80px;
            margin-bottom: 20px;
        }

        .confirmation-details {
            margin-top: 20px;
            text-align: left;
        }

        .home-btn {
            display: inline-block;
            background-color: var(--primary-color);
            color: white;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 5px;
            margin-top: 20px;
            transition: background-color 0.3s;
        }

        .home-btn:hover {
            background-color: var(--secondary-color);
        }
    </style>
</head>
<body>
    <div class="confirmation-container">
        <i class="fas fa-check-circle confirmation-icon"></i>
        <h2>Booking Confirmed!</h2>
        <p>Thank you for choosing Arrow Ways. Your flight has been successfully booked.</p>
        
        <div class="confirmation-details">
            <p><strong>Booking Reference:</strong> AW<?php echo rand(10000, 99999); ?></p>
            <p><strong>Date:</strong> <?php echo date('F j, Y'); ?></p>
        </div>
        
        <a href="homepage.php" class="home-btn">Return to Home</a>
    </div>
</body>
</html>
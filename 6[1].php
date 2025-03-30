<?php
session_start();
require_once 'paymentpage.html';
// Simulate booking confirmation
$flight_id = $_POST['flight_id'] ?? '';
$passengers = $_SESSION['search_params']['passengers'] ?? 1;
$payment_method = $_POST['payment_method'] ?? '';

// Generate unique booking reference
$booking_reference = 'BK' . strtoupper(substr(uniqid(), -6));

// In a real application, you would:
// 1. Validate payment details
// 2. Process payment
// 3. Store booking in database
// 4. Send confirmation email
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Booking Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f4f4;
            text-align: center;
        }
        .confirmation-container {
            background-color: white;
            padding: 50px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .success-icon {
            font-size: 80px;
            color: #28a745;
            margin-bottom: 20px;
        }
        .booking-details {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 6px;
            margin-top: 30px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="confirmation-container">
        <div class="success-icon">✓</div>
        <h1>Booking Confirmed!</h1>
        <p>Thank you for your booking. Your reservation is complete.</p>

        <div class="booking-details">
            <h3>Booking Information</h3>
            <p><strong>Booking Reference:</strong> <?php echo $booking_reference; ?></p>
            <p><strong>Number of Passengers:</strong> <?php echo $passengers; ?></p>
            <p><strong>Payment Method:</strong> <?php echo ucwords(str_replace('_', ' ', $payment_method)); ?></p>
        </div>

        <p>A confirmation email will be sent to your registered email address.</p>
    </div>
</body>
</html>
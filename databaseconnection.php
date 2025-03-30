<?php
// Database configuration
$host = 'localhost';  // Usually 'localhost' for local development
$dbname = 'Arrowways_db.sql';
$username = 'root';  // Replace with your MySQL username
$password = '';  // Replace with your MySQL password

try {
    // Create PDO connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    
    // Set error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Optional: Uncomment for debugging
    // echo "Connected successfully";
} catch(PDOException $e) {
    // Log error or display a user-friendly message
    die("Connection failed: " . $e->getMessage());
}
?>
<?php
// Database configuration
$host = 'localhost';     // Database host
$dbname = 'Arroways_db.sql';  // Database name
$username = 'root';      // Database username
$password = '';  // Database password

try {
    // Create a PDO instance (connection)
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8",
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ]
    );
    
    echo "Connected successfully to the database!";
    
    // Example query
    $stmt = $pdo->query("SELECT * FROM users LIMIT 5");
    $users = $stmt->fetchAll();
    
    // Display results (for demonstration)
    echo "<pre>";
    print_r($users);
    echo "</pre>";
    
} catch (PDOException $e) {
    // Handle connection errors
    die("Connection failed: " . $e->getMessage());
}
?>
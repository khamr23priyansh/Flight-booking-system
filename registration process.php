<?php
require_once 'db_connect.php';

// Create users table if it doesn't exist
$create_table = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!mysqli_query($connect, $create_table)) {
    die("Error creating table: " . mysqli_error($connect));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    
    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($connect, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $password);

    if (mysqli_stmt_execute($stmt)) {
        echo "<p style='color:green'>Registration successful!</p>";

    } else {
        echo "<p style='color:red'>Error: " . mysqli_stmt_error($stmt) . "</p>";
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($connect);
?>
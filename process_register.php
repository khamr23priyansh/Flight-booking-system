<?php
// Database configuration
$db_host = 'localhost';
$db_name = 'arrowways';
$db_user = 'root'; // Replace with your actual database username
$db_pass = ''; // Replace with your actual database password

// Create database connection
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check connection
if ($conn->connect_error) {
    sendResponse(false, "Connection failed: " . $conn->connect_error);
    exit();
}

// Create user table if it doesn't exist
function createUserTable($conn) {
    $sql = "CREATE TABLE IF NOT EXISTS `user` (
        `id` INT AUTO_INCREMENT PRIMARY KEY,
        `first_name` VARCHAR(50) NOT NULL,
        `last_name` VARCHAR(50) NOT NULL,
        `email` VARCHAR(100) NOT NULL UNIQUE,
        `password` VARCHAR(255) NOT NULL,
        `phone_number` VARCHAR(20),
        `date_of_birth` DATE,
        `address` TEXT,
        `passport_number` VARCHAR(50),
        `nationality` VARCHAR(50),
        `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        `last_login` TIMESTAMP NULL,
        `status` VARCHAR(20) DEFAULT 'Active'
    )";
    
    if ($conn->query($sql) !== TRUE) {
        sendResponse(false, "Error creating table: " . $conn->error);
        exit();
    }
}

// Run the table creation function
createUserTable($conn);

// Process registration data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize post data
    $first_name = trim(mysqli_real_escape_string($conn, $_POST['first_name']));
    $last_name = trim(mysqli_real_escape_string($conn, $_POST['last_name']));
    $email = trim(mysqli_real_escape_string($conn, $_POST['email']));
    $password = $_POST['password'];
    $phone_number = isset($_POST['phone_number']) ? trim(mysqli_real_escape_string($conn, $_POST['phone_number'])) : null;
    $date_of_birth = isset($_POST['date_of_birth']) && !empty($_POST['date_of_birth']) ? 
                     trim(mysqli_real_escape_string($conn, $_POST['date_of_birth'])) : null;
    $address = isset($_POST['address']) ? trim(mysqli_real_escape_string($conn, $_POST['address'])) : null;
    $passport_number = isset($_POST['passport_number']) ? trim(mysqli_real_escape_string($conn, $_POST['passport_number'])) : null;
    $nationality = isset($_POST['nationality']) ? trim(mysqli_real_escape_string($conn, $_POST['nationality'])) : null;
    
    // Basic validation
    if (empty($first_name) || empty($last_name) || empty($email) || empty($password)) {
        sendResponse(false, "Please fill in all required fields");
        exit();
    }
    
    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        sendResponse(false, "Invalid email format");
        exit();
    }
    
    // Check if email already exists
    $check_email = $conn->prepare("SELECT id FROM `user` WHERE email = ?");
    $check_email->bind_param("s", $email);
    $check_email->execute();
    $result = $check_email->get_result();
    
    if ($result->num_rows > 0) {
        sendResponse(false, "Email already exists. Please use a different email address.");
        exit();
    }
    $check_email->close();
    
    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    // Prepare insert statement with correct handling of NULL values
    $stmt = $conn->prepare("INSERT INTO `user` (first_name, last_name, email, password, phone_number, date_of_birth, address, passport_number, nationality) 
                          VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    // Handle NULL values correctly for optional fields
    if ($date_of_birth === null) {
        $stmt->bind_param("sssssssss", $first_name, $last_name, $email, $hashed_password, $phone_number, $date_of_birth, $address, $passport_number, $nationality);
    } else {
        $stmt->bind_param("sssssssss", $first_name, $last_name, $email, $hashed_password, $phone_number, $date_of_birth, $address, $passport_number, $nationality);
    }
    
    // Execute the statement
    if ($stmt->execute()) {
        // Registration successful
        session_start();
        $_SESSION['user_id'] = $stmt->insert_id;
        $_SESSION['user_email'] = $email;
        $_SESSION['user_name'] = $first_name . ' ' . $last_name;
        header("Location:dashboard.php");
        sendResponse(true, "Registration successful! Redirecting you to the dashboard...", "dashboard.php");

    } else {
        // Registration failed
        sendResponse(false, "Registration failed: " . $stmt->error);
    }
    
    $stmt->close();
}

// Function to send JSON response
function sendResponse($success, $message, $redirect = '') {
    $response = array(
        'success' => $success,
        'message' => $message
    );
    
    if (!empty($redirect)) {
        $response['redirect'] = $redirect;
    }
    
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}

// Close connection
$conn->close();
?>
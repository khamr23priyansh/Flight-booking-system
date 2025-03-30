<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: application/json');
$response = [
    'success' => false,
    'message' => '',
    'redirect' => ''
];

try {
    // Database connection
    $conn = new mysqli("localhost", "root", "", "arrowways");
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validate input
        if (empty($_POST['email']) || empty($_POST['password'])) {
            throw new Exception("Please enter both email and password!");
        }

        // Sanitize input
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid email format!");
        }
        $password = $_POST['password'];

        // Check user credentials - Using the correct column name 'status'
        $stmt = $conn->prepare("SELECT * FROM user WHERE email = ?");
        if (!$stmt) {
            throw new Exception("Database error: " . $conn->error);
        }

        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if (!$user || !password_verify($password, $user['password'])) {
            throw new Exception("Invalid email or password!");
        }

        // Set session variables
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_name'] = $user['first_name'] . ' ' . $user['last_name'];
        $_SESSION['logged_in'] = true;

        // Update last login time
        $update = $conn->prepare("UPDATE user SET last_login = CURRENT_TIMESTAMP WHERE id = ?");
        $update->bind_param("i", $user['id']);
        $update->execute();
        $update->close();

        // Prepare success response
        $response['success'] = true;
        $response['message'] = "Login successful! Welcome back, " . $user['first_name'] . "!";
        $response['redirect'] = "homepage.php";

        // Close statement
        $stmt->close();
    }
} catch (Exception $e) {
    $response['message'] = $e->getMessage();
} finally {
    // Close connection
    if (isset($conn)) {
        $conn->close();
    }
    // Send response
    echo json_encode($response);
}
?>
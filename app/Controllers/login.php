<?php
require_once "../app/Core/DbConnect.php";

// Initialize variables
$username = $password = $error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = trim($_POST["username"]);
    $password = $_POST["password"];

    try {
        // Create a new instance of DbConnect to establish a database connection
        $db = new DbConnect();
        $pdo = $db->dbconn;

        // Prepare and execute SQL query to fetch user by username
        $stmt = $pdo->prepare("SELECT UserID, Username, Password FROM Users WHERE Username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['Password'])) {
            // Password is correct, set session or cookie to indicate user is logged in
            // For example: $_SESSION['user_id'] = $user['UserID'];
            // Redirect to dashboard or home page
            header("Location: /");

            exit();
        } else {
            // Invalid username or password
            $error = "Invalid username or password";
        }
    } catch (PDOException $e) {
        // Handle database connection error
        $error = "Database error: " . $e->getMessage();
    }
}

// Load the login view file
$title = "Login";
require_once "../app/Views/login.view.php";
?>

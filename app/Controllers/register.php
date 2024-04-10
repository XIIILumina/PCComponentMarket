<?php
require_once "../app/Core/DbConnect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"]; // Plain text password from the form

    // Hash the password for security
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    try {
        // Create a new instance of DbConnect to establish a database connection
        $db = new DbConnect();
        $pdo = $db->dbconn;

        $stmt = $pdo->prepare("INSERT INTO Users (Username, Password, Email) VALUES (:username, :password, :email)");
        $stmt->execute([
            ':username' => $username,
            ':password' => $password_hash,
            ':email' => $email,
        ]);

        // Registration successful
        $message = "Registration successful!";
    } catch (PDOException $e) {
        // Registration failed
        $error = "Registration failed. Please try again.";
    }
}

// Load the view file
$title = "Register";
require_once "../app/Views/register.view.php";
?>

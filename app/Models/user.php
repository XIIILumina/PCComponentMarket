<?php

require_once "../app/Core/DbConnect.php";

class User {
    private $db;

    public function __construct() {
        $this->db = new DbConnect();
    }

    public function createUser(string $email, string $password, string $username) {
        try {
            $pdo = $this->db->dbconn;

            // Hash the password for security
            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $pdo->prepare("INSERT INTO Users (Username, Password, Email) VALUES (?, ?, ?)");
            $stmt->execute([$username, $password_hash, $email]);

            return true; // Registration successful
        } catch (PDOException $e) {
            // Registration failed
            return false;
        }
    }

    public function loginUser(string $username, string $password) {
        try {
            $pdo = $this->db->dbconn;

            // Retrieve user by username
            $stmt = $pdo->prepare("SELECT UserID, Username, Password FROM Users WHERE Username = ?");
            $stmt->execute([$username]);
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['Password'])) {
                // Password is correct
                return $user; // Return user data
            } else {
                // Invalid username or password
                return false;
            }
        } catch (PDOException $e) {
            // Login process failed
            return false;
        }
    }
}

<?php

class DbConnect {
    public $dbconn;
    private $config;

    function __construct() {
        // Load database configuration
        $this->config = require_once "../app/config.php";

        // Debug: Check the content of $this->config
        // var_dump($this->config);

        // Build the DSN string for PDO
        $dsn = "mysql:host={$this->config['host']};dbname={$this->config['dbname']};charset={$this->config['charset']}";

        try {
            // Create a PDO instance
            $this->dbconn = new PDO($dsn, $this->config['user'], $this->config['password']);

            // Set PDO attributes
            $this->dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->dbconn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Handle database connection error
            throw new Exception("Database connection error: " . $e->getMessage());
        }
    }

    function __destruct() {
        // Close the database connection when the object is destroyed
        $this->dbconn = null;
    }
}

?>

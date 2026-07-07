<?php
// config/database.php

require_once __DIR__ . '/../vendor/autoload.php'; // Composer autoloader (if using)

class Database {
    private $host;
    private $port;
    private $db_name;
    private $username;
    private $password;
    public $conn;

    public function __construct() {
        // Local env variables se data fetch karna
        // Abhi ke liye hum seedha define kar rahe hain, production mein env use karenge
        $this->host = "localhost";
        $this->port = "5432";
        $this->db_name = "service_saas_db";
        $this->username = "postgres";
        $this->password = "your_password_here";
    }

    public function getConnection() {
        $this->conn = null;

        try {
            $dsn = "pgsql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->db_name;
            $this->conn = new PDO($dsn, $this->username, $this->password);
            
            // Error mode enable karna taaki bugs pakde ja sakein
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            
        } catch(PDOException $exception) {
            echo "Connection Error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>

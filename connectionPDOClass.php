<?php
class Database
{
    private $host = '127.0.0.1';
    private $database_name = 'phpapidb';
    private $username = 'root';
    private $password = 'xxxxxxxx';
    public $conn;
    public function getConnection()
    {
        $this->conn = null;
        try {
            $this->conn = new PDO(
                'mysql:host=' . $this->host . ';dbname=' . $this->database_name,
                $this->username,
                $this->password
            );
            $this->conn->exec('set names utf8');
            $this->conn->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );
        } catch (PDOException $e) {
            echo 'Database could not be connected: ' . $e->getMessage();
        }
        return $this->conn;
    }
} ?>

########## $database = new Database();
########## $db = $database->getConnection();
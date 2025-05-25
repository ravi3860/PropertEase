<?php
class Database
{
    private $host     = 'localhost:3306';
    private $username = 'root';
    private $password = '';
    private $db_name  = 'propertease';
    public $conn;

    public function connection()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }

        return $this->conn;
    }

}
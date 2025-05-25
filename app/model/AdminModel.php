<?php

require_once __DIR__ . '/../../config/database.php';

class Admin
{
    private $table = "admin";
    private $conn;

    public $id;
    public $username;
    public $password;
    public $email;
    public $phone;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connection();
    }

    public function login($username, $password)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE username = :username LIMIT 1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            unset($user['password']);
            return $user;
        }

        return false;
    }

    public function addAdmin($username, $password, $email, $phone)
    {
        $query = "INSERT INTO " . $this->table . " (username, password, email, phone) VALUES (:username, :password, :email, :phone)";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);

        return $stmt->execute();
    }

    public function deleteAdmin($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE ID = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function getAdminDetailById($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE ID = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllAdmins()
    {
        $query = "SELECT * FROM " . $this->table;

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateAdmin($id, $username, $email, $phone)
    {
        $query = "UPDATE " . $this->table . " SET username = :username, email = :email, phone = :phone WHERE ID = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }
}

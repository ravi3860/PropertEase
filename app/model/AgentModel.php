<?php

require_once __DIR__ . '/../../config/database.php';


class Agent
{
    private $table = "agent";

    public $id;
    public $username;
    public $password;
    public $email;
    public $phone;
    public $license_number;
    public $agency_name;

    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connection();
    }

    public function login($username, $password)
    {
        $query = "SELECT id, Username AS username, password FROM " . $this->table . " WHERE Username = :username LIMIT 1";

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

    public function addAgent($username, $password, $email, $phone, $license_number, $agency_name)
    {
        $query = "INSERT INTO {$this->table}
                (username, password, email, phone, license_number, agency_name)
                VALUES (:username, :password, :email, :phone, :license_number, :agency_name)";

        $stmt = $this->conn->prepare($query);

        // hash once, store in a variable
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashedPassword);   
        $stmt->bindParam(':email',    $email);
        $stmt->bindParam(':phone',   $phone);
        $stmt->bindParam(':license_number', $license_number);
        $stmt->bindParam(':agency_name', $agency_name);

        return $stmt->execute();
    }

    public function deleteAgent($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function getAgentDetailById($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllAgents() {
        $sql = "SELECT id, username, email, phone, license_number, agency_name FROM agent";  
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $agents = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $agents;
    }

    public function updateAgent($id, $username, $email, $phone, $license_number, $agency_name)
    {
        $query = "UPDATE " . $this->table . " SET username = :username, email = :email, phone = :phone, license_number = :license_number, agency_name = :agency_name WHERE id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':license_number', $license_number);
        $stmt->bindParam(':agency_name', $agency_name);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
        header("Location: index.php?page=agentdashboard");
        exit;
    }


}

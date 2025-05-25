<?php

require_once __DIR__ . '/../../config/database.php';

class Member
{
    private $table = "member";

    public $id;
    public $username;
    public $password;
    public $email;
    public $mobile;

    private $conn;

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
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = 'member';

            unset($user['password']); 
            return $user;
        }

        return false;
    }

    public function addMember($username, $password, $email, $phone)
    {
        $query = "INSERT INTO {$this->table}
                (username, password, email, phone)
                VALUES (:username, :password, :email, :phone)";

        $stmt = $this->conn->prepare($query);

        // hash once, store in a variable
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashedPassword);   // now OK
        $stmt->bindParam(':email',    $email);
        $stmt->bindParam(':phone',   $phone);

        return $stmt->execute();
    }

    public function deleteMember($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function getMemberDetailById($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->execute()) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public function updateMember($id, $username, $email, $phone)
    {
        $query = "UPDATE " . $this->table . " SET username = :username, email = :email, phone = :phone WHERE id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function getAllMembers() {
        $sql = "SELECT id, username, email FROM member";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $members = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $members;
    }
}
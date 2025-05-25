<?php

require_once __DIR__ . '/../../config/database.php';

class Property
{
    private $table = "property";

    public $id;
    public $title;
    public $location;
    public $price;
    public $description;
    public $images;
    public $memberId;

    private $conn;
    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connection();
    }

    public function createProperty()
    {
        $query = "INSERT INTO " . $this->table . " (title, location, price, description, images, memberId) VALUES (:title, :location, :price, :description, :images, :memberId)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':location', $this->location);
        $stmt->bindParam(':price', $this->price);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':images', $this->images);
        $stmt->bindParam(':memberId', $this->memberId);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function getPropertyById($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

      public function updateProperty($data)
    {
        try {
            $stmt = $this->conn->prepare("
                UPDATE {$this->table}
                SET title = ?, location = ?, price = ?, description = ?, images = ?
                WHERE id = ?
            ");

            return $stmt->execute([
                $data['title'],
                $data['location'],
                $data['price'],
                $data['description'],
                $data['images'],
                $data['id']
            ]);
        } catch (PDOException $e) {
            echo "Database Error: " . $e->getMessage(); // only for debugging
            return false;
        }
    }

    public function deleteProperty($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function getPropertiesByPropertyId($propertyId)
    {
        $query = "SELECT * FROM property WHERE id = :propertyId";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':propertyId', $propertyId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllProperties()
    {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPropertiesByMemberId($memberId)
    {
        $query = "SELECT * FROM property WHERE memberId = :memberId";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':memberId', $memberId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
           
    public function getTopThreeProperties()
    {
        $sql = "SELECT id, title, location, description, price, images
                FROM property
                ORDER BY id DESC                     
                LIMIT 3";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}

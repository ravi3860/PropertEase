<?php
require_once __DIR__ . '/../model/PropertyModel.php';
require_once __DIR__ . '/../../config/database.php';

class PropertyController
{
    private $db;
    private $propertyModel;

    public function __construct()
    {
        $this->db = new Database();
        $this->propertyModel = new Property($this->db->connection());
    }

    public function createProperty()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return false;
        }

        $this->propertyModel->title = $_POST['title'];
        $this->propertyModel->location = $_POST['location'];
        $this->propertyModel->price = $_POST['price'];
        $this->propertyModel->description = $_POST['description'];
        $this->propertyModel->images = $_POST['images'];
        $this->propertyModel->memberId = $_SESSION['id'];

        if ($this->propertyModel->createProperty()) {
            return true;
        }
        return false;
    }

    public function getPropertyById($id)
    {
        return $this->propertyModel->getPropertyById($id);
    }

    public function updateProperty($postData)
    {
        if (
            empty($postData['id']) || empty($postData['title']) ||
            empty($postData['location']) || empty($postData['price']) ||
            empty($postData['description'])
        ) {
            echo "Missing required fields";
            return false;
        }

        $data = [
            'id' => $postData['id'],
            'title' => $postData['title'],
            'location' => $postData['location'],
            'price' => $postData['price'],
            'description' => $postData['description'],
            'images' => $postData['images'] ?? ''
        ];

        return $this->propertyModel->updateProperty($data);
    }

    public function deleteProperty($id)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return false;
        }

        if ($this->propertyModel->deleteProperty($id)) {
            return true;
        }
        return false;
    }

    public function getPropertiesByMemberId($memberId)
    {
        return $this->propertyModel->getPropertiesByMemberId($memberId);
    }

    public function showAllProperties()
    {
        return $this->propertyModel->getAllProperties();
    }

    public function getTopThree() 
    {
        require_once '../app/model/PropertyModel.php';
        $propertyModel = new Property();
        $topProperties = $propertyModel->getTopThreeProperties();
        $_SESSION['top_rated_properties'] = $topProperties;
    }
} 
?>


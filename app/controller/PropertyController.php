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

        // Assign input fields
        $this->propertyModel->title = $_POST['title'] ?? '';
        $this->propertyModel->location = $_POST['location'] ?? '';
        $this->propertyModel->price = $_POST['price'] ?? '';
        $this->propertyModel->description = $_POST['description'] ?? '';
        $this->propertyModel->memberId = $_SESSION['id'] ?? null;

        // Handle image upload (file input named "images")
        $imagePath = null;
        if (isset($_FILES['images']) && $_FILES['images']['error'] === UPLOAD_ERR_OK) {
            $tmpName = $_FILES['images']['tmp_name'];
            $originalName = basename($_FILES['images']['name']);
            $extension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));

            $allowedExt = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
            if (!in_array($extension, $allowedExt)) {
                $_SESSION['error'] = 'Unsupported image format.';
                return false;
            }

            // Ensure upload directory exists
            $uploadDir = __DIR__ . '/../../public/uploads/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }

            // Create unique file name
            $newFileName = uniqid('property_', true) . '.' . $extension;
            $targetPath = $uploadDir . $newFileName;

            // Move uploaded file
            if (move_uploaded_file($tmpName, $targetPath)) {
                $this->propertyModel->images = 'uploads/' . $newFileName;
            } else {
                $_SESSION['error'] = 'Failed to upload image.';
                return false;
            }
        } else {
            $this->propertyModel->images = null;
        }

        // Save to DB
        if ($this->propertyModel->createProperty()) {
            $_SESSION['success'] = 'Property added successfully.';
            return true;
        }

        $_SESSION['error'] = 'Failed to add property.';
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

        // Handle image upload if a new file is provided
        $imagePath = $postData['images'] ?? ''; // existing image path from hidden input

        if (isset($_FILES['images']) && $_FILES['images']['error'] === UPLOAD_ERR_OK) {
            $imageTmpPath = $_FILES['images']['tmp_name'];
            $imageName = basename($_FILES['images']['name']);
            $imageExtension = pathinfo($imageName, PATHINFO_EXTENSION);
            $newImageName = uniqid('property_', true) . '.' . $imageExtension;

            $uploadDir = 'public/uploads/';
            $destination = $uploadDir . $newImageName;

            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            if (move_uploaded_file($imageTmpPath, $destination)) {
                $imagePath = $destination; // update image path to new upload
            } else {
                $_SESSION['error'] = "Failed to upload image.";
                return false;
            }
        }

        $data = [
            'id' => $postData['id'],
            'title' => $postData['title'],
            'location' => $postData['location'],
            'price' => $postData['price'],
            'description' => $postData['description'],
            'images' => $imagePath
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


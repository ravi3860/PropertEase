<?php
require_once __DIR__ . '/../model/AgentModel.php';
require_once __DIR__ . '/../model/MemberModel.php';
require_once __DIR__ . '/../model/AdminModel.php';
require_once __DIR__ . '/../../config/database.php';

class AdminController
{
    private $adminModel;
    private $agentModel;
    private $memberModel;

    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        $db = new Database();
        $this->adminModel = new Admin($db->connection());  
        $this->agentModel = new Agent($db->connection());     
        $this->memberModel = new Member($db->connection());   
    }

    //Function to display members and agents 
    public function manageUsers()
    {
        if (!isset($_SESSION['id']) || $_SESSION['role'] !== 'admin') {
            header("Location: index.php?page=login");
            exit;
        }

          $agents  = $this->agentModel->getAllAgents();   
          $members = $this->memberModel->getAllMembers(); 

        require '../app/view/admindashboard.php';
    }

    //Function to delete agent from manage users section 
    public function deleteAgent()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
            $this->agentModel->deleteAgent($_POST['id']);
        }
        header("Location: index.php?page=admindashboard");
        exit;
    }

    //Function to delete member from manage users section 
    public function deleteMember()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
            $this->memberModel->deleteMember($_POST['id']);
        }
        header("Location: index.php?page=admindashboard");
        exit;
    }

    public function profile()
    {
        if (!isset($_SESSION['id']) || $_SESSION['role'] !== 'admin') {
            header("Location: index.php?page=login");
            exit;
        }

        $admin = $this->adminModel->getAdminDetailById($_SESSION['id']);

        $agents  = $this->agentModel->getAllAgents();  
        $members = $this->memberModel->getAllMembers();

        require_once '../app/view/admindashboard.php'; 
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
            $id = $_POST['id'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];

            $this->adminModel->updateAdmin($id, $username, $email, $phone);

            $_SESSION['username'] = $username;
            header("Location: index.php?page=admindashboard&status=updated");
            exit;
        }
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
            $this->adminModel->deleteAdmin($_SESSION['id']);
            session_destroy();
            header("Location: index.php?page=login&deleted=true");
            exit;
        }
    }

    public function logout()
    {
        session_destroy();
        header("Location: index.php?page=login");
        exit;
    }
}

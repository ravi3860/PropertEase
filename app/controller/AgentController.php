<?php

    require_once __DIR__ . '/../model/AgentModel.php';
    require_once __DIR__ . '/../../config/database.php';


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class AgentController
{
    private $db;
    private $agentModel;

    public function __construct()
    {
        $this->db = new Database();
        $this->db->connection();
        $this->agentModel = new Agent($this->db);
    }

    public function deleteAgent($id)
    {

        if (empty($id)) {
            return false;
        }

        $this->agentModel->deleteAgent($id);

        header("Location: index.php?page=login");
        exit;
    }

    public function updateAgent()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return false;
        }

        $id = $_POST['id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $license_number = $_POST['license_number'];
        $agency_name = $_POST['agency_name'];

        $this->agentModel->updateAgent($id, $username, $email, $phone, $license_number, $agency_name);

        header("Location: index.php?page=agentdashboard");
        exit;
    }

    public function showAllAgents()
    {
        $agents = $this->agentModel->getAllAgents();  

        require '../app/view/findagent.php';           
    }
    


}



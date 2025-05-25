<?php

require_once __DIR__ . '/../model/ContactagentModel.php';
require_once __DIR__ . '/../../config/database.php';

class ContactagentController
{
    private ContactagentModel $model;                 

    public function __construct()
    {
        $this->model = new ContactagentModel();       
    }

    public function sendRequest()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            /* session already started in index.php */
            $memberId = $_SESSION['id']    ?? null;   
            $agentId  = $_POST['agent_id'] ?? null;

            $name          = $_POST['name']            ?? '';
            $contactNumber = $_POST['contact_number']  ?? '';
            $message       = $_POST['message']         ?? '';

            if ($memberId && $agentId && $name && $contactNumber && $message) {
                $ok = $this->model->saveRequest($memberId,$agentId,$name,$contactNumber,$message);
                $_SESSION[ $ok ? 'success' : 'error' ] =
                    $ok ? 'Request sent successfully.'
                        : 'Failed to send request.  Try again.';
            } else {
                $_SESSION['error'] = 'All fields are required.';
            }

            header('Location: index.php?page=findanagent');
            exit;
        }
    }

     // Show active client requests for logged-in agent
    public function showClientRequests() 
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
        $agentId = $_SESSION['agent']['id'] ?? null;

        if ($agentId) {
            $requests = $this->model->getActiveRequestsByAgent($agentId);
            include __DIR__ . '/../view/agent/agentdashboard.php';
        } else {
            $_SESSION['error'] = "Unauthorized access.";
            header("Location: index.php?page=login");
            exit();
        }
    }

    public function updateRequestStatus()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (session_status() === PHP_SESSION_NONE) session_start();

            $requestId = $_POST['request_id'] ?? null;
            $status = $_POST['status'] ?? null;

            if ($requestId && in_array($status, ['accepted', 'declined'])) {
                $this->model->updateRequestStatus($requestId, $status);
                $_SESSION['success'] = "Request status updated to $status.";
            } else {
                $_SESSION['error'] = "Invalid request.";
            }

            header("Location: index.php?page=agentdashboard");
            exit();
        }
    }

}

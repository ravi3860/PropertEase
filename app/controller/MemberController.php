<?php
require_once __DIR__ . '/../model/MemberModel.php';
require_once __DIR__ . '/../../config/database.php';

class MemberController
{
    private $db;
    private $memberModel;

    public function __construct()
    {
        $this->db = new Database();
        $this->db->connection();
        $this->memberModel = new Member($this->db);
    }

    public function deleteMember($id)
    {
        $memberModel = new Member();
        $memberModel->deleteMember($id);

        session_destroy();
        header("Location: index.php?page=home");
        exit;
    }

    public function updateMember()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return false;
        }

        $id       = $_POST['id'];
        $username = $_POST['username'];
        $email    = $_POST['email'];
        $phone    = $_POST['phone'];

        $this->memberModel->updateMember($id, $username, $email, $phone);

        header("Location: index.php?page=memberdashboard");
        exit;
    }
}

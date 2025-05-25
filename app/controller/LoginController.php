<?php
require_once __DIR__ . '/../model/AgentModel.php';
require_once __DIR__ . '/../model/AdminModel.php';
require_once __DIR__ . '/../model/MemberModel.php';
require_once __DIR__ . '/../../config/database.php';

class LoginController
{

    private $db;
    private $agentModel;
    private $adminModel;
    private $memberModel;

    public function __construct()
    {
        $this->db = new Database();
        $this->agentModel = new Agent($this->db->connection());
        $this->adminModel = new Admin($this->db->connection());
        $this->memberModel = new Member($this->db->connection());
    }

    public function login(): void
{
    $username     = $_POST['username'] ?? '';
    $password     = $_POST['password'] ?? '';
    $selectedRole = strtolower($_POST['role'] ?? '');

    $user = false;
    $actualRole = '';

    if ($selectedRole === 'admin') {
        $user = (new Admin())->login($username, $password);
        $actualRole = $user ? 'admin' : '';
    } elseif ($selectedRole === 'agent') {
        $user = (new Agent())->login($username, $password);
        $actualRole = $user ? 'agent' : '';
    } elseif ($selectedRole === 'member') {
        $user = (new Member())->login($username, $password);
        $actualRole = $user ? 'member' : '';
    }

    if ($user && $actualRole === $selectedRole) {
        $_SESSION['id']       = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role']     = $actualRole;
        header("Location: index.php?page={$actualRole}dashboard");
        exit;
    }

    $_SESSION['login_error'] = 'Invalid username, password, or role.';
    header("Location: index.php?page=login");
    exit;
}



    public function logout()
    {
        session_unset();
        session_destroy();

        header("Location: index.php?page=login");
        exit;
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return false;
        }

        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $mobile = $_POST['phone'];
        $userType = $_POST['userRole'];
        $userType = strtolower($userType);
        $additionalInfo = $_POST['additionalInfo'] ?? [];

        $license  = $_POST['additionalInfo']['license_number'] ?? null;      // flat names
        $agency   = $_POST['additionalInfo']['agency_name']    ?? null;

        switch ($userType) {
            case 'agent':
                return $this->agentModel->addAgent($username, $password, $email, $mobile, $license, $agency);
            case 'admin':
                return $this->adminModel->addAdmin($username, $password, $email, $mobile);
            case 'member':
                return $this->memberModel->addMember($username, $password, $email, $mobile);
            default:
                return false;
        }
    }

}

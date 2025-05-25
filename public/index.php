<?php

session_start();

$page = $_GET['page'] ?? 'home';

switch (strtolower($page)) {
    case 'home':
        require_once '../app/controller/PropertyController.php';
        $propertyController = new PropertyController();
        $propertyController->getTopThree(); 
        require '../app/view/home.php';
        break;

    case 'login':
        require '../app/view/login.php';
        break;

    case 'signup':
        require '../app/view/signup.php';
        break;

    case 'aboutus':
        require '../app/view/aboutus.php';
        break;

    case 'homeloans':
        require '../app/view/homeloans.php';
        break;

    case 'contactus':
        require '../app/view/contactus.php';
        break;

    case'subscriptions':
        require '../app/view/subscriptions.php';
        break;

    case'paymentform':
        require '../app/view/paymentform.php';
        break;

    case 'paymentformmember':
        require '../app/view/paymentformmember.php';
        break;

    case 'propertform':
        require '../app/view/propertyform.php';
        break;

    case 'add-user':
        require '../app/controller/loginController.php';
        $controller = new LoginController();
        $controller->register();
        header("Location: index.php?page=login");
        break;

    case 'login_submit':
        require '../app/controller/loginController.php';
        (new LoginController())->login(); // handles everything
        break;

    case 'logout':
        require '../app/controller/loginController.php';
        $controller = new LoginController();
        $controller->logout();
        break;

    case 'delete_agent':
        require '../app/controller/AgentController.php';
        $controller = new AgentController();
        $controller->deleteAgent($_SESSION['id']);
        break;

    case 'updateagent':
        require '../app/controller/AgentController.php';
        $controller = new AgentController();
        $controller->updateAgent();
        break;
        
    case 'agentdashboard':
        if (!isset($_SESSION['id'])) {
            header("Location: index.php?page=login");
            exit;
        }

        require_once '../app/model/AgentModel.php';
        $agentModel = new Agent();
        $agent = $agentModel->getAgentDetailById($_SESSION['id']);

        require_once '../app/model/ContactagentModel.php';
        $reqModel = new ContactagentModel();
        $requests = $reqModel->getActiveRequestsByAgent($_SESSION['id']);

        require_once '../app/controller/SubscriptionController.php';
        $subCtrl             = new SubscriptionController();
        $activeSubscription  = $subCtrl->showActivePlan($_SESSION['id']);
        $subscriptionHistory = $subCtrl->showSubscriptionHistory($_SESSION['id']);

        require '../app/view/agentdashboard.php';
        break;

    case 'updatemember':
        require_once '../app/controller/MemberController.php';
        $controller = new MemberController();
        $controller->updateMember();
        break;
    
    case 'deletemember':
        require '../app/controller/MemberController.php';
        $controller = new MemberController();

        if (isset($_SESSION['id'])) {
            $controller->deleteMember($_SESSION['id']); 
        } else {
            header("Location: index.php?page=login");
        }
        break;

    case 'logoutmember':
        require_once '../app/controller/LoginController.php'; 
        $controller = new LoginController();
        $controller->logout();
        break;


    case 'memberdashboard':
        if (!isset($_SESSION['id'])) {
            header("Location: index.php?page=login");
            exit;
        }

        require_once '../app/model/MemberModel.php';
        $memberModel = new Member();
        $member      = $memberModel->getMemberDetailById($_SESSION['id']);

        require_once '../app/controller/PropertyController.php';
        $propertyCtrl = new PropertyController();
        $_SESSION['my_properties']   = $propertyCtrl->getPropertiesByMemberId($_SESSION['id']);

        require_once '../app/model/ContactagentModel.php';
        $reqModel = new ContactagentModel();
        $requests = $reqModel->getRequestsByMember($_SESSION['id']);

         require_once '../app/controller/SubscriptionController.php';
        $subCtrl = new SubscriptionController();
        $activeSubscription = $subCtrl->showActivePlanForMember($_SESSION['id']);
        $subscriptionHistory = $subCtrl->showSubscriptionHistoryForMember($_SESSION['id']);

        require '../app/view/memberdashboard.php';
        break;

    
    case 'propertyform':                                              
        $editing  = isset($_GET['id']);
        $property = null;

        if ($editing) {
            require_once '../app/controller/PropertyController.php';
            $propCtrl  = new PropertyController();
            $property  = $propCtrl->getPropertyById($_GET['id']);      
            if (!$property) { echo "Property not found"; exit; }
        }

        require '../app/view/propertyform.php';
        break;


    case 'createproperty':
        require_once '../app/controller/PropertyController.php';
        $propCtrl = new PropertyController();
        $propCtrl->createProperty();       
        header("Location: index.php?page=memberdashboard");
        break;


    case 'editpropertyform':
        require_once '../app/controller/PropertyController.php';
        $controller = new PropertyController();
        $property = $controller->getPropertyById($_POST['id'] ?? 0);
        if (!$property) { echo "Property not found"; exit; }
        require '../app/view/updateproperty.php';
        break;

    case 'updateproperty':
        require_once '../app/controller/PropertyController.php';
        $propCtrl = new PropertyController();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($propCtrl->updateProperty($_POST)) {
                $_SESSION['my_properties'] = $propCtrl->getPropertiesByMemberId($_SESSION['id']);
                header("Location: index.php?page=memberdashboard");;
            } else {
                echo "Property update failed";
            }
        } else {
            // GET request - show update form
            if (!isset($_GET['id'])) {
                echo "Property ID missing";
                exit;
            }

            $property = $propCtrl->getPropertyById($_GET['id']);
            if ($property) {
                require '../app/view/updateProperty.php';
            } else {
                echo "Property not found";
            }
        }
        exit;
        break;


    case 'deleteproperty':
        if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['id'])) { echo "Invalid request"; exit; }
        require_once '../app/controller/PropertyController.php';
        $propCtrl = new PropertyController();
        $propCtrl->deleteProperty($_POST['id']);
        header("Location: index.php?page=memberdashboard");
        break;

    case 'browseproperties':
        require_once '../app/controller/PropertyController.php';
        $propertyController = new PropertyController();
        $properties = $propertyController->showAllProperties();
        require '../app/view/browseproperties.php';
        break;


    case 'viewproperty':
        if (!isset($_POST['id'])) { echo "Property ID missing"; exit; }
        require_once '../app/controller/PropertyController.php';
        $propCtrl  = new PropertyController();
        $property  = $propCtrl->getPropertyById($_POST['id']);
        require '../app/view/browseproperties.php';
        break;

    case 'admindashboard':
        if (!isset($_SESSION['id'])) {
            header("Location: index.php?page=login");
            exit;
        }
        require_once '../app/model/AdminModel.php';
        $adminModel = new Admin();
        $admin = $adminModel->getAdminDetailById($_SESSION['id']);

        // Add logic to fetch agents and members
        require_once '../app/model/AgentModel.php';
        require_once '../app/model/MemberModel.php';
        require_once '../app/controller/AdminController.php'; 

        $agentModel = new Agent();
        $memberModel = new Member();
        $adminController = new AdminController();

        $agents = $agentModel->getAllAgents();
        $members = $memberModel->getAllMembers();
        $adminController->loadDashboardCounts();

        require '../app/view/admindashboard.php';
        break;

    case 'updateadmin':
        require_once '../app/controller/AdminController.php';
        $controller = new AdminController();
        $controller->update();
        break;
    
    case 'deleteadmin':
        require_once '../app/controller/AdminController.php';
        $controller = new AdminController();
        $controller->delete();
        break;

    case 'logoutadmin':
        require_once '../app/controller/AdminController.php';
        $controller = new AdminController();
        $controller->logout();
        break;

    case 'deleteagent':           
        require_once '../app/controller/AdminController.php';
        (new AdminController())->deleteAgent();
        break;

    case 'delete_member':          
        require_once '../app/controller/AdminController.php';
        (new AdminController())->deleteMember();
        break;

    case 'addadmin':
        require '../app/view/addadmin.php';  
        break;

    case 'addadmin_submit':
        require_once '../app/controller/AdminController.php';
        $controller = new AdminController();
        $controller->addAdmin();
        header("Location: index.php?page=admindashboard");
        exit;
        break;

    case 'findanagent':
        require_once '../app/model/AgentModel.php';
        $agentModel = new Agent();
        $agents = $agentModel->getAllAgents();
        require '../app/view/findanagent.php';
        break;

    case 'contactagent':
        if (!isset($_SESSION['id'])) {
            header("Location: index.php?page=login");
            exit;
        }

        require_once '../app/model/MemberModel.php';
        $memberModel = new Member();
        $member = $memberModel->getMemberDetailById($_SESSION['id']);

        $agentId = $_POST['agent_id'] ?? null;  // 👈 now coming from POST

        if (!$agentId) {
            $_SESSION['error'] = "No agent selected.";
            header("Location: index.php?page=findanagent");
            exit;
        }

        require '../app/view/contactagent.php';
        break;

    case 'sendagentrequest':
        require_once '../app/controller/ContactagentController.php';
        (new ContactagentController())->sendRequest();  
        break;

    case 'clientrequests':
        require_once '../app/controller/ContactagentController.php';
        $controller = new ContactagentController();
        $controller->showClientRequests();
        break;

    case 'updaterequeststatus':
        require_once '../app/controller/ContactagentController.php';
        $controller = new ContactagentController();
        $controller->updateRequestStatus();
        break;

    case 'processpayment':
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: index.php?page=paymentform");
            exit;
        }
        if (!isset($_SESSION['id'])) {
            header("Location: index.php?page=login");
            exit;
        }
        require_once '../app/controller/SubscriptionController.php';
        $controller = new SubscriptionController();
        $controller->buyPlan($_SESSION['id'], $_POST['plan_name'], $_POST['price']);
        break;

    case 'cancel_subscription':
        if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['subscription_id'])) {
            header("Location: index.php?page=agentdashboard"); exit;
        }
        if (!isset($_SESSION['id'])) { header("Location: index.php?page=login"); exit; }

        require_once '../app/controller/SubscriptionController.php';
        (new SubscriptionController())
            ->cancelSubscription((int)$_POST['subscription_id'], (int)$_SESSION['id']);
        break;

    case 'processpaymentmember':
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['plan_name'], $_POST['price'])) {
            $memberId = $_SESSION['id']; // Assuming member is logged in
            $plan = htmlspecialchars($_POST['plan_name']);
            $price = (float)htmlspecialchars($_POST['price']);

            require_once '../app/controller/SubscriptionController.php';
            $subscriptionController = new SubscriptionController();
            $subscriptionController->buyPlanForMember($memberId, $plan, $price);
        } else {
            $_SESSION['error'] = "Invalid member payment request.";
            header("Location: index.php?page=memberdashboard");
            exit;
        }
        break;

    case 'cancel_subscription_for_member':
        error_log("POST data: " . print_r($_POST, true));
        error_log("SESSION data: " . print_r($_SESSION, true));
        if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['subscription_id'])) {
            header("Location: index.php?page=memberdashboard");
            exit;
        }
        if (!isset($_SESSION['id'])) {
            header("Location: index.php?page=login");
            exit;
        }

        require_once '../app/controller/SubscriptionController.php';
        (new SubscriptionController())
            ->cancelSubscriptionForMember((int)$_POST['subscription_id'], (int)$_SESSION['id']);
        break;

    default:
        http_response_code(404);
        echo "404 - Page not found";
        break;
}

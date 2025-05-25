<?php

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ .  '/../model/SubscriptionModel.php';

class SubscriptionController
{
    private $model;

    public function __construct()
    {
        $db = new Database();
        $this->model = new SubscriptionModel($db->connection());
    }

    // Buy a plan: deactivate old, create new
    public function buyPlan($agentId, $planName, $price)
    {
        $startDate = date('Y-m-d');
        $endDate = date('Y-m-d', strtotime('+30 days'));

        // Deactivate current active subscription
        $this->model->deactivateCurrentSubscription($agentId);

        // Create new subscription
        $success = $this->model->createSubscription($agentId, $planName, $price, $startDate, $endDate);

        if ($success) {
            $_SESSION['success'] = "Subscription purchased successfully!";
        } else {
            $_SESSION['error'] = "Failed to purchase subscription.";
        }
        header("Location: index.php?page=agentdashboard");
        exit;
    }

    // Show active subscription
    public function showActivePlan($agentId)
    {
        return $this->model->getActiveSubscription($agentId);
    }

    public function showSubscriptionHistory($agentId)
    {
        return $this->model->getAllSubscriptions($agentId);
    }

    public function cancelSubscription(int $subscriptionId, int $agentId): void
    {
        $ok = $this->model->cancelSubscriptionById($subscriptionId, $agentId);

        $_SESSION[$ok ? 'success' : 'error'] =
            $ok ? "Subscription cancelled." : "Could not cancel subscription.";

        header("Location: index.php?page=agentdashboard");
        exit;
    }

        public function buyPlanForMember($memberId, $planName, $price)
    {
        $startDate = date('Y-m-d');
        $endDate = date('Y-m-d', strtotime('+30 days'));

        $this->model->deactivateCurrentSubscriptionByMember($memberId);

        $success = $this->model->createSubscriptionForMember($memberId, $planName, $price, $startDate, $endDate);

        if ($success) {
            $_SESSION['success'] = "Subscription purchased successfully!";
        } else {
            $_SESSION['error'] = "Failed to purchase subscription.";
        }
        header("Location: index.php?page=memberdashboard");
        exit;
    }

    public function showActivePlanForMember($memberId)
    {
        return $this->model->getActiveSubscriptionByMember($memberId);
    }

    public function showSubscriptionHistoryForMember($memberId)
    {
        return $this->model->getSubscriptionHistoryByMember($memberId);
    }

    public function cancelSubscriptionForMember(int $subscriptionId, int $memberId): void
    {
        $ok = $this->model->cancelSubscriptionByMemberId($subscriptionId, $memberId);

        $_SESSION[$ok ? 'success' : 'error'] =
        $ok ? "Subscription cancelled." : "Could not cancel subscription.";

        header("Location: index.php?page=memberdashboard");
        exit;
    }

    
}
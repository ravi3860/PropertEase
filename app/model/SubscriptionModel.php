<?php

require_once __DIR__ . '/../../config/database.php';

class SubscriptionModel 
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    // Create subscription
    public function createSubscription($agentId, $planName, $price, $startDate, $endDate)
    {
        $sql = "INSERT INTO agent_subscriptions (agent_id, plan_name, price, start_date, end_date, is_active) 
                VALUES (:agent_id, :plan_name, :price, :start_date, :end_date, 1)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':agent_id', $agentId);
        $stmt->bindParam(':plan_name', $planName);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':start_date', $startDate);
        $stmt->bindParam(':end_date', $endDate);
        return $stmt->execute();
    }

    // Deactivate active subscription for an agent
    public function deactivateCurrentSubscription($agentId)
    {
        $sql = "UPDATE agent_subscriptions SET is_active = 0 WHERE agent_id = :agent_id AND is_active = 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':agent_id', $agentId);
        return $stmt->execute();
    }

    // Get active subscription for an agent
    public function getActiveSubscription($agentId)
    {
        $sql = "SELECT * FROM agent_subscriptions WHERE agent_id = :agent_id AND is_active = 1 LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':agent_id', $agentId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // just add this at the end of SubscriptionModel
    public function cancelSubscriptionById(int $subId, int $agentId): bool
    {
        $sql = "UPDATE agent_subscriptions
                SET is_active = 0, end_date = CURDATE()
                WHERE id = :id AND agent_id = :agent_id AND is_active = 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $subId, PDO::PARAM_INT);
        $stmt->bindParam(':agent_id', $agentId, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function getAllSubscriptions($agentId)
    {
        $sql = "SELECT * FROM agent_subscriptions WHERE agent_id = :agent_id ORDER BY start_date DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':agent_id', $agentId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

  public function getActiveSubscriptionByMember($memberId)
    {
        $sql = "SELECT * FROM member_subscriptions 
                WHERE member_id = ? 
                AND CURDATE() BETWEEN start_date AND end_date 
                LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$memberId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Get subscription history by member ID
    public function getSubscriptionHistoryByMember($memberId)
    {
        $sql = "SELECT * FROM member_subscriptions WHERE member_id = ? ORDER BY start_date DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$memberId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Deactivate current active subscription for member
    public function deactivateCurrentSubscriptionByMember($memberId)
    {
        $sql = "UPDATE member_subscriptions SET is_active = 0 WHERE member_id = ? AND is_active = 1";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$memberId]);
    }

    // Create new subscription for member
    public function createSubscriptionForMember($memberId, $planName, $price, $startDate, $endDate)
    {
        $sql = "INSERT INTO member_subscriptions (member_id, plan_name, price, start_date, end_date, is_active) VALUES (?, ?, ?, ?, ?, 1)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$memberId, $planName, $price, $startDate, $endDate]);
    }

    // Cancel subscription by subscription ID for member
    public function cancelSubscriptionByMember($subscriptionId, $memberId)
    {
        $sql = "UPDATE member_subscriptions SET status = 'cancelled' WHERE id = ? AND member_id = ? AND status = 'active'";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$subscriptionId, $memberId]);
    }
}
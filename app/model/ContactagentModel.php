<?php

require_once __DIR__ . '/../../config/database.php';

class ContactagentModel {

    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connection();
    }
    
    public function saveRequest($memberId, $agentId, $name, $contactNumber, $message) 
    {
        try {
            $sql = "INSERT INTO agent_requests (member_id, agent_id, name, contact_number, message)
                    VALUES (:member_id, :agent_id, :name, :contact_number, :message)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':member_id', $memberId);
            $stmt->bindParam(':agent_id', $agentId);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':contact_number', $contactNumber);
            $stmt->bindParam(':message', $message);
    
            return $stmt->execute();
            
        } catch (PDOException $e) {
            error_log('Database Insert Error: ' . $e->getMessage());
            return false;
        }
    }

    //Get requests by member ID 
    public function getRequestsByMember($memberId) {
       $sql = "SELECT ar.*, a.username AS agent_username
            FROM agent_requests ar
            JOIN agent a ON ar.agent_id = a.id
            WHERE ar.member_id = :member_id
            ORDER BY ar.created_at DESC";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':member_id', $memberId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get requests by agent ID 
    public function getRequestsByAgent($agentId) {
        $sql = "SELECT * FROM agent_requests WHERE agent_id = :agent_id ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':agent_id', $agentId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //show requests for each agent 
    public function getActiveRequestsByAgent($agentId) {
    $sql = "SELECT * FROM agent_requests 
            WHERE agent_id = :agent_id AND status IN ('pending', 'accepted') 
            ORDER BY created_at DESC";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':agent_id', $agentId);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateRequestStatus($requestId, $status) {
    $sql = "UPDATE agent_requests SET status = :status WHERE id = :id";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':id', $requestId);
    return $stmt->execute();
    }

    
}

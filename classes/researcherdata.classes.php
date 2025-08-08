<?php

class Researcherdata_classes extends dbh_Connection{
    public function TotalSubmissions($researcherId) {
        $sql = "SELECT COUNT(*) FROM paper WHERE r_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$researcherId]);
        $result = $stmt->fetchColumn();
        return $result;
    }
    public function TotalPending($r_id){
        $sql = "SELECT COUNT(*) FROM paper WHERE status = 'pending' AND r_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$r_id]);
        $result = $stmt->fetchColumn();
        return $result;
    }
    public function getpapers($r_id) {
        $sql = "SELECT * FROM paper WHERE r_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$r_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
   public function deletepaper($paperId) {
    $conn = $this->connect();

    try {
        $conn->beginTransaction();

        // Delete related notifications first
        $sql1 = "DELETE FROM notifications WHERE paper_id = ?";
        $stmt1 = $conn->prepare($sql1);
        $stmt1->execute([$paperId]);

        // Delete related paper rejections
        $sql2 = "DELETE FROM paper_rejections WHERE paper_id = ?";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->execute([$paperId]);

        // Finally, delete the paper itself
        $sql3 = "DELETE FROM paper WHERE p_id = ?";
        $stmt3 = $conn->prepare($sql3);
        $stmt3->execute([$paperId]);

        $conn->commit();

        return $stmt3->rowCount() > 0;

    } catch (PDOException $e) {
        $conn->rollBack();
        throw $e;
    }
}


    public function Rejectedpapers($r_id) {
        $sql = "SELECT * FROM paper WHERE r_id = ? AND status = 'rejected'";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$r_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function researcherDetails($researcherId) {
        $sql = "SELECT * FROM researcher WHERE r_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$researcherId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getRecentActivities($researcherId) {
    $sql = "SELECT activity FROM activitylog WHERE researcher_id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$researcherId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
    public function Rejected_Papers($researcherId) {
    $sql = "
        SELECT p.*, pr.reason
        FROM paper p
        LEFT JOIN paper_rejections pr ON p.p_id = pr.paper_id
        WHERE p.r_id = ? AND p.status = 'rejected'
        ORDER BY p.Timestamp DESC
    ";

    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$researcherId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}




}



?>
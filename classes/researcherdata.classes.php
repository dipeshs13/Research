<?php

class Researcherdata_classes extends dbh_Connection{
    public function TotalSubmissions($researcherId) {
        $sql = "SELECT COUNT(*) FROM Paper WHERE r_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$researcherId]);
        $result = $stmt->fetchColumn();
        return $result;
    }
    public function TotalPending($r_id){
        $sql = "SELECT COUNT(*) FROM Paper WHERE status = 'pending' AND r_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$r_id]);
        $result = $stmt->fetchColumn();
        return $result;
    }
    public function getPapers($r_id) {
        $sql = "SELECT * FROM Paper WHERE r_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$r_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function deletePaper($paperId) {
        $sql = "DELETE FROM Paper WHERE p_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$paperId]);
        return $stmt->rowCount() > 0; // Returns true if a row was deleted
    }
    public function RejectedPapers($r_id) {
        $sql = "SELECT * FROM Paper WHERE r_id = ? AND status = 'rejected'";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$r_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function researcherDetails($researcherId) {
        $sql = "SELECT * FROM Researcher WHERE r_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$researcherId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getRecentActivities($researcherId) {
    $sql = "SELECT activity FROM ActivityLog WHERE researcher_id = ? ORDER BY created_at DESC LIMIT 5";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$researcherId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

}



?>
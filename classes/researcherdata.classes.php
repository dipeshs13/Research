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
        $sql = "DELETE FROM paper WHERE p_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$paperId]);
        return $stmt->rowCount() > 0; // Returns true if a row was deleted
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

}



?>
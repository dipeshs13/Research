<?php
class paperdata_classes extends dbh_Connection {
    public function Totalpaper(){
        $sql = "SELECT COUNT(*) FROM paper";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchColumn();
        return $result;
    }
    public function TotalResearcher(){
        $sql = "SELECT COUNT(*) FROM researcher";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchColumn();
        return $result;
    }
    public function TotalPending(){
        $sql = "SELECT COUNT(*) FROM paper WHERE status = 'pending'";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchColumn();
        return $result;
    }
    public function TotalApproved(){
        $sql = "SELECT COUNT(*) FROM paper WHERE status = 'approved'";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchColumn();
        return $result;
    }
    public function getPendingpapers(){
        $sql = "SELECT * FROM paper WHERE status = 'pending'";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getApprovedpapers(){
        $sql = "SELECT * FROM paper WHERE status = 'approved'";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function researcherDetails($researcherId) {
        $sql = "SELECT * FROM researcher WHERE r_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$researcherId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function updatepaperStatus($paperId, $status) {
        $sql = "UPDATE paper SET status = ? WHERE p_id = ?";
        $stmt = $this->connect()->prepare($sql);
        
        if(!$stmt->execute([$status, $paperId])){
            $stmt = null;
            header("location: ../AdminDashboard.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }
    public function getpapers(){
        $sql = "SELECT * FROM paper";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function Submittedpapers(){
        $sql = "SELECT * FROM paper where status = 'approved'";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getResearcher(){
        $sql = "SELECT * FROM researcher";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function TotalSubmittedpapers($researcherId) {
        $sql = "SELECT COUNT(*) FROM paper WHERE r_id = ? AND status = 'approved'";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$researcherId]);
        $result = $stmt->fetchColumn();
        return $result;
    }
    public function getUser() {
        $sql = "SELECT * FROM users";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}




?>
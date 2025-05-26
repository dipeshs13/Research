<?php
class Paperdata_classes extends dbh_Connection {
    public function TotalPaper(){
        $sql = "SELECT COUNT(*) FROM Paper";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchColumn();
        return $result;
    }
    public function TotalResearcher(){
        $sql = "SELECT COUNT(*) FROM Researcher";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchColumn();
        return $result;
    }
    public function TotalPending(){
        $sql = "SELECT COUNT(*) FROM Paper WHERE status = 'pending'";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchColumn();
        return $result;
    }
    public function TotalApproved(){
        $sql = "SELECT COUNT(*) FROM Paper WHERE status = 'approved'";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchColumn();
        return $result;
    }
    public function getPendingPapers(){
        $sql = "SELECT * FROM Paper WHERE status = 'pending'";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getApprovedPapers(){
        $sql = "SELECT * FROM Paper WHERE status = 'approved'";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function researcherDetails($researcherId) {
        $sql = "SELECT * FROM Researcher WHERE r_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$researcherId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function updatePaperStatus($paperId, $status) {
        $sql = "UPDATE Paper SET status = ? WHERE p_id = ?";
        $stmt = $this->connect()->prepare($sql);
        
        if(!$stmt->execute([$status, $paperId])){
            $stmt = null;
            header("location: ../AdminDashboard.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }
    public function getPapers(){
        $sql = "SELECT * FROM Paper";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function SubmittedPapers(){
        $sql = "SELECT * FROM Paper where status = 'approved'";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getResearcher(){
        $sql = "SELECT * FROM Researcher";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function TotalSubmittedPapers($researcherId) {
        $sql = "SELECT COUNT(*) FROM Paper WHERE r_id = ? AND status = 'approved'";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$researcherId]);
        $result = $stmt->fetchColumn();
        return $result;
    }
    public function getUser() {
        $sql = "SELECT * FROM Users";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}




?>
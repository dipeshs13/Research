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
}



?>
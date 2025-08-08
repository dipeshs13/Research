<?php
// include '../includes/dbh.inc.php';

class PaperRejection extends dbh_Connection {

    public function saveRejection(int $paperId, int $adminId, string $reason): bool {
        $conn = $this->connect();
        $sql = "INSERT INTO paper_rejections (paper_id, admin_id, reason) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        return $stmt->execute([$paperId, $adminId, $reason]);
    }
}

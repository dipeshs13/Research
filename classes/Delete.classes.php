<?php
require_once 'Dbh.classes.php'; 

class Delete extends Dbh {

    // Delete researcher and all related data
    public function deleteResearcher($researcherId) {
        $conn = $this->connect();
        try {
            $conn->beginTransaction();

            // 1. Delete all papers from this researcher
            $sql1 = "DELETE FROM paper WHERE r_id = ?";
            $stmt1 = $conn->prepare($sql1);
            $stmt1->execute([$researcherId]);

            // 2. Delete the researcher
            $sql2 = "DELETE FROM researcher WHERE r_id = ?";
            $stmt2 = $conn->prepare($sql2);
            $stmt2->execute([$researcherId]);

            $conn->commit();

            return true;
        } catch (PDOException $e) {
            $conn->rollBack();
            return false;
        }
    }
       public function deleteUser($userId) {
        $conn = $this->connect();
        try {
            $stmt = $conn->prepare("DELETE FROM users WHERE u_id = ?");
            $stmt->execute([$userId]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

}




?>
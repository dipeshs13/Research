<?php
class PDFdata_classes extends dbh_Connection {
    public function getPdf()
{
    $sql = "SELECT * FROM paper WHERE p_pdf IS NOT NULL AND status = 'approved'";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
public function getPdfById($paperId)
{
    $sql = "SELECT * FROM paper WHERE p_id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$paperId]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
}


?>
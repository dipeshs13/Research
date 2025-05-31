<?php
class PDFdata_classes extends dbh_Connection {
    public function getPdf()
{
    $sql = "SELECT * FROM Paper WHERE p_pdf IS NOT NULL";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

}


?>
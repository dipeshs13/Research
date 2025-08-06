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

 public function getPapersWithCitations($researcherId)
    {
        $sql = "
            SELECT 
                p.p_id,
                p.p_title,
                COUNT(pr.ref_id) AS total_citations,
                MAX(n.created_at) AS last_cited_on
            FROM paper p
            LEFT JOIN paper_references pr ON pr.cited_citation_code = p.citation_code
            LEFT JOIN notifications n ON n.cited_paper_id = p.p_id
            WHERE p.r_id = ?
            GROUP BY p.p_id, p.p_title
            ORDER BY total_citations DESC
        ";

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$researcherId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}


?>
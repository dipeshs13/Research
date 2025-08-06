<?php
require_once 'Dbh.classes.php'; // Important!

class CitationData extends Dbh {
    
    public function getPapersWithCitations($researcherId) {
    $sql = "
        SELECT 
            p.p_id,
            p.p_title,
            COUNT(pr.ref_id) AS total_citations,
            MAX(n.created_at) AS last_cited_on
        FROM paper p
        LEFT JOIN paper_references pr ON pr.cited_citation_code = p.citation_code
        LEFT JOIN paper citing ON pr.paper_id = citing.p_id AND citing.status = 'approved'
        LEFT JOIN notifications n ON n.cited_paper_id = p.p_id
        WHERE p.r_id = ?
        GROUP BY p.p_id, p.p_title
        ORDER BY total_citations DESC
    ";

    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$researcherId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

   public function getCitingPapers($paperId) {
    $conn = $this->connect();

    // Step 1: Get the citation_code of the target paper
    $stmt = $conn->prepare("SELECT citation_code FROM paper WHERE p_id = ?");
    $stmt->execute([$paperId]);
    $citationCode = $stmt->fetchColumn();

    if (!$citationCode) {
        return []; // Paper not found
    }

    // Step 2: Get all papers that cited this paper's citation_code
    $sql = "
    SELECT 
        p.p_id,
        p.p_title,
        p.citation_code,
        p.p_pdf,
        r.r_fullname AS author_name
    FROM paper_references pr
    JOIN paper p ON pr.paper_id = p.p_id
    JOIN researcher r ON p.r_id = r.r_id
    WHERE pr.cited_citation_code = ?
    AND p.status = 'approved'
";

    $stmt = $conn->prepare($sql);
    $stmt->execute([$citationCode]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function getPaperById($paperId) {
    $stmt = $this->connect()->prepare("SELECT * FROM paper WHERE p_id = ?");
    $stmt->execute([$paperId]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

}

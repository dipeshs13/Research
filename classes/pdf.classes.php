<?php
require_once 'Dbh.classes.php';

class pdf extends Dbh {
    private $title;
    private $abstract;
    private $keywords;
    private $fieldofstudy;
    private $coauthors;
    private $pdf;
    private $researcher_id;

    public function __construct($title, $abstract, $keywords, $fieldofstudy, $coauthors, $pdf, $researcher_id) {
        $this->title = $title;
        $this->abstract = $abstract;
        $this->keywords = $keywords;
        $this->fieldofstudy = $fieldofstudy;
        $this->coauthors = $coauthors;
        $this->pdf = $pdf;
        $this->researcher_id = $researcher_id;
    }

    protected function setPdf() {
        $conn = $this->connect();
    $status = "pending";

    // Temporarily insert without citation_code to get ID
    $stmt = $conn->prepare('INSERT INTO paper (p_title, p_abstract, p_keywords, p_fieldofstudy, p_coauthors, p_pdf, status, r_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
    if (!$stmt->execute([$this->title, $this->abstract, $this->keywords, $this->fieldofstudy, $this->coauthors, $this->pdf, $status, $this->researcher_id])) {
        $stmt = null;
        header("location: ../ResearcherUpload.php?error=stmtfailed");
        exit();
    }

    // Get inserted ID
    $paperId = $conn->lastInsertId();

    // Generate citation code, e.g., BCA2025-0001
    $citationCode = "BCA2025-" . str_pad($paperId, 4, "0", STR_PAD_LEFT);

    // Update the citation_code
    $updateStmt = $conn->prepare('UPDATE paper SET citation_code = ? WHERE p_id = ?');
    $updateStmt->execute([$citationCode, $paperId]);

    // Indexing
    require_once 'InvertedIndex.classes.php';
    $indexer = new InvertedIndex();
    $indexer->indexDocument($paperId, $this->title, $this->abstract, $this->keywords);

    // Log activity
    $activityMessage = "You uploaded a new paper titled '{$this->title}' - Pending";
    $this->logActivity($this->researcher_id, $activityMessage);

    $stmt = null;
    $updateStmt = null;

    return $paperId; // Return the paper ID for further processing
    }

    public function isDuplicatePaper($abstract, $keywords, $fieldofstudy, $coauthors, $r_id) {
        $conn = $this->connect();
        $stmt = $conn->prepare("SELECT COUNT(*) FROM paper 
                WHERE p_abstract = ? 
                AND p_keywords = ? 
                AND p_fieldofstudy = ? 
                AND p_coauthors = ?
                AND r_id = ?");
                
        $stmt->execute([$abstract, $keywords, $fieldofstudy, $coauthors, $r_id]);
        $count = $stmt->fetchColumn();
        $stmt = null;
        
        return $count == 0; // returns true if no duplicate exists
    }

    private function logActivity($researcherId, $activity) {
        $conn = $this->connect();
        $sql = "INSERT INTO activitylog (researcher_id, activity) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        if (!$stmt->execute([$researcherId, $activity])) {
            // Handle error, e.g., log or throw exception
            error_log("Failed to insert activity log: " . implode(" | ", $stmt->errorInfo()));
        }
        $stmt = null;
    }
}

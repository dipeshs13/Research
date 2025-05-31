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
        $stmt = $conn->prepare('INSERT INTO paper (p_title, p_abstract, p_keywords, p_fieldofstudy, p_coauthors, p_pdf, status, r_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
        $status = "pending";

        if(!$stmt->execute([$this->title, $this->abstract, $this->keywords, $this->fieldofstudy, $this->coauthors, $this->pdf, $status, $this->researcher_id])) {
            $stmt = null;
            header("location: ../ResearcherUpload.php?error=stmtfailed");
            exit();
        }

        // Get the inserted paper ID using PDO's lastInsertId()
        $paperId = $conn->lastInsertId();

        // Create inverted index
        require_once 'InvertedIndex.classes.php';
        $indexer = new InvertedIndex();
        $indexer->indexDocument($paperId, $this->title, $this->abstract, $this->keywords);

        $stmt = null;
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
        $sql = "INSERT INTO ActivityLog (researcher_id, activity) VALUES (?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$researcherId, $activity]);
    }
}

?>
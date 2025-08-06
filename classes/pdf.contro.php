<?php
require_once 'pdf.classes.php';

class pdfcontro extends pdf {
    private $title;
    private $abstract;
    private $keywords;
    private $fieldofstudy;
    private $coauthors;
    private $pdf;
    private $researcher_id;
    private $references;

    public function __construct($title, $abstract, $keywords, $fieldofstudy, $coauthors, $pdf, $researcher_id, $references=null) {
        parent::__construct($title, $abstract, $keywords, $fieldofstudy, $coauthors, $pdf, $researcher_id);
        $this->references = $references;
    }

    public function uploadPdf() {
        // Check for duplicate papers
        if (!$this->isDuplicatePaper($this->abstract, $this->keywords, $this->fieldofstudy, $this->coauthors, $this->researcher_id)) {
            header("location: ../ResearcherUpload.php?error=duplicatepaper");
            exit();
        }

        // Upload the paper
        $paperId = $this->setPdf();

        $this->saveReferences($paperId);
    }

private function saveReferences($paperId) {
    if (empty($this->references)) return;

    $conn = $this->connect();
    $referenceLines = explode("\n", $this->references);
    $stmt = $conn->prepare("INSERT INTO paper_references (paper_id, reference_text, cited_citation_code) VALUES (?, ?, ?)");
    $notifStmt = $conn->prepare("INSERT INTO notifications (researcher_id, paper_id, cited_paper_id, message) VALUES (?, ?, ?, ?)");

    foreach ($referenceLines as $ref) {
        $ref = trim($ref);
        if ($ref === '') continue;

        preg_match('/(BCA2025-\d{3,4})/', $ref, $matches);
        $citedCode = isset($matches[1]) ? $matches[1] : null;

        $stmt->execute([$paperId, $ref, $citedCode]);

        if ($citedCode !== null) {
            // Find cited paper and researcher
            $query = $conn->prepare("SELECT p_id, r_id FROM paper WHERE citation_code = ?");
            $query->execute([$citedCode]);
            $citedPaper = $query->fetch(PDO::FETCH_ASSOC);

            if ($citedPaper) {
                $citedPaperId = $citedPaper['p_id'];
                $citedResearcherId = $citedPaper['r_id'];

                // Prepare notification message
                $message = "Your paper with citation code {$citedCode} was cited in a new paper titled '{$this->title}'.";

                // Insert notification
                $notifStmt->execute([$citedResearcherId, $paperId, $citedPaperId, $message]);
            }
        }
    }
}





}











?>
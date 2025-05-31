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

    public function __construct($title, $abstract, $keywords, $fieldofstudy, $coauthors, $pdf, $researcher_id) {
        parent::__construct($title, $abstract, $keywords, $fieldofstudy, $coauthors, $pdf, $researcher_id);
    }

    public function uploadPdf() {
        // Check for duplicate papers
        if (!$this->isDuplicatePaper($this->abstract, $this->keywords, $this->fieldofstudy, $this->coauthors, $this->researcher_id)) {
            header("location: ../ResearcherUpload.php?error=duplicatepaper");
            exit();
        }

        // Upload the paper
        $this->setPdf();
    }
}











?>
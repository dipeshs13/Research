<?php
class pdfcontro extends Pdf_classes {
    private $title;
    private $abstract;
    private $keywords;
    private $fieldofstudy;
    private $coauthors;
    private $folder;
    private $r_id;
    public function __construct($title, $abstract, $keywords, $fieldofstudy, $coauthors, $folder, $r_id) {
        $this->title = $title;
        $this->abstract = $abstract;
        $this->keywords = $keywords;
        $this->fieldofstudy = $fieldofstudy;
        $this->coauthors = $coauthors;
        $this->folder = $folder;
        $this->r_id = $r_id;
    }
    public function uploadPdf() {
        if ($this->emptyInput() == false) {
            header("location:../ResearcherUpload.php?error=emptyInput");
            exit();
        }
        if ($this->checkDuplicate() == false) {
            header("location:../ResearcherUpload.php?error=duplicatePaper");
            exit();
        }
        $this->setPdf($this->title, $this->abstract, $this->keywords, $this->fieldofstudy, $this->coauthors, $this->folder, $this->r_id);
    }

    private function emptyInput() {
        $result = true;
        if(empty($this->title) || empty($this->abstract) || empty($this->keywords) || empty($this->fieldofstudy)  || empty($this->folder)) {
            $result = false;
        }
        return $result;
    }
    
    private function checkDuplicate() {
        $result = true;
        if(!$this->isDuplicatePaper($this->abstract, $this->keywords, $this->fieldofstudy, $this->coauthors, $this->r_id)) {
            $result = false; // Duplicate exists
        }
        return $result; // returns true if duplicate exists
    }
}











?>
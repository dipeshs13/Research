<?php
class Pdf_classes extends dbh_Connection{
    public function setPdf($title, $abstract, $keywords, $filedofstudy, $coauthors, $folder, $r_id){
        $sql = "INSERT INTO Paper (p_title, p_abstract, p_keywords, p_fieldofstudy, p_coauthors, p_pdf, r_id) VALUES (?, ?, ?, ?, ?, ?,?)";
        $stmt = $this->connect()->prepare($sql);
        
        if(!$stmt->execute([$title, $abstract, $keywords, $filedofstudy, $coauthors, $folder, $r_id])){
            $stmt = null;
            header("location: ../ResearcherUpload.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }
    //  Function to check for duplicate paper by same researcher
    public function isDuplicatePaper($abstract, $keywords, $filedofstudy, $coauthors, $r_id) {
        $sql = "SELECT COUNT(*) FROM Paper 
                WHERE p_abstract = ? 
                AND p_keywords = ? 
                AND p_fieldofstudy = ? 
                AND p_coauthors = ?
                AND r_id = ?";
                
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$abstract, $keywords, $filedofstudy, $coauthors, $r_id]);

        $count = $stmt->fetchColumn();
        $stmt = null;
        $result = true;
        if($count > 0) {
            $result = false; // Duplicate exists
        }
        return $result; // returns true if duplicate exists
    }
   
}



?>
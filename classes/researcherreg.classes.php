<?php
class Researcherreg extends dbh_Connection {
    public function setResearcher($fullname, $email, $password, $institution, $field_of_research, $country, $biography, $research_interests){
        $query = 'INSERT INTO researcher(r_fullname, r_email, r_password, r_institution, r_field, r_country, r_biography, r_interest) VALUES (?,?,?,?,?,?,?,?)';
        $stmt = $this->connect()->prepare($query);

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        if(!$stmt->execute([$fullname, $email, $hashed_password, $institution, $field_of_research, $country, $biography, $research_interests])){
            header('location:../index.php?error=stmtfailed');
            exit();
        }
    }
    public function checkResearcher($email){
        $query = "SELECT r_email from researcher WHERE r_email=?";
        $stmt = $this->connect()->prepare($query);

        if(!$stmt->execute([$email])){
            header("location:../index.php?error=stmtfailed");
            exit();
        }
        $result = true;
        if($stmt->rowCount()>0){
            $result = false;
        }
        return $result;
    }
}



?>
<?php 
class Researchercontro extends Researcherreg {
    private $fullname;
    private $email;
    private $password;
    private $confirmPassword;
    private $institution;
    private $field_of_research;
    private $country;
    private $biography;
    private $research_interests;
    public function __construct($fullname, $email, $password, $confirmPassword, $institution, $field_of_research, $country, $biography, $research_interests){
        $this->fullname = $fullname;
        $this->email = $email;
        $this->password = $password;
        $this->confirmPassword = $confirmPassword;
        $this->institution = $institution;
        $this->field_of_research = $field_of_research;
        $this->country = $country;
        $this->biography = $biography;
        $this->research_interests = $research_interests;
    }
    public function registerResearcher(){
        if($this->emptyInput()==false){
            header("location:../ResearcherRegister.php?error=emptyInput");
            exit();
        }
        if($this->invalidEmail()==false) {
            header('location:../ResearcherRegister.php?error=invalidEmail');
            exit();
        }
        if($this->pwdMatch()==false){
            header('location:../ResearcherRegister.php?error=passworddoesnotmatch');
            exit();
        }
        if($this->researcherCheck()==false){
            header('location:../ResearcherRegister.php?error=User already exist');
            exit();
        }
        $this->setResearcher($this->fullname, $this->email, $this->password, $this->institution, $this->field_of_research, $this->country, $this->biography, $this->research_interests);
    }

    private function emptyInput(){
        $result = true;
        if(empty($this->fullname) || empty($this->email) || empty($this->password) || empty($this->confirmPassword) || empty($this->institution) || empty($this->field_of_research) || empty($this->country) || empty($this->biography) || empty($this->research_interests)){
            $result = false;
        }
        return $result;
    }
    private function invalidEmail(){
        $result = true;
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $result = false;
        }
        return $result;
    }
    private function pwdMatch(){
        $result = true;
        if(($this->password) != ($this->confirmPassword)){
            $result = false;
        }
        return $result;
    }
    private function researcherCheck(){
        $result = true;
        if(!$this->checkResearcher($this->email)){
            $result = false;
        }
        return $result;
    }
}






?>
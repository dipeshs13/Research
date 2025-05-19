<?php
class Researcherlogin_contro extends Researcherlogin {
    private $email;
    private $password;

    public function __construct($email, $password) {
        $this->email = $email;
        $this->password = $password;
    }

    public function loginResearcher() {
        if ($this->emptyInput() == false) {
            header('location:../ResearcherLogin.php?error=emptyInput');
            exit();
        }
        
        $this->getResearcher($this->email, $this->password);
    }

    private function emptyInput() {
        return !empty($this->email) && !empty($this->password);
    }

   
}


?>
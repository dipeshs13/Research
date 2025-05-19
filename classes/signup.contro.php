<?php
class Signup_contro extends Signup {
    private $firstname;
    private $lastname;
    private $email;
    private $password;
    private $confirmPassword;

    public function __construct($firstname, $lastname, $email, $password, $confirmPassword) {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->password = $password;
        $this->confirmPassword = $confirmPassword;
    }
    public function signupUser(){
        if($this->emptyInput()==false){
            header("location:../UserRegister.php?error=emptyInput");
            exit();
        }
        if($this->invalidEmail()==false) {
            header('location:../UserRegister.php?error=invalidEmail');
            exit();
        }
        if($this->pwdMatch()==false){
            header('location:../UserRegister.php?error=passworddoesnotmatch');
            exit();
        }
        if($this->userCheck()==false){
            header('location:../UserRegister.php?error=User already exist');
            exit();
        }
        $this->setUser($this->firstname, $this->lastname, $this->email, $this->password);
    }
    private function emptyInput(){
        $result = true;
        if(empty($this->firstname) || empty($this->lastname) || empty($this->email) || empty($this->password) || empty($this->confirmPassword)){
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

      private function userCheck(){
        $result = true;
        if(!$this->checkUser($this->email)){
          $result = false;
        }
        return $result;
      }
}


?>
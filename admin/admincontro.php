<?php
class Admin_controller extends Admin_class{
     
   private $email;
   
   private $password;
   

   

   public function __construct($email,$password){
   
    $this->email = $email;
   
    $this->password = $password;
   
   }
   public function loginAdmin(){
    if($this->emptyInput()==false){
      header('location:./login.php?error=emptyInput');
      exit();
    }
   
    $this->admin($this->email,$this->password);
   }
   private function emptyInput(){
    $result = true;
    if( empty($this->email) || empty($this->password)){
      $result = false;
    }
    return $result;
   }



}






?>
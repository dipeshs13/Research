<?php 
class Signup extends dbh_Connection {
    public function setUser($firstname, $lastname, $email, $password){
        $query = 'INSERT INTO users(u_firstname, u_lastname, u_email, u_password) VALUES (?,?,?,?)';
        $stmt = $this->connect()->prepare($query);

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        if(!$stmt->execute([$firstname, $lastname, $email, $hashed_password])){
            header('location:../UserRegister.php?error=stmtfailed');
            exit();
        }
    }
    public function checkUser($email){
        $query = "SELECT u_email from users WHERE u_email=?";
        $stmt = $this->connect()->prepare($query);

        if(!$stmt->execute([$email])){
            header("location:../UserRegister.php?error=stmtfailed");
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
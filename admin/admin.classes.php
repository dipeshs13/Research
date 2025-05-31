<?php
session_start();
class Admin_class extends dbh_connection{
    public function admin($email, $password){
        $query = 'SELECT * from admin WHERE a_email=? ';
        $stmt = $this->connect()->prepare($query);
        if(!$stmt->execute([$email])){
            header("location:./login.php?failed");
            exit();
        }
        if($stmt->rowCount()==0){
            header("location:./login.php?error=usernotfound");
            exit();
        } else if($stmt->rowCount()>0){
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $checkpassword = password_verify($password,$result['a_password']);
            // echo var_dump($checkpassword);
            if($checkpassword){
                $_SESSION['adminid'] = $result['a_id'];
                $_SESSION['adminname'] = $result['a_fullname'];
                header("location:./admindashboard.php");
                exit();
            }
            else{
                header("location: ./login.php?error=passworddoesnotmatch");
                exit();
            }
        }
    }
}












?>
<?php
session_start();
class Researcherlogin extends dbh_Connection {
    public function getResearcher($email, $password){
        $query = 'SELECT * FROM Researcher WHERE r_email = ?';
        $stmt = $this->connect()->prepare($query);
        
        if(!$stmt->execute([$email])){
            header('location:../index.php?error=stmtfailed');
            exit();
        }

        if($stmt->rowCount() == 0){
            header('location:../index.php?error=User not found');
            exit();
        } else {
            // Fetch the single user as an associative array
            $researcher = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verify the password
            if(password_verify($password, $researcher['r_password'])) {
                $_SESSION['researcherId'] = $researcher['r_id'];
                $_SESSION['researcherfullname'] = $researcher['r_fullname'];
                header('location:../ResearcherDashboard.php?loginSuccessfull');
                exit();
            } else {
                header('location:../ResearcherLogin.php?error=wrongpassword');
                exit();
            }
        }
    }
}





?>
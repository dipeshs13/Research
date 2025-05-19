<?php
session_start();
    class Login extends dbh_Connection {
        public function getUser($email, $password){
            $query = 'SELECT * FROM Users WHERE u_email = ?';
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
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
                // Verify the password
                if(password_verify($password, $user['u_password'])) {
                    $_SESSION['userId'] = $user['u_id'];
                    $_SESSION['userfirstname'] = $user['u_firstname'];
                    $_SESSION['userlastname'] = $user['u_lastname'];
                    header('location:../index.php?loginSuccessfull');
                    exit();
                } else {
                    header('location:../UserLogin.php?error=wrongpassword');
                    exit();
                }
            }
        }
    }
    


?>
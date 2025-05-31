<?php  
class dbh_Connection{
    protected function connect(){
        try{
            $host = 'localhost';
            $username = 'root';
            $password = '';
            $dbname = 'research';
            $pdo = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch(PDOException $e){
            die(''.$e->getMessage());
        }
    }
}




?>
<?php
//     create a class called Dbh with the following properties hostname,  username, password, dbname

class Dbh{
    private $host = "localhost";
    private $user = "root";
    private $pwd = "";
    private $dbname = "zuriphp";
    private $conn;
    
    public function connect(){
        $this->conn = null;
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->user, $this->pwd);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
            echo "Connection error: " . $e->getMessage();
        }
        return $this->conn;
    }
}

?>
<?php
//     create a class called `Dbh` with the following properties hostname,  username, password, dbname

class Dbh{
    private $host = "localhost";
    private $user = "root";
    private $pwd = "";
    private $dbname = "zuriphp";

    protected $connect;
 
    public function __construct(){
 
        if (!isset($this->connect)) {
 
            $this->connect = new mysqli($this->host, $this->username, $this->password, $this->database);
 
            if (!$this->connect) {
                echo 'Cannot connect to database server';
                exit;
            }            
        }    
 
    }
}

?>
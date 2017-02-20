<?php
class DBConnector{
    private $serverName = "localhost:80";
    private $userName = "";
    private $password = "";
    private $dbName = "";

    public function connect(){
        $conn = new PDO("mysql:host=$this->serverName; dbname=$this->dbName", $this->userName, $this->password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }
}

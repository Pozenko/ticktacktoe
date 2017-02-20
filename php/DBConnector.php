<?php
class DBConnector{
    private $serverName = "localhost:8889";
    private $userName = "root";
    private $password = "root";
    private $dbName = "tttDB";

    public function connect(){
        $conn = new PDO("mysql:host=$this->serverName; dbname=$this->dbName", $this->userName, $this->password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }
}

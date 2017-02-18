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
//old body connect method
//        $conn = new mysqli($this->serverName, $this->userName, $this->password, $this->dbName);
//        if ($conn->connect_error) {
//            $response['error'] = $conn->connect_error;
//            return null;
//            //die("Connection failed: " . $conn->connect_error);
//        }
//        else{
//            return $conn;
//        }
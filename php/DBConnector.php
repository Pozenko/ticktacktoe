<?php
class DBConnector{
    private $serverName = "localhost:8889";
    private $userName = "root";
    private $password = "root";
    private $dbName = "tttDB";

    public function connect(&$response){
        $conn = new mysqli($this->serverName, $this->userName, $this->password, $this->dbName);
        if ($conn->connect_error) {
            $response['error'] = $conn->connect_error;
            return null;
            //die("Connection failed: " . $conn->connect_error);
        }
        else{
            return $conn;
        }
    }
}
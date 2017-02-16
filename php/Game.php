<?php
require_once 'DBConnector.php';

$response = $_POST['gameData'];
$id = $response['id'];
$player = $response['player'];
$connector = new DBConnector();
$conn = $connector->connect($response);
if($conn == null){
    echo json_encode($response);
}


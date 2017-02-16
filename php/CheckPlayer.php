<?php
require_once 'DBConnector.php';

$response = $_POST['playerData'];
$id = $response['gameId'];
$connector = new DBConnector();
$conn = $connector->connect($response);
if($conn == null){
    echo json_encode($response);
}

$sql = "SELECT player2 FROM games WHERE id = '$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$response['isPlayer'] = $row['player2'];
echo json_encode($response);
$conn->close();
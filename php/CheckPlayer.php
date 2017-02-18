<?php
require_once 'DBConnector.php';

$response = $_POST['playerData'];
//$gameId = $response['gameId'];

$connector = new DBConnector();
$conn = $connector->connect();

$stmtSelect = $conn->prepare("SELECT player2 FROM games WHERE id = :id");
$stmtSelect->execute(array(':id'=>$response['gameId']));
$row = $stmtSelect->fetch();
$response['isPlayer'] = $row['player2'];

echo json_encode($response);











//old check player
//$conn = $connector->connect($response);
//
//
//$sql = "SELECT player2 FROM games WHERE id = '$id'";
//$result = $conn->query($sql);
//$row = $result->fetch_assoc();
//$response['isPlayer'] = $row['player2'];
//echo json_encode($response);
//$conn->close();
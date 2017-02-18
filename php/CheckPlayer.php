<?php
require_once 'DBConnector.php';

$response = $_POST['playerData'];

$connector = new DBConnector();
$conn = $connector->connect();

$stmtSelect = $conn->prepare("SELECT player2 FROM games WHERE id = :gameId");
$stmtSelect->execute(array(':gameId'=>$response['gameId']));
$row = $stmtSelect->fetch();
$response['isPlayer'] = $row['player2'];

echo json_encode($response);

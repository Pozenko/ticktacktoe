<?php
require_once 'DBConnector.php';

$response = $_POST['answerData'];

$connector = new DBConnector();
$conn = $connector->connect();

$stmtSelect = $conn->prepare("SELECT lastId, place FROM games WHERE id = :gameId");
$stmtSelect->execute(array(':gameId'=>$response['gameId']));
$row = $stmtSelect->fetch();
if($response['place'] != $row['place'] && $row['lastId'] != null){
    $response['position'] = $row['lastId'];
    $response['status'] = "success";
}

echo json_encode($response);
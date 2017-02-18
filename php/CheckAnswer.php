<?php
require_once 'DBConnector.php';

$response = $_POST['answerData'];
$gameId = $response['gameId'];
$id = $response['id'];
$place = $response['place'];

$connector = new DBConnector();
$conn = $connector->connect($response);
if($conn == null){
    echo json_encode($response);
}

$sql = "SELECT lastId, place FROM games WHERE id = '$gameId'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
if($row['lastId'] != $id && $row['place'] != $place){
    $response['position'] = $row['lastId'];
    $response['status'] = "success";
}
echo json_encode($response);
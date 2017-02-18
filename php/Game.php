<?php
require_once 'DBConnector.php';

$response = $_POST['gameData'];
$id = $response['id'];
$gameId = $response['gameId'];
$place = $response['place'];

$connector = new DBConnector();
$conn = $connector->connect($response);
if($conn == null){
    echo json_encode($response);
}
$sql = "SELECT status, step, lastId FROM games WHERE id = '$gameId'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

function sqlUpdate($conn, $row, $step, $gameId, $id, $place, &$response){
    $updateSql = "UPDATE games SET status = '$row', step = '$step', lastId = '$id', place = '$place' WHERE id = '$gameId'";
    if ($conn->query($updateSql) !== TRUE) {
        $response['error'] = $conn->error;
    }
    else{
        $response['status'] = "success";
    }
}

if($place == "first" && $row['step'] == 0){
    if($row['status'][$id] == "0"){
        $row['status'][$id] = "1";
        sqlUpdate($conn, $row['status'], 1, $gameId, $id, $place, $response);
    }
}
else if($place == "second" && $row['step'] == 1){
    if($row['status'][$id] == "0") {
        $row['status'][$id] = "2";
        sqlUpdate($conn, $row['status'], 0, $gameId, $id, $place, $response);
    }
}

echo json_encode($response);
$conn->close();
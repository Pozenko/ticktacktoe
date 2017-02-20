<?php
require_once 'DBConnector.php';

$response = $_POST['gameData'];

$connector = new DBConnector();
$conn = $connector->connect();

$stmtSelect = $conn->prepare("SELECT status, step, lastId FROM games WHERE id = :gameId");
$stmtSelect->execute(array(':gameId'=>$response['gameId']));
$row = $stmtSelect->fetch();

if($response['place'] == "first" && $row['step'] == 0){
    if($row['status'][$response['id']] == "0"){
        $row['status'][$response['id']] = "1";
        SqlUpdate($conn, $row, 1, $response);
        $response['status'] = "success";
    }
}
else if($response['place'] == "second" && $row['step'] == 1){
    if($row['status'][$response['id']] == "0"){
        $row['status'][$response['id']] = "2";
        SqlUpdate($conn, $row, 0, $response);
        $response['status'] = "success";
    }
}

function SqlUpdate(PDO $conn, $row, $step, $response){
    $stmtUpdate = $conn->prepare("UPDATE games 
                                  SET status = :rowStatus, step = '$step', lastId = :id, place = :place 
                                  WHERE id = :gameId");
    $stmtUpdate->bindParam(':rowStatus', $rowStatus);
    $stmtUpdate->bindParam(':id', $respId);
    $stmtUpdate->bindParam(':place', $respPlace);
    $stmtUpdate->bindParam(':gameId', $respGameId);

    $rowStatus = $row['status'];
    $respId = $response['id'];
    $respPlace = $response['place'];
    $respGameId = $response['gameId'];

    $stmtUpdate->execute();
}

echo json_encode($response);

<?php
require_once 'DBConnector.php';

$response = $_POST['answerData'];

$connector = new DBConnector();
$conn = $connector->connect();

$stmtSelect = $conn->prepare("SELECT status, lastId, place FROM games WHERE id = :gameId");
$stmtSelect->execute(array(':gameId'=>$response['gameId']));
$row = $stmtSelect->fetch();
if($response['place'] != $row['place'] && $row['lastId'] != null){
    $response['position'] = $row['lastId'];
    $response['status'] = "success";
}

//Check winner section
    //horizontal
if( $row['status'][0] == "1" && $row['status'][1] == "1" && $row['status'][2] == "1" ||
    $row['status'][3] == "1" && $row['status'][4] == "1" && $row['status'][5] == "1" ||
    $row['status'][6] == "1" && $row['status'][7] == "1" && $row['status'][8] == "1" ||
    //vertical
    $row['status'][0] == "1" && $row['status'][3] == "1" && $row['status'][6] == "1" ||
    $row['status'][1] == "1" && $row['status'][4] == "1" && $row['status'][7] == "1" ||
    $row['status'][2] == "1" && $row['status'][5] == "1" && $row['status'][8] == "1" ||
    //diagonal
    $row['status'][0] == "1" && $row['status'][4] == "1" && $row['status'][8] == "1" ||
    $row['status'][2] == "1" && $row['status'][4] == "1" && $row['status'][6] == "1" ){

    $response['isWinn'] = "first";
}
    //horizontal
if( $row['status'][0] == "2" && $row['status'][1] == "2" && $row['status'][2] == "2" ||
    $row['status'][3] == "2" && $row['status'][4] == "2" && $row['status'][5] == "2" ||
    $row['status'][6] == "2" && $row['status'][7] == "2" && $row['status'][8] == "2" ||
    //vertical
    $row['status'][0] == "2" && $row['status'][3] == "2" && $row['status'][6] == "2" ||
    $row['status'][1] == "2" && $row['status'][4] == "2" && $row['status'][7] == "2" ||
    $row['status'][2] == "2" && $row['status'][5] == "2" && $row['status'][8] == "2" ||
    //diagonal
    $row['status'][0] == "2" && $row['status'][4] == "2" && $row['status'][8] == "2" ||
    $row['status'][2] == "2" && $row['status'][4] == "2" && $row['status'][6] == "2" ){

    $response['isWinn'] = "second";
}
$isDraw = true;
for($i = 0; $i < 9; $i++){
    if($row['status'][$i] == "0"){
        $isDraw = false;
        break;
    }
}
if($isDraw == true){
    $response['isWinn'] = "draw";
}

echo json_encode($response);
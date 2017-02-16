<?php
require_once 'DBConnector.php';

$response = $_POST['playerData'];

$connector = new DBConnector();
$conn = $connector->connect($response);
if($conn == null){
    echo json_encode($response);
}

$sql = "SELECT  * FROM games WHERE player2 = ''";
$result = $conn->query($sql);


if($result->num_rows == 0) {
    $playerName = $response['player'];
    $insertSql = "INSERT INTO games (player1) VALUES ('$playerName')";
    if ($conn->query($insertSql) !== TRUE) {
        $response['error'] = $conn->error;
    }
    else{
        $response['gameId'] = $conn->insert_id;
        $response['isPlayer'] = "";
    }
    $result->free();
}
else{
   $row = $result->fetch_assoc();
   $player2Name = $response['player'];
   $id = $row['id'];
   $updateSql = "UPDATE games SET player2 = '$player2Name' WHERE id = '$id'";
   if ($conn->query($updateSql) !== TRUE) {
       $response['error'] = $conn->error;
   }
   else{
       $response['gameId'] = $id;
       $response['isPlayer'] = $row['player1'];
   }
   $result->free();
}
echo json_encode($response);
$conn->close();




<?php
require_once 'DBConnector.php';

$response = $_POST['playerData'];

$connector = new DBConnector();
$conn = $connector->connect();

$stmtSelect = $conn->query("SELECT * FROM games WHERE player2 = ''");
$rowCount = $stmtSelect->rowCount();
$row = $stmtSelect->fetch();

if($rowCount == 0){
    $stmtInsert = $conn->prepare("INSERT INTO games (player1) VALUES (:player)");
    $stmtInsert->bindParam(':player', $player);
    $player = $response['player'];
    $stmtInsert->execute();

    $response['gameId'] = $conn->lastInsertId();
    $response['isPlayer'] = "";
    $response['place'] = "first";
    $response['status'] = "success";
}
else{
    $stmtUpdate = $conn->prepare("UPDATE games SET player2 = :player2 WHERE id = :id");
    $stmtUpdate->bindParam(':player2', $player2);
    $stmtUpdate->bindParam(':id', $id);
    $player2 = $response['player'];
    $row['id'];
    $id = $row['id'];
    $stmtUpdate->execute();

    $response['gameId'] = $row['id'];;
    $response['isPlayer'] = $row['player1'];
    $response['place'] = "second";
    $response['status'] = "success";
}
echo json_encode($response);



//$sql = "SELECT  * FROM games WHERE player2 = ''";
//$result = $conn->query($sql);
//
//
//if($result->num_rows == 0) {
//    $playerName = $response['player'];
//    $insertSql = "INSERT INTO games (player1) VALUES ('$playerName')";
//    if ($conn->query($insertSql) !== TRUE) {
//        $response['error'] = $conn->error;
//    }
//    else{
//        $response['gameId'] = $conn->insert_id;
//        $response['isPlayer'] = "";
//        $response['place'] = "first";
//    }
//    $result->free();
//}
//else{
//   $row = $result->fetch_assoc();
//   $player2Name = $response['player'];
//   $id = $row['id'];
//   $updateSql = "UPDATE games SET player2 = '$player2Name' WHERE id = '$id'";
//   if ($conn->query($updateSql) !== TRUE) {
//       $response['error'] = $conn->error;
//   }
//   else{
//       $response['gameId'] = $id;
//       $response['isPlayer'] = $row['player1'];
//       $response['place'] = "second";
//   }
//   $result->free();
//}
//echo json_encode($response);
//$conn->close();




<?php
try {
    // データベースに接続
    $db = new PDO('mysql:dbname=LAA1571829-gomi;host=mysql220.phy.lolipop.lan;charset=utf8', 'LAA1571829', 'MQaJ9gT2RkYg8D8');

    // POSTリクエストからRoomIDを取得
    $RoomID = $_POST['RoomID'];

    // kaisiテーブルからRoomdateIDとactivityを取得
    $getRoomData = $db->prepare('SELECT RoomdateID, activity FROM roomid WHERE RoomID = ? && activity = 1');
    $getRoomData->execute([$RoomID]);
    $result = $getRoomData->fetch(PDO::FETCH_ASSOC);

    // 取得したデータをJSON形式で返す
    echo json_encode($result);
} catch (PDOException $e) {
    // エラーが発生した場合はエラーメッセージを返す
   // echo json_encode(['error' => 'DB接続エラー：' . $e->getMessage()]);
}
?>

<?php
try {
    // データベースに接続
    $db = new PDO('mysql:dbname=LAA1571829-gomi;host=mysql220.phy.lolipop.lan;charset=utf8', 'LAA1571829', 'MQaJ9gT2RkYg8D8');

    // POSTデータからRoomIDを取得
    $roomID = $_POST['RoomID'];

    // RoomIDがデータベースに存在するか確認
    $getRoomID = $db->prepare('SELECT RoomID FROM roomid WHERE RoomID = ?');
    $getRoomID->execute([$roomID]);
    $valid = $getRoomID->rowCount() > 0; // 結果の行数が0より大きい場合、存在するとみなす

    // 結果を返す
    echo json_encode(['valid' => $valid]);

    
} catch (Exception $e) {
    // エラーが発生した場合はエラーメッセージを返す
    echo json_encode(['error' => 'DB接続エラー：' . $e->getMessage()]);
}
?>

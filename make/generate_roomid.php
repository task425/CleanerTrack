<?php
try {
    // データベースに接続
    $db = new PDO('mysql:host=mysql220.phy.lolipop.lan;dbname=LAA1571829-gomi;charset=utf8','LAA1571829','MQaJ9gT2RkYg8D8');
   //$db = new PDO('mysql:dbname=gomi;host=127.0.0.1;charset=utf8', 'root', '');

    // RoomIDがデータベースに存在するか確認する関数
    function checkRoomIDExistence($roomID, $db) {
        $sql = "SELECT RoomID FROM roomid WHERE RoomID = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$roomID]);
        return $stmt->rowCount() > 0;
    }

    // ランダムなRoomIDを生成 (このロジックはカスタマイズ可能)
    function generateRandomRoomID() {
        return substr(str_shuffle(str_repeat('123456789', 8)), 0, 5);
    }

    // 無限ループを避けるための試行回数制限
    $maxAttempts = 100;
    $attempts = 0;

    do {
        // ランダムなRoomIDを生成
        $RoomID = generateRandomRoomID();

        // RoomIDがデータベースに存在するか確認
        $exists = checkRoomIDExistence($RoomID, $db);

        // 試行回数が制限に達した場合はエラーを返す
        if (++$attempts > $maxAttempts) {
            echo json_encode(['error' => '生成できる一意のRoomIDが見つかりませんでした。']);
            exit;
        }

    } while ($exists);

    // 結果を返す
    echo json_encode(['RoomID' => $RoomID]);
} catch (PDOException $e) {
    // エラーが発生した場合はエラーメッセージを返す
    echo json_encode(['error' => 'DB接続エラー：' . $e->getMessage()]);
}
?>

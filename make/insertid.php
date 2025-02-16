<?php
try {
    $db = new PDO('mysql:dbname=LAA1571829-gomi;host=mysql220.phy.lolipop.lan;charset=utf8', 'LAA1571829', 'MQaJ9gT2RkYg8D8');
    //$db = new PDO('mysql:dbname=gomi;host=127.0.0.1;charset=utf8', 'root', '');

    $RoomID = $_POST['RoomID'];
    $time = $_POST['time'];

    $countStatement = $db->prepare('SELECT COUNT(*) as count FROM roomid WHERE RoomID=?');
    $countStatement->execute([$RoomID]);
    $result = $countStatement->fetch(PDO::FETCH_ASSOC);
    $count = $result['count'] + 1;
    $a = 1;

    $RoomdateID = $RoomID . "" . $count;
    $RootID = $RoomdateID."".$a;

    $insertStatement1 = $db->prepare('INSERT INTO roomid SET RoomdateID=?,RoomID=?,time=?,activity=1');
    $insertStatement1->execute([$RoomdateID, $RoomID, $time]);
    $insertStatement2 = $db->prepare('INSERT INTO guest SET RootID=?,RoomdateID=?,GuestID=1');
    $insertStatement2->execute([$RootID,$RoomdateID]);


    // 返すべきデータを連想配列で定義
    $responseData = [
        'result' => 'success',      // あるいは他の成功を示す情報
        'count' => $count,           // カウントなど、他に必要な情報
        'RoomdateID' => $RoomdateID, // 生成されたRoomdateID
    ];

    echo json_encode($responseData);
} catch (PDOException $e) {
    // エラー時のレスポンスもJSON形式で返す
    $errorData = [
        'error' => 'DB接続エラー：' . $e->getMessage(),
    ];
    echo json_encode($errorData);
}
?>

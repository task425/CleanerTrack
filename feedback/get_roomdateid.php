<?php
try {
    $db = new PDO('mysql:host=mysql220.phy.lolipop.lan;dbname=LAA1571829-gomi;charset=utf8','LAA1571829','MQaJ9gT2RkYg8D8');
} catch (PDOException $e) {
    echo 'DB接続エラー:' . $e->getMessage();
}

// 選択された値を取得
if (isset($_POST['roomid']) && isset($_POST['time'])) {
    $roomid = $_POST['roomid'];
    $time = $_POST['time'];

    // プリペアドステートメントを使用してSQLを実行
    $stmt = $db->prepare("SELECT RoomdateID FROM roomid WHERE RoomID = :roomid AND time = :time");
    $stmt->bindParam(':roomid', $roomid, PDO::PARAM_INT);
    $stmt->bindParam(':time', $time, PDO::PARAM_STR);
    $stmt->execute();

    // 結果を取得
    $result = $stmt->fetchAll(PDO::FETCH_COLUMN);

    // 取得した値をechoで表示します
    if ($result) {
        echo json_encode($result);
    } else {
        echo "No results found.";
    }
} else {
    echo '選択された値がありません。';
}

// データベース接続を閉じる
$db = null;

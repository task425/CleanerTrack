<?php
try {
    $db = new PDO('mysql:host=mysql220.phy.lolipop.lan;dbname=LAA1571829-gomi;charset=utf8','LAA1571829','MQaJ9gT2RkYg8D8');
} catch (PDOException $e) {
    echo 'DB接続エラー:' . $e->getMessage();
}

// 選択された値を取得
if (isset($_POST['roomid'])) {
    $roomid = $_POST['roomid'];

    // プリペアドステートメントを使用してSQLを実行
    $stmt = $db->prepare("SELECT COUNT(*) FROM roomid WHERE RoomID = ?");
    $stmt->bindParam(1, $roomid, PDO::PARAM_INT);
    $stmt->execute();

        $result = $stmt -> fetchColumn();
        if ($result > 0) {
            // 条件に一致するレコードが存在する場合の処理
            echo true;
        } else {
            // 条件に一致するレコードが存在しない場合の処理
            echo false;
        }
} else {
    echo '選択された値がありません。';
}

// データベース接続を閉じる
$db = null;

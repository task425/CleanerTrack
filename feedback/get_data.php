<?php
try {
    $db = new PDO('mysql:host=mysql220.phy.lolipop.lan;dbname=LAA1571829-gomi;charset=utf8','LAA1571829','MQaJ9gT2RkYg8D8');
} catch (PDOException $e) {
    echo 'DB接続エラー:' . $e->getMessage();
}

// セレクトボックスにデータを追加
$options = "";

// 選択された値を取得
if(isset($_GET['roomid'])) {
    $roomid = $_GET['roomid'];

    // プリペアドステートメントを使用してSQLを実行
    $stmt = $db->prepare("SELECT * FROM roomid WHERE Roomid = :roomid");
    $stmt->bindParam(':roomid', $roomid, PDO::PARAM_INT);


    if ($stmt->execute()) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $options .= "<option value='" . $row['time'] . "'>" . $row['time'] . "</option>";
        }
    } else {
        echo "クエリ実行エラー:" . $stmt->errorInfo()[2];
    }
} else {
    echo '選択された値がありません。';
}

// オプションを返す
echo $options;

// データベース接続を閉じる
$db = null;
?>
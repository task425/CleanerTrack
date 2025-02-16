<?php
try {
    $db = new PDO('mysql:host=mysql220.phy.lolipop.lan;dbname=LAA1571829-gomi;charset=utf8','LAA1571829','MQaJ9gT2RkYg8D8');
} catch (PDOException $e) {
    echo 'DB接続エラー:' . $e->getMessage();
}

// 選択された値を取得
if (isset($_POST['roomdateid'])) {
    $roomdateid = $_POST['roomdateid'];

    // プリペアドステートメントを使用してSQLを実行
    $stmt = $db->prepare("SELECT RootID FROM guest WHERE roomdateID = :roomdateid");
    $stmt->bindParam(':roomdateid', $roomdateid, PDO::PARAM_INT);
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
?>
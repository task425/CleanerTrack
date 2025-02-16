<?php
try {
    $db = new PDO('mysql:host=mysql220.phy.lolipop.lan;dbname=LAA1571829-gomi;charset=utf8','LAA1571829','MQaJ9gT2RkYg8D8');
} catch (PDOException $e) {
    echo 'DB接続エラー:' . $e->getMessage();
}

// 選択された値を取得
if (isset($_POST['rootid'])) {
    $rootid = $_POST['rootid'];

    // プリペアドステートメントを使用してSQLを実行
    $stmt = $db->prepare("SELECT lat,lng,time FROM gomibukuro WHERE RootID = :rootid ");
    $stmt->bindParam(':rootid', $rootid, PDO::PARAM_INT);
    $stmt->execute();

    // 結果を取得
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // 取得した値をechoで表示します
    if ($result != NULL) {
        echo json_encode($result);
    } else {
        echo 0;
    }
} else {
    echo '選択された値がありません。';
}

// データベース接続を閉じる
$db = null;
?>
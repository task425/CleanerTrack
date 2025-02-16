<?php
try {
    $db = new PDO('mysql:host=mysql220.phy.lolipop.lan;dbname=LAA1571829-gomi;charset=utf8','LAA1571829','MQaJ9gT2RkYg8D8');
} catch (PDOException $e) {
    echo 'DB接続エラー:' . $e->getMessage();
}

// 選択された値を取得
if (isset($_POST['starttime']) && isset($_POST['endtime']) && isset($_POST['rootid'])) {
    $rootid = $_POST['rootid'];
    $starttime = $_POST['starttime'];
    $endtime = $_POST['endtime'];

    // プリペアドステートメントを使用してSQLを実行
    $stmt = $db->prepare("SELECT lat,lng FROM root WHERE RootID = :rootid AND time > :starttime AND time < :endtime");
    $stmt->bindParam(':rootid', $rootid, PDO::PARAM_INT);
    $stmt->bindParam(':starttime', $starttime, PDO::PARAM_STR);
    $stmt->bindParam(':endtime', $endtime, PDO::PARAM_STR);
    $stmt->execute();

    // 結果を取得
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // 取得した値をechoで表示します
    if ($result) {
        echo json_encode($result);
    } else {
        echo json_encode("No results found.");
    }
} else {
    echo '選択された値がありません。';
}

// データベース接続を閉じる
$db = null;
?>
<?php
try {
    $db = new PDO('mysql:host=mysql220.phy.lolipop.lan;dbname=LAA1571829-gomi;charset=utf8','LAA1571829','MQaJ9gT2RkYg8D8');
} catch (PDOException $e) {
    echo 'DB接続エラー:' . $e->getMessage();
}

// 選択された値を取得
if(isset($_POST['roomdateid'])) {
    $roomdateid = $_POST['roomdateid'];

    // プリペアドステートメントを使用してSQLを実行
    $stmt = $db->prepare("SELECT * FROM kaisizahyou WHERE RoomdateID = ?");
    $stmt->bindParam(1, $roomdateid, PDO::PARAM_INT);
    $stmt->execute();

    // 結果を取得
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (empty($result)) {
        echo json_encode(array('message' => 'データがありません。'));
    } else {
        // 結果をJSON形式で出力（もしくは他の処理を行う）
        echo json_encode($result);
    }

} else {
    echo '選択された値がありません。';
}

// データベース接続を閉じる
$db = null;
?>

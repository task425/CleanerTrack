<?php
try {
    $db = new PDO('mysql:host=mysql220.phy.lolipop.lan;dbname=LAA1571829-gomi;charset=utf8','LAA1571829','MQaJ9gT2RkYg8D8');
} catch (PDOException $e) {
    echo 'DB接続エラー:' . $e->getMessage();
}

    $RoomdateID = $_POST['RoomdateID'];

    // プリペアドステートメントを使用してSQLを実行
    $stmt = $db->prepare("SELECT RootID FROM guest WHERE RoomdateID = :RoomdateID");
    $stmt->bindParam(':RoomdateID', $RoomdateID, PDO::PARAM_INT);
    $stmt->execute();

    // 結果を取得
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // 結果をJSON形式で出力（もしくは他の処理を行う）
    echo json_encode($result);

// データベース接続を閉じる
$db = null;
?>

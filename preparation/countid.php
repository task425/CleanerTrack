<?php
try {
    $db = new PDO('mysql:dbname=LAA1571829-gomi;host=mysql220.phy.lolipop.lan;charset=utf8', 'LAA1571829', 'MQaJ9gT2RkYg8D8');
} catch (PDOException $e) {
    echo 'DB接続エラー：' . $e->getMessage();
    exit(); // 実行の停止
}

// POSTリクエストでroomdateIDが設定されているか確認
if (isset($_POST['RoomdateID'])) {
    $roomdateID = $_POST['RoomdateID'];

    $statement = $db->prepare('SELECT COUNT(*) as count FROM guest WHERE RoomdateID = ?');
    $statement->bindParam(1, $roomdateID, PDO::PARAM_INT);
    $statement->execute();

    // 結果を取得
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    
    
        $count = $result['count'];
        // 結果をJSON形式で返す
        echo json_encode(['count' => $count]);
  
} else {
    // roomdateIDがPOSTリクエストで設定されていない場合の処理
    echo json_encode(['error' => 'roomdateID not set']);
}
?>

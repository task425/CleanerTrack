<?php
try {
    $db = new PDO('mysql:dbname=LAA1571829-gomi;host=mysql220.phy.lolipop.lan;charset=utf8', 'LAA1571829', 'MQaJ9gT2RkYg8D8');

    $RoomdateID = $_POST['RoomdateID']; // セミコロンを追加

    do {
        // ゲストIDを生成
        $randomGuestID = generateRandomGuestID();

        // 同じRoomdateIDかつ同じGuestIDのレコードが存在するか確認
        $checkRoomDuplicate = $db->prepare('SELECT COUNT(*) FROM guest WHERE RoomdateID = ? AND GuestID = ?');
        $checkRoomDuplicate->execute([$RoomdateID, $randomGuestID]);
        $isRoomDuplicate = $checkRoomDuplicate->fetchColumn() > 0;
    } while ($isRoomDuplicate);

    $RootID = $RoomdateID . "" . $randomGuestID;

    // ゲストIDとRoomdateIDを挿入
    $statement = $db->prepare('INSERT INTO guest (RootID, RoomdateID, GuestID) VALUES (?, ?, ?)');
    $statement->execute([$RootID, $RoomdateID, $randomGuestID]);

    echo json_encode(['GuestID' => $randomGuestID]);
} catch (PDOException $e) {
    echo 'DB接続エラー：' . $e->getMessage();
}

function generateRandomGuestID() {
    return rand(1, 999); // random.randint() を rand() に修正
}
?>

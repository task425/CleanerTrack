<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> 
    <h2>Practice</h2>
    <pre>
        <?php
        try {
    $db = new PDO('mysql:dbname=LAA1571829-gomi;host=mysql220.phy.lolipop.lan;charset=utf8', 'LAA1571829', 'MQaJ9gT2RkYg8D8');

            $RoomdateID = $_POST['RoomdateID'];
            $RoomID = $_POST['RoomID'];
            // $nelat = $_POST['nelat'];
            // $nelng = $_POST['nelng'];
            $ne = $_POST['ne'];
            // $nwlat = $_POST['nwlat'];
            // $nwlng = $_POST['nwlng'];
            $nw = $_POST['nw'];
            // $swlat = $_POST['swlat'];
            // $swlng = $_POST['swlng'];
            $sw = $_POST['sw'];
            // $selat = $_POST['selat'];
            // $selng = $_POST['selng'];
            $se = $_POST['se'];

            // do {
                // ゲストIDを生成
                // $randomGuestID = generateRandomGuestID();

            //     // 同じRoomdateIDかつ同じGuestIDのレコードが存在するか確認
            //     $checkRoomDuplicate = $db->prepare('SELECT COUNT(*) FROM guest WHERE RoomdateID = ? AND GuestID = ?');
            //     $checkRoomDuplicate->execute([$RoomdateID, $randomGuestID]);
            //     $isRoomDuplicate = $checkRoomDuplicate->fetchColumn() > 0;
            // } while ($isRoomDuplicate);

            // ゲストIDとRoomdateIDを挿入
            // $statement = $db->prepare('INSERT INTO kaisizahyou (RoomdateID, RoomID, nelat, nelng, nwlat, nwlng, swlat, swlng, selat, selng) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
            // $statement->execute([$RoomdateID, $RoomID, $nelat, $nelng, $nwlat, $nwlng, $swlat, $swlng, $selat, $selng]);
            $statement = $db->prepare('INSERT INTO kaisizahyou (RoomdateID, RoomID, ne, nw, sw, se) VALUES (?, ?, ?, ?, ?, ?)');
            $statement->execute([$RoomdateID, $RoomID, $ne, $nw, $sw, $se]);

            echo "データが正常に挿入されました";
        } catch (PDOException $e) {
            echo 'DB接続エラー：' . $e->getMessage();
        }

        // function generateRandomGuestID() {
        //     return bin2hex(random_bytes(8)); // ランダムなGuestIDを生成
        // }
        ?>
    </pre>
</body>
</html>

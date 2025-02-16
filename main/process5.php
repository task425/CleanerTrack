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
    $db = new PDO('mysql:host=mysql220.phy.lolipop.lan;dbname=LAA1571829-gomi;charset=utf8','LAA1571829','MQaJ9gT2RkYg8D8');

            // POSTデータとして 'RoomdateID' が送信されていると仮定
            $RoomdateID = $_POST['RoomdateID'];

            // UPDATE文を実行
            $statement = $db->prepare('UPDATE roomid SET activity = 0 WHERE RoomdateID = ?');
            $statement->execute([$RoomdateID]);

            echo "データが正常に更新されました";
        } catch (PDOException $e) {
            echo 'DB接続エラー：' . $e->getMessage();
        }

        ?>
    </pre>
</body>
</html>

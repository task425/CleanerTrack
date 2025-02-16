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

            $RootID = $_POST['RootID'];
            $time = $_POST['time'];
            $lat = $_POST['lat'];
            $lng = $_POST['lng'];

            $statement = $db->prepare('INSERT INTO root (RootID, time, lat, lng) VALUES (?, ?, ?, ?)');
            $statement->execute([$RootID, $time, $lat, $lng]);

            echo "データが正常に挿入されました";
        } catch (PDOException $e) {
            echo 'DB接続エラー：' . $e->getMessage();
        }

        ?>
    </pre>
</body>
</html>

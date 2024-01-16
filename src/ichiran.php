
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
</head>
<body>
<table>
    <tr><th>商品名</th><th>価格</th><th>
    <?php
    $pdo = new PDO('mysql:host=mysql220.phy.lolipop.lan;dbname=LAA1517363-final;charset=utf8',
    'LAA1517363','Pass0303');
    foreach($pdo->query('select * from MAC') as $row) {
        echo '<p>';
        echo $row['id'], ':';
        echo $row['name'], ':';
        echo $row['price'];
        echo '</p>';
    }
    ?>
    </table>
</body>
</html>
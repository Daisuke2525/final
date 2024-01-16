<?php
const SERVER = 'mysql220.phy.lolipop.lan';
const DBNAME = 'LAA1517363-final';
const USER = 'LAA1517363';
const PASS = 'Pass0303';
$connect = 'mysql:host=' . SERVER . ';dbname=' . DBNAME . ';charset=utf8';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>追加</title>
</head>
<body>
    <p>商品を追加します。</P>
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
    <form action="touroku-input.php" method="post">
        商品番号<input type="text" name="id"><br>
        商品名<input type="text" name="name"><br>
        価格<input type="text" name="price"><br>
        <input type="submit">追加</button>
        </form>
    </body>
</html>
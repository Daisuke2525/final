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
    <title>商品更新</title>
</head>
<body>
<table>
    <tr>
        <th>商品番号</th>
        <th>商品名</th>
        <th>商品価格</th>
    </tr>
    <?php
    $pdo = new PDO($connect, USER, PASS);

    // music_idがPOSTされたかどうかを確認
    if(isset($_POST['mac_id'])) {
        $macId = $_POST['mac_id'];

        // SQLインジェクション対策のためにプレースホルダを使用
        $sql = $pdo->prepare('SELECT * FROM MAC WHERE mac_id = ?');
        $sql->execute([$macId]);

        foreach ($sql as $row) {
            echo '<tr>';
            echo '<form action="edit-output.php" method="post">';
            echo '<td>';
            echo '<input type="text" name="mac_id" value="' . $row['mac_id'] . '">';
            echo '</td>';
            echo '<td>';
            echo '<input type="text" name="mac_name" value="' . $row['mac_name'] . '">';
            echo '</td>';
            echo '<td>';
            echo '<input type="text" name="price" value="' . $row['price'] . '">';
            echo '</td>';
            echo '<td><input type="submit" value="更新"></td>';
            echo '</form>';
            echo '</tr>';
            echo "\n";
        }
    } else {
        echo '<tr><td colspan="4">データがありません</td></tr>';
    }
    ?>
</table>
<button onclick="location.href='index.php'">トップへ戻る</button>
</body>
</html>

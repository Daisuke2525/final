<?php
const SERVER = 'mysql220.phy.lolipop.lan';
const DBNAME = 'LAA1517363-final';
const USER = 'LAA1517363';
const PASS = 'Pass0303';

$connect = 'mysql:host='. SERVER . ';dbname='. DBNAME . ';charset=utf8';
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>商品削除</title>
</head>
<body>

<?php
$pdo = new PDO($connect, USER, PASS);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['mac_id'])) {
    $mac_id = $_POST['mac_id'];
    $sql = $pdo->prepare('DELETE FROM MAC WHERE mac_id = ?');
    if ($sql->execute([$mac_id])) {
        echo '削除に成功しました。';
    } else {
        echo '削除に失敗しました。';
    }
}

echo '<br><hr><br>';
?>

<table>
    <tr>
        <th>商品番号</th>
        <th>商品名</th>
        <th>商品価格</th>
    </tr>

<?php
$stmt = $pdo->query('SELECT * FROM MAC');

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo '<tr>';
    echo '<td>', $row['mac_id'], '</td>';
    echo '<td>', $row['mac_name'], '</td>';
    echo '<td>', $row['price'], '</td>';
    echo '</tr>';
    echo "\n";
}
?> 
</table>

<form action="index.php" method="post">
    <button type="submit">トップへ戻る</button>
</form>

</body>
</html>

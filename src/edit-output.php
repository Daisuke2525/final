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
<?php
$pdo = new PDO($connect, USER, PASS);

if (isset($_POST['mac_id'])) {
    $macId = $_POST['mac_id'];

    $sql = $pdo->prepare('SELECT * FROM MAC WHERE mac_id = ?');
    $sql->execute([$macId]);

    if ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
        echo '<table>';
        echo '<tr><th>商品番号</th><th>商品名</th><th>商品価格</th></tr>';
        echo '<tr>';
        echo '<td>', $row['mac_id'], '</td>';
        echo '<td>', $row['mac_name'], '</td>';
        echo '<td>', $row['price'], '</td>';
        echo '</tr>';
        echo '</table>';
        
        echo '<hr>';
        
        if (empty($_POST['mac_name'])) {
            echo '商品名を入力してください。';
        } elseif (empty($_POST['price'])) {
            echo '商品価格を入力してください。';
        } else {
            // SQL文を準備
            $updateSql = $pdo->prepare('UPDATE MAC SET mac_name = ?, price = ? WHERE mac_id = ?');

            // SQLを実行
            if ($updateSql->execute([htmlspecialchars($_POST['mac_name']), $_POST['price'], $macId])) {
                echo '更新に成功しました。';
            } else {
                echo '更新に失敗しました。';
            }
        }
    } else {
        echo 'データがありません。';
    }
} else {
    echo 'データがありません。';
}


?>

<button onclick="location.href='index.php'">トップに戻る</button>

</body>
</html>

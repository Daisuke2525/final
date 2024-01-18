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
    <meta http-equiv="Cache-Control" content="no-cache">
		<meta charset="UTF-8">
		<title>マクドナルド商品一覧</title>
	</head>
	<body>
        <h1>商品一覧</h1>
        <hr>
        <button onclick="location.href='toroku-input.php'">商品を登録する</button>
        <table>
    <tr><th>商品番号</th><th>商品名</th><th>商品価格</th><th>更新</th><th>削除</th></tr>
<?php
    $pdo=new PDO($connect, USER, PASS);
    foreach ($pdo->query('select * from MAC') as $row) {
        echo '<tr>';
        echo '<td>', $row['mac_id'], '</td>';
        echo '<td>', $row['mac_name'], '</td>';
        echo '<td>', $row['price'], '</td>';
        echo '<td>';

        echo '<form action = "edit.php" method = "post">';
        echo '<input type = "hidden" name = "mac_id" value = "', $row['mac_id'], '">';
        echo '<button type = "submit">更新</button>';
        echo '</form>';

        echo '</td>';
        echo '<td>';

        echo '<form action = "delete.php" method = "post">';
        echo '<input type = "hidden" name = "mac_id" value = "', $row['mac_id'], '">';
        echo '<button type = "submit">削除</button>';
        echo '</form>';


        echo '</td>';
        echo '</tr>';
        echo "\n";
    }
?>
    </table>
    </body>
</html>

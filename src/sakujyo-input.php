<?php
const SERVER ='mysql220.phy.lolipop.lan';
const DBNAME ='LAA1517363-final';
const USER ='LAA1517363';
const PASS ='Pass0303';

    $connect = 'mysql:host='. SERVER . ';dbname='. DBNAME . ';charset=utf8';
?>
<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body>
        <table>
    <tr><th>商品番号</th><th>商品名</th><th>商品価格</th></tr>
<?php
    $pdo=new PDO($connect, USER, PASS);
    foreach ($pdo->query('select * from MAC') as $row) {
    echo '<tr>';
    echo '<td>', $row['id'], '</td>';
    echo '<td>', $row['name'], '</td>';
    echo '<td>', $row['price'], '</td>';
    echo '<td>';
    echo '<a href="sakujyo-output.php?id=',$row['id'],'">削除</a>';
    echo '</td>';
    echo '</tr>';
    echo "\n";
    }

?>
    </table>
    </body>
</html>

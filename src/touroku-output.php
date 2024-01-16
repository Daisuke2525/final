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
    <title></title>
</head>
<body>
    <?php
    $pdo=new PDO($connect,USER,PASS);
    $sql=$pdo->prepare('insert into MAC(id,name,price)values(?,?,?)');
    if (!preg_match('/^\d+$/',$_POST['id'])){
        echo'商品番号を整数で入力してください。';
        }else if(empty($_POST['name'])){
            echo '商品名を入力してください。';
        }else if(!preg_match('/^[0-9]+$/',$_POST['price'])){
            echo '商品価格を整数で入力してください。';
        }else if($sql->execute([$_POST['id'],$_POST['name'],$_POST['price']])){
            echo '<font color="red"追加に成功しました。</font>';
        }else {
            echo '<font color="red"追加に失敗しました。</font>';
        }
    ?>
    <br><hr><br>
    <table>
        <tr><th>商品番号</th><th>商品名</th><th>価格</th></tr>
    <?php
    foreach($pdo->query('select * from MAC') as $row) {
        echo '<tr>';
        echo '<td>', $row['id'], '</td>';
        echo '<td>' ,$row['name'], '</td>';
        echo '<td>' ,$row['price'], '</td>';
        echo '</tr>';
         echo "\n";
    }
?>
</table>
<form action="touroku-input.php" method="post">
<button type="submit">追加</button>
</form>
<button onclick="location.href='ichiran.php'">トップへ戻る</button>
    </body>
</html>
<?php require 'db-connect.php'; ?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
<?php
// データベース接続
try {
    $pdo = new PDO($connect, USER, PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'データベース接続エラー: ' . $e->getMessage();
    exit();
}

// レシピが送信された場合
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // フォームから送信されたデータを取得
    $mac_name = $_POST['mac_name'];
    $price = $_POST['price'];

    // SQLクエリの準備
    $sql = "INSERT INTO MAC (mac_id, mac_name, price) VALUES (:mac_id, :mac_name, :price)";

    // プリペアドステートメントの作成
    $stmt = $pdo->prepare($sql);

    // パラメータのバインド
    $stmt->bindParam(':mac_id', $mac_id, PDO::PARAM_INT);
    $stmt->bindParam(':mac_name', $mac_name, PDO::PARAM_STR);
    $stmt->bindParam(':price', $price, PDO::PARAM_STR);

    try {
        // クエリの実行
        $stmt->execute();

        // 登録成功時のメッセージ
        echo '<p class="has-text-success">レシピが正常に登録されました。</p>';
    } catch (PDOException $e) {
        // エラーメッセージ
        echo '<p class="has-text-danger">エラー: ' . $e->getMessage() . '</p>';
    }
}
?>
<nav class="level">
<!-- 中央揃え -->
<div class="level-item">
<p><button onclick = "location.href='ichiran.php'">コラム管理画面へ</button></p>
</div>
</nav>
</div>
</diV>

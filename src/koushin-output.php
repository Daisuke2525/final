<?php require 'db-connect.php'; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cooking_id'])) {
    try {
        // データベース接続
        $pdo = new PDO($connect, USER, PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // POSTデータ受け取り
        $cooking_id = $_POST['cooking_id'];
        $cooking_name = $_POST['cooking_name'];
        $category = $_POST['category'];

        // Cookingテーブルのデータ更新のSQLクエリ
        $sql = "UPDATE Cooking SET cooking_name = :cooking_name, category = :category WHERE cooking_id = :cooking_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':cooking_id', $cooking_id, PDO::PARAM_INT);
        $stmt->bindParam(':cooking_name', $cooking_name, PDO::PARAM_STR);
        $stmt->bindParam(':category', $category, PDO::PARAM_STR);
        $stmt->execute();

        // 成功メッセージ
        echo "レシピが更新されました。";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    } finally {
        // データベース接続を閉じる
        $pdo = null;
    }
} else {
    echo "不正なアクセスです";
}
?>
<nav class="level">
<!-- 中央揃え -->
<div class="level-item">
<p><button onclick = "location.href='ichiran.php'">コラム管理画面へ</button></p>
</div>
</nav>
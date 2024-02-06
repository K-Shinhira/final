<?php require 'db-connect.php'; ?>
<?php
    if(!empty($_GET)) {
        $sql = $pdo->prepare('UPDATE items SET title = ? , category_id = ? WHERE item_id = ?');
        $sql->execute([$_GET['title'],$_GET['category'],$_GET['id']]);
         // index.php へのリダイレクト
        header('Location: index.php');
        exit();
    } else {
    // パラメータが提供されていない場合、index.php へリダイレクト
        header('Location: index.php');
        exit();
}
?>
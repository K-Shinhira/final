<?php require 'db-connect.php'; ?>
<?php
    if(!empty($_POST)) {
        $sql=$pdo->prepare('insert into items values(null,?,?,default,default)');
        $sql->execute([$_POST['title'] , $_POST['category']]);
        header('Location:index.php');
    }else{
        header('Location:index.php');
        exit();
    }
?>
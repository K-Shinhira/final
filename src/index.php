<?php require 'db-connect.php'; ?>

<?php
$TodoList_sql='
select * from items where watched = 0
';
$CateroryList_sql='
select * from categories
';
$Ranking_Anime_sql='
select * from items as A inner join categories as B 
on A.category_id = B.category_id 
where A.category_id = 1 AND watched = 1 
order by rating desc
';
$Ranking_Drama_Movie_sql='
select * from items as A inner join categories as B 
on A.category_id = B.category_id 
where A.category_id = 2 AND watched = 1 
order by rating desc
';
$Ranking_Book_sql='
select * from items as A inner join categories as B 
on A.category_id = B.category_id 
where A.category_id = 3 AND watched = 1 
order by rating desc
';
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>最終課題</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- リセット.CSS -->
<link rel="stylesheet" href="https://unpkg.com/modern-css-reset/dist/reset.min.css"/>
<!-- Bootstrap.CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<!-- アイコン -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
<!-- 共通CSS -->
<link rel="stylesheet" href="css/common.css"/>
</head>

<body>
<!-- メインコンテンツ -->
<div class="container text-center">
    <!-- 2つのコンテンツを横or縦(横幅が狭いとき)に -->
  <div class="row justify-content-md-center">
    <div class="col-md py-3">
        <!-- Todo ボックス-->
        <div class="card card-body overflow-auto" style="height: 100%;">
            <!-- Todo ボックス ヘッダー-->
            <h1 class="card-title row justify-content-start ms-1">TODO</h1>
            <!-- Todo ボックス　メインコンテンツ-->
<?php
    $smtp=$pdo->query($TodoList_sql);
    echo '<ul class="list-group list-group-flush row justify-content-center">';
    foreach($smtp as $row){
        echo '<li class="list-group-item d-flex justify-content-between align-items-center">';
        echo '<button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#CheckTodoModal" data-bs-id="',$row['item_id'],'" data-bs-title="',$row['title'],'">';
        echo '</button>';
        echo '<label class="form-check-label flex-grow-1 text-start txt-limit1">',$row['title'],'</label>';
        echo '<button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#EditTodoModal" data-bs-id="',$row['item_id'],'" data-bs-title="',$row['title'],'" data-bs-category="',$row['category_id'],'">';
        echo '<i class="fas fa-ellipsis-v"></i>';
        echo '</button>';
        echo '</li>';
    }
    echo '</ul>';
?>
            <!-- Todo ボックス　フッダー-->
            <button class="btn btn-primary mt-3 row justify-content-end" type="button" data-bs-toggle="modal" data-bs-target="#AddTodo">
            AddTodo
            </button>
        </div>
    </div>
    <div class="col-md py-3">
        <!-- Ranking ボックス-->
            <div class="row justify-content-start pb-1">
                <div class="card w-60 bg-warning-subtle">
                    <div class="card-body" type="button" data-bs-toggle="modal" data-bs-target="#Ranking_Anime_Modal">
                        <h5 class="card-title">好きなアニメTOP3</h5>
                    <?php
                    echo '<ol class="list-group list-group-flush list-group-numbered">';
                    $smtp=$pdo->query($Ranking_Anime_sql.' limit 3');
                    foreach($smtp as $row){
                        echo '<li class="list-group-item mb-1 txt-limit1">',$row['title'],'</li>';
                    }
                    echo '</ol>';
                    ?>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center pb-1">
                <div class="card w-60 bg-warning-subtle">
                    <div class="card-body" type="button" data-bs-toggle="modal" data-bs-target="#Ranking_Drama_Movie_Modal">
                        <h5 class="card-title">好きな映画・ドラマTOP3</h5>
                        <?php
                        echo '<ol class="list-group list-group-flush list-group-numbered">';
                        $smtp=$pdo->query($Ranking_Drama_Movie_sql.' limit 3');
                        foreach($smtp as $row){
                            echo '<li class="list-group-item mb-1 txt-limit1">',$row['title'],'</li>';
                        }
                        echo '</ol>';
                        ?>
                    </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="card w-60 bg-warning-subtle">
                    <div class="card-body" type="button" data-bs-toggle="modal" data-bs-target="#Ranking_Book_Modal">
                        <h5 class="card-title">好きなBookTOP3</h5>
                        <?php
                        echo '<ol class="list-group list-group-flush list-group-numbered">';
                        $smtp=$pdo->query($Ranking_Book_sql.' limit 3');
                        foreach($smtp as $row){
                            echo '<li class="list-group-item mb-1 txt-limit1">',$row['title'],'</li>';
                        }
                        echo '</ol>';
                        ?>
                    </div>
                </div>
            </div>
    </div>
</div>
<?php require 'AddTodo.php'; ?>
<?php require 'CheckTodo.php'; ?>
<?php require 'EditTodo.php'; ?>
<?php require 'Ranking_Anime_Modal.php'; ?>
<?php require 'Ranking_Book_Modal.php'; ?>
<?php require 'Ranking_Drama_Movie_Modal.php'; ?>

<!-- Bootstrap.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<!-- Common.Script -->
<script src="./script/common.js"></script>
</body>
</html>
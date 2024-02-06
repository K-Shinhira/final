<!-- モーダル AddTodo　-->
<div class="modal fade" id="AddTodo" tabindex="-1" aria-labelledby="AddTodolabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- モーダルのヘッダー -->
            <div class="modal-header">
            <h4 class="modal-title fs-5" id="AddTodolabel">リストに追加する</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <form class="form-group" method="POST" action="add_data.php">
                <!-- モーダルのフォーム -->
                <div class="modal-body">
                    <label for="inputTitle">タイトル</label>
                    <input id="inputTitle" type="text" class="form-control" name="title" required>
                    <label for="inputCategory">カテゴリ</label>
                    <select id="inputCategory" class="form-select" name="category">
                        <?php
                        $smtp=$pdo->query($CateroryList_sql);
                        foreach($smtp as $row){
                            echo '<option value="',$row['category_id'],'">',$row['category_name'],'</option>';
                        }
                        ?>
                    </select>
                </div>
                <!-- モーダルのフッター -->
                <div class="modal-footer">
                    <button id="addTodoButton" class="btn btn-primary mt-3" type="submit">追加</button>
                </div>
            </form>
        </div>
    </div>
</div>
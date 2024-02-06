<!-- モーダル EditTodo　-->
<div class="modal fade" id="EditTodoModal" tabindex="-1" aria-labelledby="EditTodoModallabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- モーダルのヘッダー -->
            <div class="modal-header">
                <h4 class="modal-title fs-5" id="EditTodoModallabel">編集しています</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- モーダルの本文 -->
            <div class="modal-body">
                <form id="EditTodoForm">
                    <div class="mb-3">
                        <label for="EditTitle" class="col-form-label">タイトル</label>
                        <input type="text" class="form-control" id="EditTitle" name="title">
                    </div>
                    <div class="mb-3">
                        <label for="EditCategory" class="col-form-label">カテゴリ</label>
                        <select class="form-select" id="EditCategory" name="category">
                        <?php
                        $smtp=$pdo->query($CateroryList_sql);
                        foreach($smtp as $row){
                            echo '<option value="',$row['category_id'],'">',$row['category_name'],'</option>';
                        }
                        ?>
                        </select>
                    </div>
                </form>
            </div>

            <!-- モーダルのフッター -->
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger mt-3" id="Edit_delete">削除</button>
                <button type="button" class="btn btn-primary mt-3" id="Edit_update">編集</button>
            </div>
        </div>
    </div>
</div>

<script>
const EditTodoModal = document.getElementById('EditTodoModal')
if (EditTodoModal) {
    EditTodoModal.addEventListener('show.bs.modal', event => {
    // モーダルをトリガーしたボタン
    const button = event.relatedTarget
    // data-bs-* 属性から情報を抽出する
    const data1 = button.getAttribute('data-bs-id')
    const data2 = button.getAttribute('data-bs-title')
    const data3 = button.getAttribute('data-bs-category')
    // If necessary, you could initiate an Ajax request here
    // コールバックで更新を行います

    // モーダル表示時の変更
    const modalBodyInputittle = EditTodoModal.querySelector('.modal-body input')
    modalBodyInputittle.value = data2
    const modalBodySelectOptions = EditTodoModal.querySelector('.modal-body select').options
    for (let SelectOption of modalBodySelectOptions) {
        if(SelectOption.value === data3) SelectOption.selected = true;
    }

    //ボタンを押したときの処理
    const modaldeletebutton = document.getElementById('Edit_delete')
    modaldeletebutton.addEventListener('click', function(){
        location.href = "delete_data.php?id="+data1
    });
    const modalupdatebutton = document.getElementById('Edit_update')
    modalupdatebutton.addEventListener('click', function(){
        const updatetitle = EditTodoModal.querySelector('.modal-body input').value
        const updatecategory = EditTodoModal.querySelector('.modal-body select').value
        location.href = "update_data.php?id="+data1+"&title="+updatetitle+"&category="+updatecategory
    });
  })
}
</script>
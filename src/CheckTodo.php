<!-- モーダル CheckTodo -->
<div class="modal fade" id="CheckTodoModal" tabindex="-1" aria-labelledby="CheckTodoModallabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- モーダルのヘッダー -->
            <div class="modal-header">
                <h4 class="modal-title fs-5" id="CheckTodolabel"></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- モーダルの本文 -->
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="evaluation" class="col-form-label">評価を選択してください。</label>
                        <input type="range" class="form-range" min="0" max="5" step="0.5" id="evaluation">
<!--
                        <datalist id="values">
                            <option value="0" label="1"></option>
                            <option value="25" label="2"></option>
                            <option value="50" label="3"></option>
                            <option value="75" label="4"></option>
                            <option value="100" label="5"></option>
                        </datalist>
-->
                        <h4>☆<span id="current-value"></span></h4>
                    </div>
                </form>
            </div>

            <!-- モーダルのフッター -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary mt-3" id="completeTodo">コンプリート</button>
            </div>
        </div>
    </div>
</div>

<script>
const CheckTodoModal = document.getElementById('CheckTodoModal')
if (CheckTodoModal) {
    CheckTodoModal.addEventListener('show.bs.modal', event => {
    // モーダルをトリガーしたボタン
    const button = event.relatedTarget
    // data-bs-* 属性から情報を抽出する
    const data1 = button.getAttribute('data-bs-id')
    const data2 = button.getAttribute('data-bs-title')
    // If necessary, you could initiate an Ajax request here
    // コールバックで更新を行います

    // モーダル表示時の変更
    const modalTitle = CheckTodoModal.querySelector('.modal-title')
    modalTitle.textContent = `${data2}`

    //ボタンを押したときの処理
    const modalcompletebutton = document.getElementById('completeTodo')
    modalcompletebutton.addEventListener('click', function(){
        const rating = CheckTodoModal.querySelector('.modal-body input').value
        location.href = "complete.php?id="+data1+"&rating="+rating
    })
  })
    // input要素
    const inputElem = document.getElementById('evaluation');

    // 埋め込む先の要素
    const currentValueElem = document.getElementById('current-value');

    // 現在の値を埋め込む関数
    const setCurrentValue = (val) => {
        currentValueElem.innerText = val;
    }

    // inputイベント時に値をセットする関数
    const rangeOnChange = (e) =>{
        setCurrentValue(e.target.value);
    }

    window.onload = () => {
    // 変更に合わせてイベントを発火する
    inputElem.addEventListener('input', rangeOnChange);
    // ページ読み込み時の値をセット
    setCurrentValue(inputElem.value);
    }
}
</script>
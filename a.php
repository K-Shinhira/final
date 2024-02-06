
    <style>
    body {
      padding-top: 50px;
    }
    .starter-template {
      padding: 40px 15px;
      text-align: center;
    }
    </style>



    <div class="container">
      <div class="starter-template">
        <h1 id="title">Bootstrap スターターテンプレート</h1>
        <p id="content" class="lead">このドキュメントを新しいプロジェクトを素早く始めるための方法としてお使いください。<br>必要なものはこのテキストとほぼ最小限の HTML ドキュメントです。</p>

        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
        記事を編集する
        </button>
      </div>
    </div><!-- /.container -->

    <!-- Modal -->
    <div class="modal fade" id="AddTodo" tabindex="-1" aria-labelledby="AddTodo_Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
          <h4 class="modal-title fs-5" id="AddTodolLabel">リストに追加する</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="inputTitle">タイトル</label>
              <input id="inputTitle" type="text" class="form-control">
            </div>
            <div class="form-group">
              <label for="inputContent">コンテンツ</label>
              <textarea id="inputContent" class="form-control" rows="5"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">キャンセル</button>
            <button id="save" type="button" class="btn btn-primary" data-dismiss="modal">保存する</button>
          </div>
        </div>
      </div>
    </div>


    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script>
    $('#myModal').on('show.bs.modal', function (e) {
      var title = $('#title').html();
      var content = $('#content').html();

      $('#inputTitle').val(title);
      $('#inputContent').val(content);
    });

    $('#save').click(function() {
      var inputTitle = $('#inputTitle').val();
      var inputContent = $('#inputContent').val();

      $('#title').html(inputTitle);
      $('#content').html(inputContent);
    });
    </script>
  </body>
</html>
<!-- 映画・ドラマランキング詳細モーダル -->
<div div class="modal fade" id="Ranking_Drama_Movie_Modal" tabindex="-1" aria-labelledby="Ranking_Drama_Movie_Label" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <!-- モーダルのヘッダー -->
            <div class="modal-header">
                <h4 class="modal-title fs-5" id="Ranking_Drama_Movie_ModalLabel">視聴済み映画・ドラマランキング</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- モーダルの本文 -->
            <div class="modal-body">
                <?php
                    echo '<ol class="list-group list-group-flush list-group-numbered">';
                    $smtp=$pdo->query($Ranking_Drama_Movie_sql);
                    foreach($smtp as $row){
                        echo '<li class="list-group-item mb-1">',$row['title'],'</li>';
                    }
                    echo '</ol>';
                ?>            
            </div>
            <!-- モーダルのフッター
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            -->
        </div>
    </div>
</div>
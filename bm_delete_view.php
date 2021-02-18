<!-- select.phpにDeleteの処理を入れる -->
<!-- detail.phpからPHPを丸っとコピー -->

<?php

require_once('bm_funcs_view.php');
$pdo = db_conn();
$id =$_GET['id'];




//２．データ登録SQL作成
// deleteはアスタリスク不要
$stmt = $pdo->prepare('DELETE  FROM gs_user_table WHERE id= :id');
// 以下追加
$stmt->bindValue(':id',h($id),PDO::PARAM_INT);
$status = $stmt->execute();


//３．データ表示
// 一人分に変更を加える

if ($status == false) {
    sql_error($status);
} else {
    redirect('bm_select_view.php');
    }
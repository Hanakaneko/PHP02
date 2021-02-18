<?php
//【重要】
/**
 * DB接続のための関数をfuncs.phpに用意
 * require_onceでfuncs.phpを取得
 * 関数を使えるようにする。
 */
// $pdo = db_conn();

// DB登録が必要
// insert.phpからコピペで持ってきた
//以下のtry&catch文はコメントアウト
// 代わりにfuncs.phpのtry&catch文を使うおまじないを足す 
// 以下の2行が関数化

require_once('bm_funcs_view.php');
$pdo = db_conn();

// try {
    // $db_name = "gs_db3";    //データベース名
    // $db_id   = "root";      //アカウント名
    // $db_pw   = "root";      //パスワード：XAMPPはパスワード無しに修正してください。
    // $db_host = "localhost"; //DBホスト
    // $pdo = new PDO('mysql:dbname='.$db_name.';charset=utf8;host='.$db_host, $db_id, $db_pw);
// } catch (PDOException $e) {
    // exit('DB Connection Error:'.$e->getMessage());
// }

// 上はTry　Catch文


//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table");
$status = $stmt->execute();


//３．データ表示
$view = "";
if ($status == false) {
    sql_error($status);
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        //GETデータ送信リンク作成
        // <a>で囲う。
        $view .= '<p>';

        // 詳細ページリンク
        $view .= '<a href="bm_detail_view.php?id=' .$result['id'] .'">';
        $view .= $result["indate"] . "：" . $result["name"];
        $view .= '</a>';

        //削除ページリンク
        $view .= '<a href="bm_delete_view.php?id=' .$result['id'] .'">';
        $view .= '[削除]';
        $view .= '</a>';


        $view .= '</p>';
    }
}
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>フリーアンケート表示</title>
    <link rel="stylesheet" href="css/range.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body id="main">
    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="bm_list_view.php">データ登録</a>
                </div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <div>
        <div class="container jumbotron">
            <a href="dm_detail_view.php"></a>
            <?= $view ?>
        </div>
    </div>
    <!-- Main[End] -->

</body>

</html>







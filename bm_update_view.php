<?php

//PHP:コード記述/修正の流れ
//1. insert.phpの処理をマルっとコピー。
//   POSTデータ受信 → DB接続 → SQL実行 → 前ページへ戻る
//2. $id = POST["id"]を追加
//3. SQL修正
//   "UPDATE テーブル名 SET 変更したいカラムを並べる WHERE 条件"
//   bindValueにも「id」の項目を追加
//4. header関数"Location"を「select.php」に変更

require_once('bm_funcs_view.php');

//1. POSTデータ取得
$name   = $_POST["name"];
$type  = $_POST["type"];
$size = $_POST["size"];
$address    = $_POST["address"]; 
$feature    = $_POST["feature"];
$id    = $_POST["id"];

//2. DB接続します
//*** function化する！  *****************
$pdo = db_conn();


//３．データ登録SQL作成
$stmt = $pdo->prepare("UPDATE 
                       gs_user_table 
                       SET
                       name=:name,
                       type=:type,
                       size=:size,
                       address=:address,
                       feature=:feature,
                       indate=sysdate()
                       WHERE
                       id=:id;
                       ");


$stmt->bindValue(':name', $name, PDO::PARAM_STR);      //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':type', $type, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':size', $size, PDO::PARAM_STR);        //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':address', $address, PDO::PARAM_STR); 
$stmt->bindValue(':feature', $feature, PDO::PARAM_STR); 
$stmt->bindValue(':id', $id, PDO::PARAM_INT); //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行


//４．データ登録処理後
if($status==false){
    //*** function化する！*****************
   sql_error($stmt);
} else{
    //*** function化する！*****************
    redirect('bm_list_view.php');
}
?>

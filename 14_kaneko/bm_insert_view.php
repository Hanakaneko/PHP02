<?php
//1. POSTデータ取得
$name   = $_POST["name"];
$type  = $_POST["type"];
$size = $_POST["size"];
$address   = $_POST["address"]; //追加されています
$feature   = $_POST["feature"];

//2. DB接続します
//*** function化する！  *****************
try {
    $db_name = "gs_db";    //データベース名
    $db_id   = "root";      //アカウント名
    $db_pw   = "root";      //パスワード：XAMPPはパスワード無しに修正してください。
    $db_host = "localhost"; //DBホスト
    $pdo = new PDO('mysql:dbname='.$db_name.';charset=utf8;host='.$db_host, $db_id, $db_pw);
} catch (PDOException $e) {
    exit('DB Connection Error:'.$e->getMessage());
}


//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_user_table(name,type,size,address,feature,indate)VALUES(:name,:type,:size,:address,:feature,sysdate())");
$stmt->bindValue(':name', $name, PDO::PARAM_STR);      //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':type', $type, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':size', $size, PDO::PARAM_STR);  
$stmt->bindValue(':address', $address, PDO::PARAM_STR);       //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':feature', $feature, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行


//４．データ登録処理後
if($status==false){
    //*** function化する！*****************
    $error = $stmt->errorInfo();
    exit("SQLError:".$error[2]);
}else{
    //*** function化する！*****************
    header("Location: bm_list_view.php");
    exit();
}
?>

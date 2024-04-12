<?php

//1. POSTデータ取得
$conditions = $_POST["conditions"];
$symptoms = $_POST["symptoms"];
$memo = $_POST["memo"];
$id = $_POST["id"];
// var_dump($_POST); 
// exit();



//2. DB接続します
include("funcs.php");//外部ファイル読み込み
$pdo = db_conn();

//３．データ登録SQL作成
$sql = "UPDATE kadai09_table SET conditions=:conditions, symptoms=:symptoms, memo=:memo WHERE id=:id;";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':conditions', $conditions, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':symptoms',   $symptoms,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':memo',       $memo,       PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id',         $id,         PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT) 
$status = $stmt->execute(); //実行


//４．データ登録処理後
if($status==false){
    sql_error($stmt);
}else{
    redirect("select.php");
}




?>

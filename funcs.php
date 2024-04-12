<?php
//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str){
    return htmlspecialchars($str, ENT_QUOTES);
}

//DB接続関数：db_conn() local
// function db_conn(){
//     try {
//         $db_name = "kadai09";    //データベース名
//         $db_id   = "root";      //アカウント名
//         $db_pw   = "";          //パスワード：XAMPPはパスワード無し or MAMPはパスワード”root”に修正してください。
//         $db_host = "localhost"; //DBホスト
//         return new PDO('mysql:dbname='.$db_name. ';charset=utf8mb4;host=' .$db_host, $db_id, $db_pw);
//     } catch (PDOException $e) {
//         exit('DB Connection Error:'.$e->getMessage());
//     }
// }

//さくらサーバー接続
function db_conn(){
    try {
//さくらサーバー情報
        $db_name =  'calthy-design_kadai09';     //データベース名
        $db_host =  'mysql621.db.sakura.ne.jp';  //DBホスト
        $db_id =    'calthy-design';             //アカウント名(登録しているドメイン)
        $db_pw =    'kadai08_calthy';            //さくらサーバのパスワード
        return new PDO('mysql:dbname='.$db_name. ';charset=utf8mb4;host=' .$db_host, $db_id, $db_pw);
    } catch (PDOException $e) {
        exit('DB Connection Error:'.$e->getMessage());
    }
}




//SQLエラー関数：sql_error($stmt)
function sql_error($stmt){
    $error = $stmt->errorInfo();
    exit("SQLError:".$error[2]);
}



//リダイレクト関数: redirect($file_name)
function redirect($file_name){
    header("Location: ".$file_name);
    exit();
    }

?>



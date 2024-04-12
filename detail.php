<?php
$id = $_GET["id"];//URLのIDを取得
//１．PHP
include("funcs.php");
$pdo = db_conn();

//２．データ登録SQL作成
$sql = "SELECT * FROM kadai09_table WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//３．データ表示
$values = "";
if($status==false) {
  sql_error($stmt);
}

//全データ取得
$v =  $stmt->fetch(); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]
$json = json_encode($values,JSON_UNESCAPED_UNICODE);
?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ更新</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="reset.css" rel="stylesheet">
  <link href="style.css" rel="stylesheet">
</head>
<body>

<!-- Head[Start] -->
<header>
    <h1>登録内容修正</h1>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="update.php" class="indexForm">
  <div class="jumbotron">
      <div>今日の調子：
      <input type="radio" id="conditionChoice1" name="conditions" value="元気" />
      <label for="conditionChoice1">😊</label>
      <input type="radio" id="conditionChoice2" name="conditions" value="まあまあ" />
      <label for="conditionChoice2">🙂</label>
      <input type="radio" id="conditionChoice3" name="conditions" value="不調" />
      <label for="conditionChoice3">😞</label>
    </div>

    <div>症状：
        <input type="radio" id="symptomsChoice1" name="symptoms" value="頭痛" />
          <label for="symptomsChoice1">頭痛</label>
        <input type="radio" id="symptomsChoice2" name="symptoms" value="腹痛" />
         <label for="symptomsChoice2">腹痛</label>
        <input type="radio" id="genderChoice3" name="symptoms" value="腰痛" />
          <label for="symptomsChoice3">腰痛</label>
          <input type="radio" id="genderChoice4" name="symptoms" value="なし" />
          <label for="symptomsChoice4">なし</label>
      </div>

     <label>気になったことメモ📝<textArea name="memo" rows="4" cols="40"><?=$v["memo"]?></textArea></label><br>
     <input type="hidden" name="id" value="<?=$v["id"]?>">
     <button type="submit" id="sendBtn">送信</button>
  </div>
</form>

<!-- Main[End] -->
<?php include("btn.html"); ?>


</body>
</html>





<?php
session_start();
include("functions.php");
// SESSION ID CHECK関数
//chkSsid();

//1.GETでidを取得
$id = $_GET["id"];

//2.DB接続など
$pdo = db_con();

//3.SELECT * FROM gs_an_table WHERE id=***; を取得（bindValueを使用！）
$stmt = $pdo->prepare("SELECT * FROM gs_an_table WHERE id=:id");
$stmt->bindValue(":id",$id,PDO::PARAM_INT);
$status = $stmt->execute();

if($status==false){
  queryError($stmt);
}else{
  $row = $stmt->fetch();
}



?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>POSTデータ登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select_open.php">イメージ一覧</a></div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>イメージ詳細</legend>
     <label>名前：<?=$row["name"]?></label><br>
     <label>Email：<?=$row["email"]?></label><br>
     <label><?=$row["naiyou"]?></label><br>
     <input type="hidden" name="id" value="<?=$id?>">
     <!--<input type="submit" value="送信">-->
    </fieldset>
  </div>
</form>
<!-- Main[End] -->

<!--<input type="" name="name" value="">-->

</body>
</html>







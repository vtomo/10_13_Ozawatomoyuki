<?php
session_start();


//0.外部ファイル読み込み
include("functions.php");
include("menu.php");


// SESSION ID CHECK関数
chkSsid();


//1.  DB接続します
$pdo = db_con();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false){
  queryError($stmt);
}else{
  //Selectデータの数だけ自動でループしてくれる
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= '<p>';

    $view .= '<a href="detail_user.php?id='.$result["id"].'">';
    $view .= h($result["name"])."[".h($result["lid"])."]"."[".h($result["lpw"])."]"."[".h($result["kanri_flg"])."]"."[".h($result["life_flg"])."]";
    $view .= '</a>　';

    $view .= '<a href="delete.php?id='.$result["id"].'">';
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
<title>ユーザー一覧</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>

<!--
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <?php //if($_SESSION["kanri_flg"]=="1"){ ?>
      <a class="navbar-brand" href="index.php">データ登録</a>
      <?php// } ?>
-->
 <!--php if文を分けて閉じる-->
<!--      <a class="navbar-brand" href="logout.php">ログアウト</a>
    </div>
  </nav>
-->

</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div><?=$_SESSION["name"]?>さん、こんにちは</div>
    
    <div class="container jumbotron"> <legend>ユーザー一覧</legend>
<?=$view?></div>
  </div>
</div>
<!-- Main[End] -->

</body>
</html>

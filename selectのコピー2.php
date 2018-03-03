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
$stmt = $pdo->prepare("SELECT * FROM gs_an_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false){
  queryError($stmt);
}else{
  //Selectデータの数だけ自動でループしてくれる
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    



    $view .= '<p>';
    $view .= '<a href="detail.php?id='.$result["id"].'">';
    $view .= h($result["name"]);
    $view .= '<img src="'.$result["upfile"].'"width="100">'; //画像表示
    $view .= h($result["email"]);
    $view .= h($result["naiyou"]);
    $view .= "[".h($result["indate"])."]";
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
<title>フリーアンケート表示</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
<!--  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <?php //if($_SESSION["kanri_flg"]=="1"){ ?>
      <a class="navbar-brand" href="index.php">データ登録</a>
      <?php //} ?>
-->
       <!--php if文を分けて閉じる-->
<!--      <a class="navbar-brand" href="logout.php">ログアウト</a>
-->
    </div>
  </nav>


</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div><?=$_SESSION["name"]?>さん、こんにちは</div>
    
    <div class="container jumbotron"><legend>イメージ一覧</legend><?=$view?></div>


    <table>
        <thead>
          <tr>
            <th>カテゴリ</th>
            <th>イメージ</th>
            <th>ひとことでいうと</th>
            <th>どうする</th>
          </tr>
        </thead>

        <tbody></tbody>
          <tr>
            <td><?php print(htmlspecialchars($result["id"]));?></td>
            <td><img src=<?php $result["upfile"]?> ></td>
            <td><?php print(htmlspecialchars($result["email"]));?></td>
            <td><?php print(htmlspecialchars($result["naiyou"]));?></td>
          </tr>
    </table>
  </div>
</div>
<!-- Main[End] -->

</body>
</html>


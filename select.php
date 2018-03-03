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

    $view .= '<a href="detail.php?id='.$result["id"].'">';
    $view .= '<table border ="1" width="$result["important"]">';
    

    $view .= '<thead>';
    $view .= '<tr>';
    $view .= '<th>Category</th>';
    $view .= ' <th>Image</th>';
    $view .=  '<th>KeyWord</th>';
    $view .= ' <th>Todo</th>';
    $view .= ' <th>Date</th>';
    $view .= '</tr>';
    $view .= '</thead>';

    $view .= '<tbody>';
    $view .= '<tr>';
    $view .= '<td>';
    $view .= h($result["name"]);
    $view .= h($result["important"]);
    $view .= '</td>';
    $view .= '<td>';
    $view .= '<img src="'.$result["upfile"].'"width="100">';
    $view .= '</td>';
    $view .= '<td>';
    $view .= h($result["email"]);
    $view .= '</td>';
    $view .= '<td>';
    $view .= h($result["naiyou"]);
    $view .= '</td>';
    $view .= '<td>';
    $view .= "[".h($result["indate"])."]";
    $view .= '</td>';
    $view .='</tr>';
    $view .='</tbody>';
    $view .= '</table>';
    $view .= '</a>　';
   
    $view .= '<a href="delete.php?id='.$result["id"].'">';
    $view .= '[削除]';
    $view .= '</a>';
   



    /*$view .= '<p>';
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
    $view .= '</p>';*/
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
<script src="jquery-2.1.3.min.js"></script>
<script src="Tabslet-master/jquery.tabslet.min.js"></script>
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
    <legend><?=$_SESSION["name"]?>さんのLIFE</legend>
    
    <div>
      <?=$view?>
    </div>

   <!-- class="container jumbotron"-->



  </div>
</div>
<!-- Main[End] -->

</body>
</html>


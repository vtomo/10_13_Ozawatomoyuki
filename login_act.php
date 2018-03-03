<?php
session_start();

//0.外部ファイル読み込み
include("functions.php");

//1.  DB接続します
$pdo = db_con();


//受け取る
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];


//2. データ登録SQL作成、受け取ってbind変数に渡す、bindが無効化して危なくないようにしている, PDO::PARAM_STRはなくても動く（こいつは文字列だよ。STRがINTだと数値だよって意味）
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE lid=:lid AND lpw=:lpw AND life_flg=0");//life_flg=0：退会していない人
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw',  $lpw,PDO::PARAM_STR);
$res = $stmt->execute();//実行

//3. SQL実行時にエラーがある場合
if($res==false){
    queryError($stmt);
}

//4. 抽出データ数を取得
//$count = $stmt->fetchColumn(); //SELECT COUNT(*)で使用可能()
$val = $stmt->fetch(); //1レコードだけ取得する方法

//5. 該当レコードがあればSESSIONに値を代入 idをみている（idがからじゃなければ）
if( $val["id"] != "" ){
  $_SESSION["chk_ssid"]  = session_id();//新しい変数をサーバーにおく（自分かどうかを照らし合わせる）
  $_SESSION["kanri_flg"] = $val['kanri_flg'];//
  $_SESSION["name"]      = $val['name'];//誰々さんこんにちは、のためにSESSION nameに名前を預ける
  header("Location: select.php");
}else{
  //logout処理を経由して全画面へ
  header("Location: login.php");
}

exit();
?>


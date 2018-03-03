<?php
include("functions.php");

//入力チェック(受信確認処理追加)
if(
  !isset($_POST["name"]) || $_POST["name"]=="" ||
  !isset($_POST["email"]) || $_POST["email"]=="" ||
  !isset($_POST["naiyou"]) || $_POST["naiyou"]==""||
  !isset($_POST["important"]) || $_POST["important"]==""

){
  exit('ParamError');
}

//1. POSTデータ取得
$name   = $_POST["name"];
$email  = $_POST["email"];
$naiyou = $_POST["naiyou"];
$important = $_POST["important"];

//****************ファイルアップロードチェック***********
if(isset($_FILES["upfile"])&& $_FILES["upfile"]["error"] ==0 ){

  //情報取得
  $file_name = $_FILES["upfile"]["name"]; // jpeg file名取得
  $tmp_path = $_FILES["upfile"]["tmp_name"]; //"/usr/www/tmp/1.jpg"アップロード先のTempフォルダ
  $file_dir_path = "upload/"; //画像ファイル保管先(パス)

  //File名の変更
  $extension = pathinfo($file_name, PATHINFO_EXTENSION); //拡張子取得(jpg, pne, gif)
  $uniq_name = date("YmdHis").md5(session_id()) . "." . $extension; //ユニークファイル名作成
  $file_name = $file_dir_path.$uniq_name; //パスとユニークファイル名

  $img="";   //画像表示 or Error文字を保持する変数

  //Fileアップロード
  if(is_uploaded_file($tmp_path)){
    if(move_uploaded_file($tmp_path,$file_name)){
       chmod($file_name, 0644);
    }else { 
      exit("Error:アップロードできませんでした。"); //Error文字
    }
  }else {
    exit("画像が送信されていません。");
  }
}
//*****************************************************


//2. DB接続します(エラー処理追加)
$pdo = db_con();

//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_an_table(id, name, email, naiyou,
indate, upfile, important )VALUES(NULL, :a1, :a2, :a3, sysdate(), :image, :a4)");
$stmt->bindValue(':a1', $name,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a2', $email,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a3', $naiyou, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':image', $file_name, PDO::PARAM_STR);//画像
$stmt->bindValue(':a4', $important, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  queryError($stmt);

}else{
  //５．select.phpへリダイレクト
  header("Location: select.php");
  exit;
}
?>

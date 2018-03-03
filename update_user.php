<?php
include("functions.php");

//1.POSTでParamを取得
$id     = $_POST["id"];
$name   = $_POST["name"];
$lid  = $_POST["lid"];
$lpw = $_POST["lpw"];
$kanri_flg = $_POST["kanri_flg"];
$life_flg = $_POST["life_flg"];


//2.DB接続など
$pdo = db_con();

//3.UPDATE gs_an_table SET ....; で更新(bindValue)
//　基本的にinsert.phpの処理の流れです。
$stmt = $pdo->prepare("UPDATE gs_user_table SET name=:name, lid=:lid, lpw=:lpw , kanri_flg =:kanri_flg, life_flg =:life_flg WHERE id=:id");
$stmt->bindValue(':name',  $name,   PDO::PARAM_STR);
$stmt->bindValue(':lid', $lid,  PDO::PARAM_STR);
$stmt->bindValue(':lpw',$lpw, PDO::PARAM_STR);
$stmt->bindValue(':kanri_flg',$kanri_flg, PDO::PARAM_STR);
$stmt->bindValue(':life_flg',$life_flg, PDO::PARAM_STR);
$stmt->bindValue(':id',$id, PDO::PARAM_INT);
$status = $stmt->execute();

if($status==false){
  queryError($stmt);
}else{
  header("Location: select_user.php");
  exit;
}

?>

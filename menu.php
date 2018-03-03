<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>メニュー</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="jquery-2.1.3.min.js"></script>
  <script src="Tabslet-master/jquery.tabslet.min.js"></script>

  <style>div{padding: 40px;font-size:20px;}</style>
  <style>navbar-brand{padding: 40px;font-size:20px;}</style>
  <style>#dream{font-size:40px;}</style>
  
</head>
<body>

    <nav class="navbar navbar-default">
        <div class="container-fluid">
        <div class="navbar-header">
        <?php if($_SESSION["kanri_flg"]=="1"){ ?>
        <a class="navbar-brand" href="index.php">CUSTOMIFE</a>
        <a class="navbar-brand" href="select.php">YOUR LIFE</a>
        <a class="navbar-brand" href="select_user.php">ユーザー管理</a>
        <a class="navbar-brand" href="logout.php">log out</a>
        <a class="navbar-brand" id="dream">思考を現実化させる</a>
        
        <?php }else{ ?> <!--php if文を分けて閉じる-->
        <a class="navbar-brand" href="index.php">CUSTOMIFE</a>
        <a class="navbar-brand" href="select.php">YOUR LIFE</a>
        <a class="navbar-brand" href="logout.php">log out</a>        
        <a class="navbar-brand" id="dream">思考を現実化させる</a>
        <?php } ?> <!--php if文を分けて閉じる-->
        </div>
    </nav>




</body>
</html>

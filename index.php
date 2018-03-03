

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>POSTイメージ登録</title>
  <script src="jquery-2.1.3.min.js"></script>
  <script src="Tabslet-master/jquery.tabslet.min.js"></script>
  
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
  <style>.under{text-decoration: underline;}</style>
  <style>.btn{
    color: black;  
    background-color: white;
    padding: 6px;
    border: solid 1px black;
    border-radius: 12px;}
  </style>
  <style>.submit{
    color: white;  
    background-color: orange;
    padding: 6px;
    border-radius: 12px;}
  </style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">YOUR LIFE</a></div>
  </nav>
</header>
<!-- Head[End] -->



<!--イメージ登録フォーム -->
<form method="post" action="insert.php" enctype="multipart/form-data">
  <div class="jumbotron">
   <fieldset>
    <legend class="under">Customize Your Life！</legend>
    <label>&nbsp;&nbsp;Image&nbsp;&nbsp;:</label>
     <label for="file_photo" class="btn">
	      Imageを選択
	     <input type="file" id="file_photo" style="display:none;" name="upfile">
　   </label><br><br>
    <label>Category：
        <select name="name">
            <option value="体">体</option>
            <option value="体">健康</option>
            <option value="恋愛">恋愛</option>
            <option value="仕事">仕事</option>
            <option value="勉強">勉強</option>
            <option value="家庭">家庭</option>
            <option value="家庭">住宅</option>
            <option value="お金">お金</option>
            <option value="家庭">老後</option>

         </select><br><br>
     <label>KeyWord：<input type="text" name="email"></label><br>
     <label>&nbsp;&nbsp;&nbsp;Todo&nbsp;&nbsp;&nbsp;&nbsp;：<textArea name="naiyou" rows="3" cols="30"></textArea></label><br>
     <label>Important：
     <input type="range" name="important"><br><br>
     <input type="submit" value="CUSTOMIFE" class="submit">
    </fieldset>
  </div>
</form>



</body>
</html>

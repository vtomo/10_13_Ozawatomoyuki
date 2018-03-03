<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="css/main.css" />
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
<title>ログイン</title>
</head>
<body>

<header>
  <nav class="navbar navbar-default"></nav>
</header>

<!-- lLOGINogin_act.php は認証処理用のPHPです。 絶対postにして、内容がわからないようにする、にtype password黒丸になる-->
<legend>ログイン</legend>

<form name="form1" action="login_act.php" method="post">
ID:<input type="text" name="lid" />
PW:<input type="password" name="lpw" />
<input type="submit" value="LOGIN" />
</form>
<a class="navbar-brand" href="select_open.php">みんなのライフを見る</a>


</body>
</html>
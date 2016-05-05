<?php
require("../common/functions.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title><?= BLOG_TITLE ?></title>
  <link rel="stylesheet" href="/bootstrap/css/bootstrap.css" charset="utf-8">
  <link href="/bootstrap/css/signin.css" rel="stylesheet">
</head>
<body>
  <div class="container">
    <h1><?= BLOG_TITLE ?></h1>
    <hr>
    <div class="row jumbotron">
      <form style="padding-bottom: 5px" class="form-signin" action="login_processing.php" method="post">
        <h2 class="form-signin-heading">Login</h2>
        <label for="inputText" class="sr-only">ユーザー名</label>
        <input type="text" id="inputText" name="userId" class="form-control" placeholder="ユーザー名" required autofocus>
        <label for="inputPassword" class="sr-only">パスワード</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="パスワード" required>
        <input class="btn btn-block btn-primary" type="submit" value="ログイン">
        <a class="btn btn-block btn-success" href="new_user.php">新規登録</a><br>
        <a class="btn btn-default" href="/index.php">戻る</a>
      </form>
    </div>
    <br>
  </div>
</body>
</html>

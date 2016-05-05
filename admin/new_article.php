<?php
require('../common/functions.php');

session_start();
$userId = $_SESSION['userId'];
if (is_null($userId)) {
  send_error_page();
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title><?= BLOG_TITLE ?></title>
</head>
<body>
  <h1><?= BLOG_TITLE ?></h1>
  <?= $userId ?>
  <hr>
  <form action="new_article_processing.php" method="post">
    <label>タイトル</label>
    <br>
    <textarea name="title" rows="1" cols="50"></textarea>
    <br>
    <label>コメント</label>
    <br>
    <textarea name="body" rows="20" cols="50"></textarea>
    <br>
    <input type="submit" value="送信">
  </form>
  <a href="user_top.php">戻る</a>
</body>
</html>

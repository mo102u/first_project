<?php
require('../common/functions.php');

session_start();
$userId = $_SESSION['userId'];
if (is_null($userId)) {
  send_error_page();
}

// 存在する記事データか確認
$id = $_GET['id'];
if (is_null($id) || !is_numeric($id)) {
  send_error_page();
}
$article = get_article($id);
if (is_null($article)) {
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
  <form action="edit_processing.php?id=<?php echo $article['id'] ?>" method="post">
    <label>タイトル</label>
    <br>
    <textarea name="title" rows="1" cols="50"><?= $article['title'] ?></textarea>
    <br>
    <label>コメント</label>
    <br>
    <textarea name="body" rows="20" cols="50"><?= $article['body'] ?></textarea>
    <br>
    <input type="submit" value="送信">
  </form>
  <a href="user_top.php">戻る</a>
</body>
</html>

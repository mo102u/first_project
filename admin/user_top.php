<?php
require('../common/functions.php');

session_start();
$userId = $_SESSION['userId'];
if (is_null($userId)) {
  send_error_page();
}

$articles = get_articles();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title><?= BLOG_TITLE ?></title>
  <link rel="stylesheet" href="/bootstrap/css/bootstrap.css" charset="utf-8">
</head>
<body>
  <div class="container">
    <div class="row">
      <h1><?= BLOG_TITLE ?></h1>
      <?= $userId ?>
      <hr>
      <div class="col-lg-2">
        <h2 style="margin: 0px;">記事一覧</h2>
      </div>
      <div class="col-lg-8"></div>
      <div style="padding-left: 3px;" class="col-lg-2">
        <a class="btn btn-info btn-custom" href="/../admin/new_article.php">> New</a>
      </div>
    </div>
    <br>
    <div class="row">
      <table class="table">
        <tr>
          <th>No</th>
          <th>日付</th>
          <th>タイトル</th>
          <th>投稿者</th>
          <th class="text-center">編集</th>
          <th class="text-center">削除</th>
        </tr>
        <?php foreach ($articles as $article): ?>
          <tr>
            <td><?= htmlentities($article['id']) ?></td>
            <td><?= htmlentities($article['date']) ?></td>
            <td><?= htmlentities($article['title']) ?></td>
            <td><?= htmlentities($article['author']) ?></td>
            <td width="100px"><a class="btn btn btn-block btn-success" href="edit.php?id=<?= $article['id'] ?>">編集</a></td>
            <td width="100px"><a class="btn btn btn-block btn-danger" href="delete.php?id=<?= $article['id']?>">削除</a></td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</body>
</html>

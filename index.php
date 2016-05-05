<?php
require("common/functions.php");

//call data of all-article.jason
$articles = get_articles();
$articles = array_reverse($articles);
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
    <h1><?= BLOG_TITLE ?></h1>
    <hr>
    <h2>記事一覧</h2>
    <table class="table">
      <tr>
        <th>日付</th>
        <th>タイトル</th>
        <th>投稿者</th>
      </tr>
      <?php foreach ($articles as $article): ?>
        <tr>
          <td><?= htmlentities($article['date']) ?></td>
          <td><a href="show.php?id=<?php echo $article['id'] ?>"><?= htmlentities($article['title']) ?></a></td>
          <td><?= htmlentities($article['author']) ?></td>
        </tr>
      <?php endforeach; ?>
    </table>
    <a class="btn btn-primary btn-custom" href="/../admin/login.php">ログイン</a>
  </div>
</body>
</html>

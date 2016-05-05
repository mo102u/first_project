<?php
require("common/functions.php");

//admin article
$id = $_GET['id'];
if (is_null($id) || !is_numeric($id)) {
  send_error_page();
}
$article = get_article($id);
if (is_null($article)){
  send_error_page();
}
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
    <!-- show article -->
    <h2><?= $article['title'] ?></h2>
    <h5><?= $article['date'] ?> By <?= $article['author'] ?></h5>
    <h5><?= nl2br($article['body']) ?></h5>
    <hr>
    <a class="btn btn-default btn-custom" href="index.php">BACK</a>
  </div>
</body>
</html>

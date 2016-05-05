<?php
require('../common/functions.php');

session_start();
$userId = $_SESSION['userId'];
if (is_null($userId)) {
  send_error_page();
}

$title = $_POST['title'];
$body = $_POST['body'];
if (is_null($title) || $title == '' || mb_strlen('$title', DEFAULT_ENCODE) > 40) {
  send_error_page();
}
if (is_null($body) || $body == '' || mb_strlen('$title', DEFAULT_ENCODE) > 40) {
  send_error_page();
}

$article = [];
$article['id'] = $_GET['id'];
$article['title'] = $_POST['title'];
$article['body'] =  $_POST['body'];
$article['date'] = date("Y-m-d H:i:s");
$article['author'] = $userId;
$edit_article = $article;
update_article($edit_article);

redirect('admin/user_top.php');
?>

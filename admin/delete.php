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

delete_article($id);

redirect('admin/user_top.php');
?>

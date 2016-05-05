<?php
require("../common/functions.php");

$userId = $_POST['userId'];
$password = $_POST['password'];
if (is_null($userId) || $userId == '' || mb_strlen('$userId', DEFAULT_ENCODE) > 20) {
  send_error_page();
}
if (is_null($password) || $password == '' || mb_strlen('$password', DEFAULT_ENCODE) > 20) {
  send_error_page();
}

$result = login($userId, $password);
if ($result) {
  session_start();
  $_SESSION['userId'] = $userId;
  redirect('admin/user_top.php');
} else {
  redirect('admin/login.php');
}
?>

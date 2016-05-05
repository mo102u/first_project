<?php
define('ARTICLE_FILE', __DIR__ . '/../data/article.json');
define('USER_FILE', __DIR__ . '/../data/user.csv');
define('DEFAULT_ENCODE', 'UTF-8');
define('BLOG_TITLE', 'Engineer of the diary');
define('ADMIN_BLOG_TITLE', 'Your diary');
define('DOMAIN', 'http://localhost:8000/');

/**
 * リダイレクトする。
 * （処理を終了する）
 * @param string $path リダイレクト先のパス
 */
function redirect($path){
  header('location: ' . DOMAIN . $path);
  exit();
}

/**
 * エラーページに転送する。
 * （処理を終了する）
 * @param string $path リダイレクト先のパス
 */
function send_error_page(){
  header('location: ' . DOMAIN . 'common/error.php');
  exit();
}

/**
 * ログインする。
 * @param string $userId ユーザID
 * @param string $password パスワード
 * @return bool ログイン成功の場合 true
 */
function login($userId, $password) {
  if (file_exists(USER_FILE)) {
    $lines = file(USER_FILE, FILE_IGNORE_NEW_LINES);
    foreach ($lines as $line) {
      $user = explode(",", $line);
      if ($userId == $user[0] && $password == $user[1]) {
        return true;
      }
    }
  }
  return false;
}

/**
 * 記事一覧を取得する。
 * @return array 記事の一覧
 */
function get_articles(){
  if (file_exists(ARTICLE_FILE)) {
    $articles_json = file_get_contents(ARTICLE_FILE);
    $articles = json_decode($articles_json, true);
  }else{
    $articles = [];
  }
  return $articles;
}

/**
 * 記事を取得する。
 * @param string $id 記事ID
 * @return array 記事 存在しない場合 null
 */
function get_article($id){
  $articles = get_articles();
  foreach ($articles as $article) {
    if($article['id'] == $id){
      return $article;
    }
  }
  return null;
}

/**
 * 記事を保存する。
 * @param array $new_article 新規記事
 */
function save_article($new_article){
  $articles = get_articles();
  $articles[] = $new_article;
  $articles_json = json_encode($articles);
  file_put_contents(ARTICLE_FILE, $articles_json, LOCK_EX);
}

/**
 * 記事を削除する。
 * @param string $id 削除対象の記事ID
 */
function delete_article($id){
  $articles = get_articles();
  $save_articles = [];
  foreach ($articles as $article) {
    if($article['id'] != $id){
      $save_articles[] = $article;
    }
  }
  $articles_json = json_encode($save_articles);
  file_put_contents(ARTICLE_FILE, $articles_json, LOCK_EX);
}

/**
 * 記事を更新する。
 * @param string $id 更新対象の記事
 */
function update_article($edit_article){
  $articles = get_articles();
  foreach ($articles as &$article) {
    if($article['id'] == $edit_article['id']){
      $article['title'] = $edit_article['title'];
      $article['body'] = $edit_article['body'];
      $article['date'] = $edit_article['date'];
      $article['author'] = $edit_article['author'];
      break;
    }
  }
  $articles_json = json_encode($articles);
  file_put_contents(ARTICLE_FILE, $articles_json, LOCK_EX);
}

/**
 * 最新の記事IDを取得する。
 * @return int 最新の記事ID
 */
function get_new_article_id(){
  $articles = get_articles();
  $max = 0;
  foreach ($articles as $article) {
    if ($article['id'] > $max) {
      $max = $article['id'];
    }
  }
  return $max + 1;
}

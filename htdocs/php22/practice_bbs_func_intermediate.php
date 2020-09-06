<?php
define('DB_HOST',   'localhost'); // データベースのホスト名又はIPアドレス
define('DB_USER',   'codecamp33848');  // MySQLのユーザ名
define('DB_PASSWD', 'codecamp33848');    // MySQLのパスワード
define('DB_NAME',   'codecamp33848');    // データベース名
define('HTML_CHARACTER_SET', 'UTF-8');  // HTML文字エンコーディング
define('DB_CHARACTER_SET',   'UTF8');// DB文字エンコーディング
$name = '';
$comment = '';
$comment_log = [];
$error = []; 
$link = get_db_connect();
$request_method = get_request_method();
if ($request_method === 'POST'){
    $name = get_post_data('user_name');
    $comment = get_post_data('user_comment');

    if(check_name($name) !== ''){
        $error[] = check_name($name);
    }
    if(check_comment($comment) !== ''){
        $error[] = check_comment($comment);
    }
    if (count($error) === 0){
        insert_comment($link,$name,$comment);
    }
}
$comment_log = get_comment_log_list($link);
$comment_log = entity_assoc_array($comment_log);
close_db_connect($link);
/**
* DBハンドルを取得
* @return obj $link DBハンドル
*/
function get_db_connect() {
 
    // コネクション取得
    if (!$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWD, DB_NAME)) {
        die('DB接続失敗' );
    }
    // 文字コードセット
    mysqli_set_charset($link, DB_CHARACTER_SET);
    return $link;
}
function get_request_method() {
    return $_SERVER['REQUEST_METHOD'];
}
function get_post_data($key) {
    $str = '';
    if (isset($_POST[$key]) === TRUE) {
        $str = $_POST[$key];
    }
    return $str;
}
function check_name($param){
    $err = [];
    if ($param === '') {
        $err[] = '名前が未入力です';
    }
    if (mb_strlen($param) > 20) {
        $err[] = '名前は２０文字以内で入力してください';
    }
    return $err;
}
function check_comment($param){
    $err = '';
    if ($param === '') {
        $err= 'ひとことが未入力です';
    }
    if (mb_strlen($param) > 100) {
        $err = 'ひとことは１００文字以内で入力してください';
    }
    return $err;
}
function insert_comment($link,$name,$comment){
    date_default_timezone_set('Asia/Tokyo');
    $date = date('y-m-d H:i:s');
    $sql = 'INSERT INTO comment_log(comment_name,comment,comment_time) VALUES(\''.$name.':\',\''.$comment.'\',\''.$date.'\')';
    if(mysqli_query($link, $sql) === false){
        die('DBに追加できませんでした');
    }
}
function get_comment_log_list($link) {
    // SQL生成
    $sql = 'SELECT comment_name,comment,comment_time FROM comment_log ORDER BY comment_id desc';
    // クエリ実行
    return get_as_array($link, $sql);
}
function get_as_array($link, $sql) {
    // 返却用配列
    $data = [];
    // クエリを実行する
    if ($result = mysqli_query($link, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            // １件ずつ取り出す
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        }
        // 結果セットを開放
        mysqli_free_result($result);
    }
    return $data;
}
function close_db_connect($link) {
    // 接続を閉じる
    mysqli_close($link);
}
function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, HTML_CHARACTER_SET);
}
function entity_str($str) {
    return htmlspecialchars($str, ENT_QUOTES, HTML_CHARACTER_SET);
}
function entity_assoc_array($assoc_array) {
    foreach ($assoc_array as $key => $value) {
        foreach ($value as $keys => $values) {
            // 特殊文字をHTMLエンティティに変換
            $assoc_array[$key][$keys] = entity_str($values);
        }
    }
    return $assoc_array;
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ひとこと掲示板</title>
</head>
<body>
    <h1>ひとこと掲示板</h1>
    <ul>

    <?php foreach ($error as $message) { ?>
            <li><?php print $message;?></li>
    <?php } ?>
    </ul>
    <form method="post">
        名前：<input type="text" name="user_name">
        ひとこと：<input type="text" name="user_comment" size="60">
        <input type="submit" name="submit" value="送信">
    </form>
    <ul>
    <?php 
    foreach ($comment_log as $read) { ?>
            <li><?php print $read['comment_name']; 
            print $read['comment']; 
            print $read['comment_time']; 
            ?>
            </li>
    <?php } ?>
    </ul>
</body>
</html>
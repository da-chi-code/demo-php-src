<?php
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
function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, HTML_CHARACTER_SET);
}
function get_db_connect() {
    // コネクション取得
    if (!$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWD, DB_NAME)) {
        die('error: ' . mysqli_connect_error());
    }
    // 文字コードセット
    mysqli_set_charset($link, DB_CHARACTER_SET);
 
    return $link;
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
        return $data;
    }
    else{
        $_SESSION['err_msgs'][] = 'sql実行失敗'.$sql;
    }
}
function close_db_connect($link) {
    // 接続を閉じる
    mysqli_close($link);
}
function transaction($link) {
    if (count($_SESSION['err_msgs']) === 0) {
        mysqli_commit($link);
    }
    else{
        mysqli_rollback($link);
    }
}
function redirect_admin(){
    header('Location: ./ec_admin.php');
    exit;
}
function redirect_login(){
    header('Location: ./ec_login.php');
    exit;
}
function redirect_home(){
    header('Location: ./ec_top.php');
    exit;
}
function session_delete($key){
    if (isset($key)) {
    // sessionに関連する設定を取得
    $params = session_get_cookie_params();
    // sessionに利用しているクッキーの有効期限を過去に設定することで無効化
    setcookie(
        $session_name,
        '',
        time() - 42000,
        $params['path'],
        $params['domain'],
        $params['secure'],
        $params['httponly']
    );
    }
}
<?php
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
    $err = '';
    if (empty($param) === TRUE) {
        $err = '名前が未入力です';
    }
    if (mb_strlen($param) > 20) {
        $err = '名前は２０文字以内で入力してください';
    }
    return $err;
}
function check_comment($param){
    $err = '';
    if (empty($param) === TRUE) {
        $err= 'ひとことが未入力です';
    }
    if (mb_strlen($param) > 100) {
        $err = 'ひとことは１００文字以内で入力してください';
    }
    return $err;
}
function insert_comment($link,$name,$comment){
    date_default_timezone_set('Asia/Tokyo');
    $date = date('-y-m-d H:i:s');
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
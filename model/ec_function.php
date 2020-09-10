<?php
/**
* insertを実行する
*
* @param obj $link DBハンドル
* @param str SQL文
* @return bool
*/
function insert_db($link, $sql) {
   // クエリを実行する
   if (mysqli_query($link, $sql) === TRUE) {
       return TRUE;
   } else {
       return FALSE;
   }
}
/**
* 新規商品を追加する
*
* @param obj $link DBハンドル
* @param str $goods_name 商品名
* @param int $price 価格
* @return bool
*/
function insert_goods_table($link, $goods_name, $price) {
   // SQL生成
   $sql = 'INSERT INTO goods_table(goods_name, price) VALUES(\'' . $goods_name . '\', ' . $price . ')';
   // クエリ実行
   return insert_db($link, $sql);
}
/**
* リクエストメソッドを取得
* @return str GET/POST/PUTなど
*/
function get_request_method() {
   return $_SERVER['REQUEST_METHOD'];
}
/**
* POSTデータを取得
* @param str $key 配列キー
* @return str POST値
*/
function get_post_data($key) {
   $str = '';
   if (isset($_POST[$key]) === TRUE) {
       $str = $_POST[$key];
   }
   return $str;
}
function entity_str($str) {
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
 
    }
 
    return $data;
 
}

function close_db_connect($link) {
    // 接続を閉じる
    mysqli_close($link);
}
<?php
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
function admin_check($str, $key){
    if($str === 'admin' && $key === 'admin'){
        $_SESSION['user_id'] = $str;
        redirect_admin();    
    }
}
function redirect_admin(){
    header('Location: ./ec_admin.php');
    exit;
}
function check_login_user($link,$str,$key){
    $sql = 'SELECT id FROM user WHERE user_name =\'' . $str . '\' AND password =\'' . $key . '\'';
    return get_as_array($link, $sql);
}
function redirect_login(){
    header('Location: ./ec_login.php');
    exit;
}
function redirect_home(){
    header('Location: ./ec_home.php');
    exit;
}
function get_as_array($link, $sql) {
 
    // 返却用配列
    $data = [];
    $err = '';
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
        $err = 'sql実行失敗'.$sql;
        return $err;
    }
 
}

function close_db_connect($link) {
    // 接続を閉じる
    mysqli_close($link);
}
function settion_delete($key){
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
function validation_user($param){
    $err = [];
    $err[] = check_user_name($param['user_name']);
    $err[] = check_password($param['password']);
    return $err;
}
function check_user_name($param){
    if(preg_match('/^([a-zA-Z0-9]{6,})$/',$param) !== 1){
        $err = 'ユーザー名は半角英数字６文字以上で入力してください';
        return $err;
    }
}
function check_password($param){
    if(preg_match('/^([a-zA-Z0-9]{6,})$/',$param) !== 1){
        $err = 'パスワードは半角英数字６文字以上で入力してください';
        return $err;
    }
}
function regist_user($link,$key,$param){
    $date = date('y-m-d H:i:s');
    $sql = 'INSERT INTO user (user_name,password,created_at) VALUES (\''.$key.'\',\''.$param.'\',\''.$date.'\')';
    if(mysqli_query($link, $sql) === FALSE){
        $err = 'ユーザーリストに追加できませんでした';
        return $err;
    }
}
function get_user_list($key){
    $sql = 'SELECT user_name,password,created_at FROM user';
    // クエリ実行
    return get_as_array($key, $sql);
}
//admin.php
function get_file_name_data($key) {
    $str = '';
    if (isset($_FILE[$key]) === TRUE) {
        $str = $_FILE[$key]['name'];
    }
    return $str;
}
function get_file_tmp_name_data($key) {
    $str = '';
    if (isset($_FILE[$key]) === TRUE) {
        $str = $_FILE[$key]['tmp_name'];
    }
    return $str;
}
function validation_item($param){
    $err = [];
    if(isset($param['name'])){
        $err[] = check_item_name($param['name']);
    }
    if(isset($param['price'])){
        $err[] = check_int($param['price']);
    }
    if(isset($param['stock'])){
        $err[] = check_int($param['stock']);
    }
    if(isset($param['status'])){
        $err[] = check_status($param['status']);
    }
    if(isset($param['img'])){
        $err[] = check_img($param['img']);
    }
    return $err;
}
function check_item_name($param){
    if (preg_match('/\s*$/', $param) !== 1){
        $err = '名前が未入力または空白のみが入力されています';
        return $err;
    }
}
function check_int($param){
   if (preg_match('/^([1-9][0-9]*|0)$/', $param) !== 1){
        $err = '値段は０以上の整数で入力してください';
        return $err;
    }
}
function check_status($param){
    if($param !== '0'){
        if($param !== '1'){
            $err = 'ステータスは公開または非公開を入力してください';
            return $err;
        }
    }
}
function check_img($param){
    if(preg_match('/[^\s]+(\.(jpg|jpeg|png))$/',$param) !== 1){
        $err = '拡張子はJPEGまたはPNG形式で入力してください';
        return $err;
    }
}
function file_name(){
    $str = uniqid(rand());
    return $str;
}
function upload_item($link,$param){
    $err = [];
    mysqli_autocommit($link, false);
    $sql = 'INSERT INTO item(name,price,img,status,create_at,status) VALUES(\''.$param['name'].'\',\''.$param['price'].'\',\''.$param['img'].'\',\''.$date.'\',\''.$param['status'].'\')';
    if(mysqli_query($link, $sql) === false){
        $err[]='ドリンクリストに追加できませんでした';
    }
    $item_id = mysqli_insert_id($link);
    $sql = 'INSERT INTO stock(drink_id,stock,create_at) VALUES(\''.$item_id.'\',\''.$param['stock'].'\',\''.$date.'\')';
    if(mysqli_query($link, $sql) === false){
        $err[]='在庫データを追加できませんでした';
    }
    //画像保存処理
    if(is_uploaded_file($param['tmp_name'])){
        move_uploaded_file($param['tmp_name'], './image/'.$param['img']);
    }
    if (count($err) === 0) {
        // 処理確定
        mysqli_commit($link);
    }
    else{
    // 処理取消
        mysqli_rollback($link);
        return $err;
    }
}
function update_stock($link,$key,$param){
    $err = '';
    $date = $date = date('y-m-d H:i:s');
    $message = '';
    $sql = 'UPDATE stock SET stock =\''.$param['stock'].'\',update_at= \''.$date.'\'WHERE item_id =\''.$key.'\'';
    if(mysqli_query($link, $sql) === FALSE){
        $err = '在庫が更新できませんでした';
        return $err;
    }
}
function update_status($link,$key,$param){
    $date = date('y-m-d H:i:s');
    $message = '';
    $sql = 'UPDATE item SET status =\''.$param['status'].'\',update_at=\''.$date.'\'WHERE id =\''.$key.'\'';
    if(mysqli_query($link, $sql) === FALSE){
        $err = 'ステータスが更新できませんでした';
        return $err;
    }
}
function delete_item($link,$key){
    $sql = 'delete FROM item WHERE id =\''.$key.'\'';
    if(mysqli_query($link, $sql) === FALSE){
        $err = '商品を削除できませんでした';
        return $err;
    }
}
function get_item_list($link) {
    // SQL生成
    $sql = 'SELECT item.id,item.name,item.price,item.img,item.status,stock.stock FROM item LEFT JOIN stock ON stock.item_id = item.id';
    // クエリ実行
    return get_as_array($link, $sql);
}
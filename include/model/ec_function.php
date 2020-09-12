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
function admin_check($name, $pass){
    if($name === 'admin' && $pass === 'admin'){
        redirect_admin();
    }
}
function redirect_admin(){
    header('Location: /home/ec2-user/environment/htdocs/ec_admin.php');
    exit;
}
function check_login_user($link){
    $sql = 'SELECT user_id FROM user
        WHERE user_name =\'' . $user_name . '\' AND password =\'' . $passwd . '\'';
    return get_as_array($link, $sql);
}
function redirect_login(){
    header('Location: /home/ec2-user/environment/htdocs/ec_login.php');
    exit;
}
function redirect_home(){
    header('Location: /home/ec2-user/environment/htdocs/ec_home.php');
    exit;
}
function get_as_array($link, $sql) {
 
    // 返却用配列
    $data = [];
    $error = '';
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
        $error = 'sql実行失敗'.$sql;
        return $error;
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
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
    }
}
function validation_user($param){
    $error = [];
    if(isset($param['user_name'])){
        $error = check_user_name($param['user_name']);
    }
    if(isset($param['password'])){
        $error = check_password($param['password']);
    }
    return $error;
}
function check_user_name($param){
    $error = '';
    if(preg_match('/^([a-zA-Z0-9]{6,})$/', $param) !== TRUE){
        $error = 'ユーザー名は半角英数字６文字以上で入力してください';   
    }
}
function check_password($param){
    $error = '';
    if(preg_match('/^([a-zA-Z0-9]{6,})$/', $param) !== TRUE){
        $error = 'パスワードは半角英数字６文字以上で入力してください';    
    }
}
function regist_user($link,$key,$param){
    $error = '';
    $date = $date = date('-y-m-d H:i:s');
    $sql = 'INSERT INTO user (user_name,password,created_at) VALUES (\''.$key.',\''.$param.'\','.$date.'\')';
    if(mysqli_query($link, $sql) === false){
        $error = 'ドリンクリストに追加できませんでした';
    };
    return $error;
}
function get_user_list($key){
    $sql = 'SELECT user_name,password,created_at FROM user';
    // クエリ実行
    return get_as_array($key, $sql);
}

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
function check_name($param){
    $err = '';
    if (empty(trim(mb_convert_kana($param, 's', 'UTF-8'))) === TRUE) {
        $err = '名前が未入力または空白のみが入力されています';
    }
    return $err;
}
function check_price($param){
    $err = '';
    if(strlen($param) <> mb_strlen($param)){
        $param = mb_convert_kana($_POST[$param],'n');
        if(ctype_digit($param)){
            $param = intval($param);
        }
    }
    else{
        if(ctype_digit($param)){
            $param = intval($param);
        }
    }
    if (empty($param) === TRUE && $param !== 0) {
        $err = '値段が未入力です';
    }
    elseif(is_int($param) === false || $param < 0){
        $err = '値段は０以上の整数で入力してください';
    }
    return $err;
}
function check_stock($param){
    $err = '';
    if(strlen($param) <> mb_strlen($param)){
        $param = mb_convert_kana($_POST[$param],'n');
        if(ctype_digit($param)){
            $param = intval($param);
        }
    }
    else{
        if(ctype_digit($param)){
            $param = intval($param);
        }
    }
    if (empty($param) === TRUE && $param !== 0) {
        $err = '在庫が未入力です';
    }
    elseif(is_int($param) === false || $param < 0){
        $err = '在庫は０以上の整数で入力してください';
    }
    return $err;
}
function check_img($param){
    $err = '';
    if (empty($param) === TRUE) {
        $err = '商品画像が未入力です';
        }
    elseif(pathinfo($param,PATHINFO_EXTENSION) !== 'jpg'){
        if(pathinfo($param,PATHINFO_EXTENSION) !== 'png'){
            if(pathinfo($param,PATHINFO_EXTENSION) !== 'jpeg'){
                $err = '画像形式はJPEGまたはPNGで入力してください';
            }
        }
    }
    return $err;
}
function check_status($param){
    $err = '';
    if($param !== '0'){
        if($param !== '1'){
            $err = 'ステータスは公開または非公開を入力してください';
        }
    }
    return $err;
}
function upload_drink($link,$date,$new_name,$new_price,$new_status,$new_img,$save_file){
    $err = [];
    $message = '';
    mysqli_autocommit($link, false);
    $sql = 'INSERT INTO drink_list(drink_name,price,create_at,status,display) VALUES(\''.$new_name.'\',\''.$new_price.'\',\''.$date.'\',\''.$new_status.'\',\''.$new_img.'\')';
    if(mysqli_query($link, $sql) === false){
        $err[]='ドリンクリストに追加できませんでした';
    }
    $drink_id = mysqli_insert_id($link);
    $sql = 'INSERT INTO inventory_table(drink_id,stock,create_at) VALUES(\''.$drink_id.'\',\''.$new_stock.'\',\''.$date.'\')';
    if(mysqli_query($link, $sql) === false){
        $err[]='在庫データを追加できませんでした';
    }
    //画像保存処理
    if(is_uploaded_file($save_file)){
        move_uploaded_file($save_file, './image/'.str_replace(' ','',str_replace('-','',str_replace(':','',$date))).$_FILES[$new_img]['name']);
    }
    if (count($err) === 0) {
        // 処理確定
        mysqli_commit($link);
        $message = '商品追加が完了しました';
        return $message;
    }
    else{
    // 処理取消
        mysqli_rollback($link);
    }
}
function update_stock($link,$date,$update_stock,$update_drink_id){
    $message = '';
    $sql = 'UPDATE inventory_table SET stock =\''.$update_stock.'\',update_at= \''.$date.'\'WHERE drink_id =\''.$update_drink_id.'\'';
    if(mysqli_query($link, $sql) !== false){
        $message='在庫が更新されました';
        return $message;
    }
    else{
        die('在庫を更新できませんでした');
    }
}
function update_status($link,$date,$change_status,$update_drink_id){
    $message = '';
    $sql = 'UPDATE drink_list SET status =\''.$change_status.'\',update_at=\''.$date.'\'WHERE drink_id =\''.$update_drink_id.'\'';
    if(mysqli_query($link, $sql) !== false){
        $message='公開ステータスが更新されました';
        return $message;
    }
    else{
        die('公開ステータスを更新できませんでした');
    }
}
function get_drink_list($link) {
    // SQL生成
    $sql = 'SELECT drink_list.drink_id,drink_list.drink_name,drink_list.price,drink_list.create_at,drink_list.status,drink_list.display,inventory_table.stock FROM drink_list LEFT JOIN inventory_table ON inventory_table.drink_id = drink_list.drink_id';
    // クエリ実行
    return get_as_array($link, $sql);
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
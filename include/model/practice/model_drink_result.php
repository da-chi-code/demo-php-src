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
function check_drink_id($param){
    $err = '';
    if (empty($money) === TRUE) {
        $err_msgs[] = 'お金を投入してください';
    }
    return $err;
}
function check_money($param){
    $err = '';
    if(strlen($pram) <> mb_strlen($param)){
        $param = mb_convert_kana($_POST[$param],'n');
        if(ctype_digit($param)){
            $pram = intval($param);
        }
    }
    else{
        if(ctype_digit($param)){
            $param = intval($param);
        }
    }
    if (empty($money) === TRUE) {
        $err = 'お金を投入してください';
    }
    elseif(is_int($money) === false || $money < 0){
        $err = 'お金は０以上の整数で入力してください';
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
function get_drink_data($link) {
    // SQL生成
    $sql = 'SELECT drink_list.drink_id,drink_list.drink_name,drink_list.price,drink_list.create_at,drink_list.status,drink_list.display,inventory_table.stock FROM drink_list LEFT JOIN inventory_table ON inventory_table.drink_id = drink_list.drink_id WHERE drink_list.drink_id ='.$drink_id;
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
function check_purchase($money,$drink_lists){
    $err = [];
    if($money < $drink_lists['price'] ){
        $err[]='お金がたりません';
    }
    if($drink_lists['stock'] === 0){
        $err[]='商品の在庫がありません';
    }
    if($drink_lists['status'] === '0'){
        $err[]='非公開の商品です';
    }
    return $err;
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
function update_inventory_purchase_history($link,$update_stock,$drink_lists,$date,$drink_id){
    $err = [];
    mysqli_autocommit($link, false);
    $update_stock = $drink_lists['stock'] - 1;
    if($drink_lists['stock'] <= 0){
        $err[]='商品の在庫がありません';
    }
    $sql = 'UPDATE inventory_table SET stock =\''.$update_stock.'\',update_at =\''.$date.'\'WHERE drink_id =\''.$drink_id.'\'';
    if(mysqli_query($link, $sql) === false){
        $err[]='在庫を減らせませんでした';
    }
    //購入履歴を追加する処理
    $sql = 'INSERT INTO purchase_history(drink_id,purchase_at) VALUES(\''.$drink_id.'\',\''.$date.'\')';
    if(mysqli_query($link, $sql) === false){
        $err[]='購入履歴を追加できませんでした';
    }
    if (count($err) === 0) {
        // 処理確定
        mysqli_commit($link);
    } 
    else {
        // 処理取消
        mysqli_rollback($link);
        return $err;
    }
}
function change_process($money,$drink_lists){
    $change = '';
    if($money - $drink_lists['price'] >= 0){
        $change = $money - $drink_lists['price'];
    }
    else{
        $change = 0;
    }
    return $change;
}
function close_db_connect($link) {
    // 接続を閉じる
    mysqli_close($link);
}
<?php
// 設定ファイル読み込み
require_once '../../include/conf/const_drink.php';
// 関数ファイルみ込み
require_once '../../include/model/model_drink_tool.php';
//変数定義
date_default_timezone_set('Asia/Tokyo');
$date = date('-y-m-d H:i:s');
$sql_kind = '';
$new_name = '';
$new_price = '';
$new_stock = '';
$new_img = '';
$save_file = '';
$new_status = '';
$err_msgs = [];
$drink_id  = '';
$update_drink_id = '';
$update_stock = '';
$change_status = '';
$drink_lists = [];
$message = '';
$link = get_db_connect();
$request_method = get_request_method();
if($request_method === 'POST'){
    $sql_kind = get_post_data('sql_kind');
    //新規分の入力値エラーチェック
    if($sql_kind === 'insert'){
        $new_name = get_post_data('new_name');
        $new_price = get_post_data('new_price');
        $new_stock = get_post_data('new_stock');
        $new_status = get_post_data('new_status');
        $new_img = get_file_name_data('new_img');
        $save_file = get_file_tmp_name_data('new_img');
        if(check_name($new_name) !== ''){
            $err_msgs[] = check_price($new_name);
        }
        if(check_price($new_price) !== ''){
            $err_msgs[] = check_price($new_price);
        }
        if(check_stock($new_stock) !== ''){
            $err_msgs[] = check_price($new_stock);
        }
        if(check_img($new_img) !== ''){
            $err_msgs[] = check_img($new_img);
        }
       if(check_status($new_status) !== ''){
            $err_msgs[] = check_status($new_status);
        }
        //エラーがなければDBに商品追加処理
        if(count($err_msgs) === 0){
           $message =  upload_drink($link,$date,$new_name,$new_price,$new_status,$new_img,$save_file);
        }
    }
    //在庫数更新分の入力値エラーチェック
    if($sql_kind === 'update'){
        $update_drink_id = get_post_data('drink_id');
        $update_stock = get_post_data('update_stock');
        if(check_stock($update_stock) !== ''){
            $err_msgs[] = check_price($update_stock);
        }
        //エラーがなければ在庫数更新処理
        if (count($err_msgs) === 0){
            $message = update_stock($link,$date,$update_stock,$update_drink_id);
        }
    }
        //公開ステータス更新分の入力値エラーチェック
    if($sql_kind === 'change'){
        $update_drink_id = get_post_data('drink_id');
        $change_status = get_post_data('change_status');
        if(check_status($change_status) !== ''){
            $err_msgs[] = check_status($change_status);
        }
        //エラーがなければ公開ステータス更新処理
        if (count($err_msgs) === 0){
            $message = update_status($link,$date,$change_status,$update_drink_id);
        }
    }
}
$drink_lists = get_drink_list($link);
$drink_lists = entity_assoc_array($drink_lists);
close_db_connect($link);
include_once '../../include/view/view_drink_tool.php';
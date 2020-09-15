<?php
// 設定ファイル読み込み
require_once '../../include/conf/ec_const.php';
// 関数ファイルみ込み
require_once '../../include/model/ec_function.php';
//変数定義
$sql_kind = '';
$new_name = '';
$new_price = '';
$new_stock = '';
$new_img = '';
$save_file = '';
$new_status = '';
$err_msgs = [];
$item_id  = '';
$update_item_id = '';
$update_stock = '';
$change_status = '';
$delete_item_id = '';
$item_lists = [];
$message = '';
//リダイレクト、管理者でなければホームページ、その他はログインページへ
session_start();
if(isset($_SESSION['user_id'])){
    if($_SESSION['user_id'] !== 'admin'){
        redirect_home();
    }
}
else{
        redirect_login();
}
$link = get_db_connect();
$request_method = get_request_method();
if($request_method === 'POST'){
    $sql_kind = get_post_data('sql_kind');
    if($sql_kind === 'insert'){
        //変数を設けず、そのまま入れてはどうか
        $new_name = get_post_data('new_name');
        $new_price = get_post_data('new_price');
        $new_stock = get_post_data('new_stock');
        $new_status = get_post_data('new_status');
        $new_img = get_file_name_data('new_img');
        $save_file = get_file_tmp_name_data('new_img');
        $item_array = array('name'=>$new_name,'price'=>$new_price,'stock'=>$new_stock,'status'=>$new_status,'img'=>$new_img,'tmp_name'=>$save_file);
        //バリデーション
        $err_msgs = validation_item($item_array);
        //エラーがなければDBに商品追加処理
        if(count($err_msgs) === 0){
            //商品画像ファイル名設定
            $new_img = file_name();
            $err_msgs =  upload_item($link,$item_array);
            if(count($err_msgs) === 0){
                $message = '商品が追加されました';
            }
        }
    }
    //在庫数更新分の入力値エラーチェック
    if($sql_kind === 'update'){
        //値を入れる
        $update_item_id = get_post_data('item_id');
        $update_stock = get_post_data('update_stock');
        //バリデーション
        $item_array = array('stock'=>$update_stock);
        $err_msgs = validation_item($item_array);
        //エラーがなければ在庫数更新処理
        if (count($err_msgs) === 0){
            $err_msgs = update_stock($link,$update_item_id,$item_array);
            if (count($err_msgs) === 0){
                $message = '在庫が更新されました';
            }
        }
    }
    //公開ステータス更新分
    if($sql_kind === 'change'){
        //値を入れる
        $update_item_id = get_post_data('item_id');
        $change_status = get_post_data('change_status');
        //バリデーション
        $item_array = array('status'=>$change_status);
        $err_msgs = valodation_item($item_array);
        //エラーがなければ公開ステータス更新処理
        if (count($err_msgs) === 0){
            $err_msgs = update_status($link,$update_item_id,$item_array);
            if (count($err_msgs) === 0){
                $message = 'ステータスが更新されました';
            }
        }
    }
    //削除
    if($sql_kind === 'delete'){
        //値を入れる
        $delete_item_id = get_post_data('item_id');
        $err_msgs = delete_item($link,$delete_item_id);
        if (count($err_msgs) === 0){
            $message = '商品が削除されました';
        }
    }
    
}
//リスト表示
if(is_array(get_item_list($link))){
    $item_lists = get_item_list($link);
}
else{
    $err_msgs = get_item_list($link);
}
//DB切断
close_db_connect($link);
//表示ファイル読み込み
include_once '../../include/view/view_ec_admin.php';
<?php
// 設定ファイル読み込み
require_once '../../include/conf/ec_const.php';
// 関数ファイル読み込み
require_once '../../include/model/ec_function.php';
//require_once '../../include/model/model_user.php';//
require_once '../../include/model/model_item.php';
//変数定義
$sql_kind = '';
/*$new_name = '';
$new_price = '';
$new_stock = '';
$new_img = '';
$save_file = '';
$new_status = '';*/
$err_msgs = [];
/*$item_id  = '';
$update_item_id = '';
$update_stock = '';
$change_status = '';
$delete_item_id = '';*/
$item_lists = [];
$message = '';
//リダイレクト、管理者でなければホームページ、その他はログインページへ
session_start();
$_SESSION['err_msgs'] = [];
if(!isset($_SESSION['user_id'])){
    redirect_login();
}
if(isset($_SESSION['user_id'])){
    if($_SESSION['user_id'] !== 'admin'){
        redirect_home();
    }
}
$link = get_db_connect();
$request_method = get_request_method();
if($request_method === 'POST'){
    $sql_kind = get_post_data('sql_kind');
    if($sql_kind === 'insert'){
        //変数を設けず、そのまま入れてはどうか
        /*$new_name = get_post_data('new_name');
        $new_price = get_post_data('new_price');
        $new_stock = get_post_data('new_stock');
        $new_status = get_post_data('new_status');
        $new_img = get_file_name_data('new_img');
        $save_file = get_file_tmp_name_data('new_img');
        $item_array = array('name'=>$new_name,'price'=>$new_price,'stock'=>$new_stock,'status'=>$new_status,'img'=>$new_img,'tmp_name'=>$save_file);*/
        //バリデーション
        validation_item($_POST);
        validation_img($_FILES);
        //エラーがなければDBに商品追加処理
        if(count($_SESSION['err_msgs']) === 0){
            //商品画像ファイル名設定
            $_FILES['img'] = file_name().$_FILES['img'];
            upload_item($link,$_POST,$_FILES);
            if(count($_SESSION['err_msgs']) === 0){
                $message = '商品が追加されました';
            }
        }
    }
    //在庫数更新
    if($sql_kind === 'update'){
        //値を入れる
        /*$update_item_id = get_post_data('item_id');
        $update_stock = get_post_data('update_stock');*/
        //バリデーション
        //$item_array = array('stock'=>$update_stock);
        validation_item($_POST);
        //エラーがなければ在庫数更新処理
        if (count($_SESSION['err_msgs']) === 0){
            update_stock($link,$_POST);
            if (count($_SESSION['err_msgs']) === 0){
                $message = '在庫が更新されました';
            }
        }
    }
    //公開ステータス更新
    if($sql_kind === 'change'){
        //バリデーション
        validation_item($_POST);
        //エラーがなければ公開ステータス更新処理
        if (count($_SESSION['err_msgs']) === 0){
            update_status($link,$_POST);
            if (count($_SESSION['err_msgs']) === 0){
                $message = 'ステータスが更新されました';
            }
        }
    }
    //削除
    if($sql_kind === 'delete'){
        delete_item($link,$_POST);
        if (count($_SESSION['err_msgs']) === 0){
            $message = '商品が削除されました';
        }
    }
    
}
$item_lists = get_item_list($link);
close_db_connect($link);
$err_msgs = $_SESSION['err_msgs'];
unset($_SESSION['err_msgs']);
include_once '../../include/view/view_ec_admin.php';
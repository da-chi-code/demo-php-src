<?php
// 設定ファイル読み込み
require_once '../../include/conf/ec_const.php';
// 関数ファイル読み込み
require_once '../../include/model/ec_function.php';
require_once '../../include/model/model_item.php';
require_once '../../include/model/model_cart.php';
//変数定義
$message = '';
//リダイレクト、管理者でなければホームページ、その他はログインページへ
session_start();
$_SESSION['err_msgs'] = [];
if(!isset($_SESSION['user_id'])){
    redirect_login();
}
$link = get_db_connect();
$request_method = get_request_method();
if($request_method === 'POST'){
    if($_POST['sql_kind'] === 'insert_cart'){
        add_cart($link,$_POST);
        if(count($_SESSION['err_msgs']) === 0){
            $message = 'カートに登録しました';
        }
    }
}
$item_lists = get_item_list_open($link);
close_db_connect($link);
$err_msgs = $_SESSION['err_msgs'];
unset($_SESSION['err_msgs']);
include_once '../../include/view/view_ec_top.php';
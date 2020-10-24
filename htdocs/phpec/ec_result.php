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
$cart_lists = get_cart_list($link);
if(count($cart_lists) !== 0){
    buy_item($link,$cart_lists);
    if(count($_SESSION['err_msgs']) === 0){
        $message = '購入ありがとうございました';
    }
}
else{
    redirect_home();
}
close_db_connect($link);
$sum = sum_cart($cart_lists);
$err_msgs = $_SESSION['err_msgs'];
unset($_SESSION['err_msgs']);
include_once '../../include/view/view_ec_result.php';

<?php
// 設定ファイル読み込み
require_once '../../include/conf/ec_const.php';
// 関数ファイル読み込み
require_once '../../include/model/ec_function.php';
require_once '../../include/model/model_item.php';
//変数定義
$sql_kind = '';
$err_msgs = [];
$item_lists = [];
$message = '';
//リダイレクト、管理者でなければホームページ、その他はログインページへ
session_start();
$_SESSION['err_msgs'] = [];
if (!isset($_SESSION['user_id'])) {
    redirect_login();
}
if (isset($_SESSION['user_id'])) {
    if ($_COOKIE['user_name'] !== 'admin') {
        redirect_home();
    }
}
$link = get_db_connect();
$request_method = get_request_method();
if ($request_method === 'POST') {
    $sql_kind = get_post_data('sql_kind');
    if ($sql_kind === 'insert') {
        //バリデーション
        validation_item($_POST);
        validation_img($_FILES);
        //エラーがなければDBに商品追加処理
        if (count($_SESSION['err_msgs']) === 0) {
            //商品画像ファイル名設定
            $_FILES['img']['name'] = file_name() . $_FILES['img']['name'];
            upload_item($link, $_POST, $_FILES);
            if (count($_SESSION['err_msgs']) === 0) {
                $message = '商品が追加されました';
            }
        }
    }
    //在庫数更新
    if ($sql_kind === 'update') {
        //バリデーション
        validation_item($_POST);
        //エラーがなければ在庫数更新処理
        if (count($_SESSION['err_msgs']) === 0) {
            update_stock($link, $_POST);
            if (count($_SESSION['err_msgs']) === 0) {
                $message = '在庫が更新されました';
            }
        }
    }
    //公開ステータス更新
    if ($sql_kind === 'change') {
        //バリデーション
        validation_item($_POST);
        //エラーがなければ公開ステータス更新処理
        if (count($_SESSION['err_msgs']) === 0) {
            update_status($link, $_POST);
            if (count($_SESSION['err_msgs']) === 0) {
                $message = 'ステータスが更新されました';
            }
        }
    }
    //削除
    if ($sql_kind === 'delete') {
        delete_item($link, $_POST);
        if (count($_SESSION['err_msgs']) === 0) {
            $message = '商品が削除されました';
        }
    }
}
$item_lists = get_item_list($link);
close_db_connect($link);
$err_msgs = $_SESSION['err_msgs'];
unset($_SESSION['err_msgs']);
include_once '../../include/view/view_ec_admin.php';

<?php
$err_msgs = [];
$message = '';
//読みこみ
require_once '../../include/conf/ec_const.php';
require_once '../../include/model/ec_function.php';
require_once '../../include/model/model_user.php';
// セッション開始
session_start();
$_SESSION['err_msgs'] = [];
if (get_request_method() === 'POST') {
    // データベース接続
    $link = get_db_connect();
    //ユーザー名とパスワードの前後空白削除
    $data = trim_param($_POST);
    // ユーザー名とパスワードのバリデーション
    validation_user($data);
    check_user($link,$data);
    //エラーがなければDB追加処理
    if(count($_SESSION['err_msgs']) === 0){
            regist_user($link,$data);
        if(count($_SESSION['err_msgs']) === 0){
            $message = 'ユーザー登録が完了しました';
        }
    }
}
$err_msgs = $_SESSION['err_msgs'];
unset($_SESSION['err_msgs']);
include_once '../../include/view/view_ec_register.php';

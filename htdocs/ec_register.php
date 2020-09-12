<?php
$user_name = '';
$passwd = '';
$err_msgs = [];
$don_msgs = '';
//読みこみ
require_once '../include/conf/ec_const.php';
require_once '../include/model/ec_function.php';
// セッション開始
if (get_request_method() === 'POST') {
    session_start();
    // POST値取得
    $user_name  = get_post_data('user_name');  // メールアドレス
    $passwd = get_post_data('password'); // パスワード
    // ユーザー名をCookieへ保存
    setcookie('user_name', $user_name, time() + 60 * 60 * 24 * 365);
    // データベース接続
    $link = get_db_connect();
    // ユーザー名とパスワードのバリデーション
    $check = array('user_name' => $user_name , 'password' => $passwd);
    $err_msgs = validation_user($check);
    //エラーがなければDB追加処理
    if(count($err_msgs) === 0){
        $err_msgs = regist_user($link,$user_name,$passwd);
        if(count($err_msgs) === 0){
            $don_msgs = 'ユーザー登録が完了しました';
        }
    }
}
include_once '../include/view/view_ec_register.php';

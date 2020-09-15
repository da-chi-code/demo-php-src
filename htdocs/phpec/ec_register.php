<?php
$user_name = '';
$passwd = '';
$err_msgs = [];
$message = '';
//読みこみ
require_once '../../include/conf/ec_const.php';
require_once '../../include/model/ec_function.php';
// セッション開始
if (get_request_method() === 'POST') {
    // POST値取得
    $user_name  = get_post_data('user_name');  // メールアドレス
    $passwd = get_post_data('password'); // パスワード
    // データベース接続
    $link = get_db_connect();
    // ユーザー名とパスワードのバリデーション
    $check = array('user_name' => $user_name , 'password' => $passwd);
    $err_msgs = validation_user($check);
    //エラーがなければDB追加処理
    if(count($err_msgs) === 0){
        $err_msgs = regist_user($link,$user_name,$passwd);
        if(count($err_msgs) === 0){
            $message = 'ユーザー登録が完了しました';
        }
    }
}
include_once '../../include/view/view_ec_register.php';

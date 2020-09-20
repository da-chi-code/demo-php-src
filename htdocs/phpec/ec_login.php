<?php
/*$user_name = '';
$passwd = '';*/
$err_msgs = [];
//ログイン処理
//読み込み
require_once '../../include/conf/ec_const.php';
require_once '../../include/model/ec_function.php';
require_once '../../include/model/model_user.php';
// セッション開始
session_start();
$_SESSION['err_msgs'] = [];
if (get_request_method() === 'POST') {
    // POST値取得
    /*$user_name  = get_post_data('user_name');  // メールアドレス
    $passwd = get_post_data('password');*/ // パスワード
    validation_user($_POST);
    // ユーザー名をCookieへ保存
    setcookie('user_name', $_POST['user_name'], time() + 60 * 60 * 24 * 365);
    //管理者であれば商品管理ページにリダイレクトする
    admin_check($_POST);
    // データベース接続
    $link = get_db_connect();
    // SQL実行し登録データを配列で取得
    $data = check_login_user($link, $_POST);
    // データベース切断
    close_db_connect($link);
    // 登録データを取得できたか確認
    if (isset($data[0]['id'])) {
        // セッション変数にuser_idを保存
        $_SESSION['user_id'] = $data[0]['id'];
        // ログイン済みユーザのホームページへリダイレクト
        redirect_home();
    } else {
        $_SESSION['err_msgs'][] = '登録されていないユーザーです';
    }
}
$err_msgs = $_SESSION['err_msgs'];
unset($_SESSION['err_msgs']);
include_once '../../include/view/view_ec_login.php';
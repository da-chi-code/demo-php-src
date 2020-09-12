<?php
$user_name = '';
$passwd = '';
//ログイン処理
//読み込み
require_once '../include/conf/ec_const.php';
require_once '../include/model/ec_function.php';
// リクエストメソッド確認
/*if (get_request_method() !== 'POST') {
    header('Location: ./ec_login.php');
    exit;
}*/
if(isset($_SESSION['user_id'])){
    redirect_home();
}
// セッション開始
if (get_request_method() === 'POST') {
    session_start();
    // POST値取得
    $user_name  = get_post_data('user_name');  // メールアドレス
    $passwd = get_post_data('password'); // パスワード
    // ユーザー名をCookieへ保存
    setcookie('user_name', $user_name, time() + 60 * 60 * 24 * 365);
    //管理者であれば商品管理ページにリダイレクトする
    admin_check($user_name, $passwd);
    // データベース接続
    $link = get_db_connect();
    // SQL実行し登録データを配列で取得
    $data = check_login_user($link, $sql);
    // データベース切断
    close_db_connect($link);
    // 登録データを取得できたか確認
    if (isset($data[0]['user_id'])) {
        // セッション変数にuser_idを保存
        $_SESSION['user_id'] = $data[0]['user_id'];
        // ログイン済みユーザのホームページへリダイレクト
        redirect_home();
    } else {
        // セッション変数にログインのエラーフラグを保存
        $_SESSION['login_err_flag'] = TRUE;
        // ログインページへリダイレクト
        redirect_login();
    }
}
include_once '../include/view/view_ec_login.php';

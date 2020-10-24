<?php
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
    validation_user($_POST);
    // ユーザー名をCookieへ保存
    setcookie('user_name', $_POST['user_name'], time() + 60 * 60 * 24 * 365);
    // データベース接続
    $link = get_db_connect();
    // SQL実行し登録データを配列で取得
    $data = check_login_user($link, $_POST);
    // データベース切断
    close_db_connect($link);
    // 登録データを取得できたか確認
    if(count($_SESSION['err_msgs']) === 0){
        if (isset($data[0]['id'])) {
            // セッション変数にuser_idを保存
            $_SESSION['user_id'] = $data[0]['id'];
            //管理者かどうかチェック
            login_check($_POST);
        } else {
            $_SESSION['err_msgs'][] = 'ユーザー名またはパスワードが違います';
        }
    }
}
$err_msgs = $_SESSION['err_msgs'];
unset($_SESSION['err_msgs']);
include_once '../../include/view/view_ec_login.php';
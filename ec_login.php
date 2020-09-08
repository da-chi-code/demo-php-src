<?php
/*
*  ログイン処理
*
*  セッションの仕組み理解を優先しているため、一部処理はModelへ分離していません
*  また処理はセッション関連の最低限のみ行っており、本来必要な処理も省略しています
*/
require_once '../include/conf/ec_const.php';
require_once '../include/model/ec_function.php';
// リクエストメソッド確認
if (get_request_method() !== 'POST') {
    // POSTでなければログインページへリダイレクト
    header('Location: ec_login.php');
    exit;
}
// セッション開始
session_start();
// POST値取得
$email  = get_post_data('email');  // メールアドレス
$passwd = get_post_data('passwd'); // パスワード
// メールアドレスをCookieへ保存
setcookie('email', $email, time() + 60 * 60 * 24 * 365);
// データベース接続
$link = get_db_connect();
// メールアドレスとパスワードからuser_idを取得するSQL
$sql = 'SELECT user_id FROM user_table
       WHERE email =\'' . $email . '\' AND passwd =\'' . $passwd . '\'';
// SQL実行し登録データを配列で取得
$data = get_as_array($link, $sql);
// データベース切断
close_db_connect($link);
// 登録データを取得できたか確認
if (isset($data[0]['user_id'])) {
    // セッション変数にuser_idを保存
    $_SESSION['user_id'] = $data[0]['user_id'];
    // ログイン済みユーザのホームページへリダイレクト
    header('Location: ec_home.php');
    exit;
} else {
    // セッション変数にログインのエラーフラグを保存
    $_SESSION['login_err_flag'] = TRUE;
    // ログインページへリダイレクト
    header('Location: ec_login.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>ログインページ</title>
    <link type="text/css" rel="stylesheet" href="./css/common.css">
</head>

<body>
    <header>
        <div class="header-box">
            <a href="./top.php">
                <img class="logo" src="./images/logo.png" alt="CodeSHOP">
            </a>
            <a href="./cart.php" class="cart"></a>
        </div>
    </header>
    <div class="content">
        <div class="login">
            <form method="post" action="./login.php">
                <div><input type="text" name="user_name" placeholder="ユーザー名"></div>
                <div><input type="password" name="password" placeholder="パスワード">
                    <div><input type="submit" value="ログイン">
            </form>
            <div class="account-create">
                <a href="./register.php">ユーザーの新規作成</a>
            </div>
        </div>
    </div>
</body>

</html>
<?php
//ログアウト処理
require_once '../../include/conf/ec_const.php';
require_once '../../include/model/ec_function.php';
// セッション開始
session_start();
//セッション名取得
$session_name = session_name();
// セッション変数を全て削除
$_SESSION = [];
// ユーザのCookieに保存されているセッションIDを削除
settion_delete($_COOKIE[$session_name]);
// セッションIDを無効化
session_destroy();
// ログアウトの処理が完了したらログインページへリダイレクト
redirect_login();

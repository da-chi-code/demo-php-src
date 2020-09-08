<?php
// 設定ファイル読み込み
require_once '../../include/conf/ec_const.php';
// 関数ファイルみ込み
require_once '../../include/model/ec_function.php';
//変数定義
date_default_timezone_set('Asia/Tokyo');
$date = date('y-m-d H:i:s');
$sql_kind = '';
$new_name = '';
$new_price = '';
$new_stock = '';
$new_img = '';
$save_file = '';
$new_status = '';
$err_msgs = [];
$drink_id  = '';
$update_drink_id = '';
$update_stock = '';
$change_status = '';
$drink_lists = [];
$message = '';
$link = get_db_connect();
$request_method = get_request_method();
if ($request_method === 'POST') {
    $sql_kind = get_post_data('sql_kind');
    //新規分の入力値エラーチェック
    if ($sql_kind === 'insert') {
        $new_name = get_post_data('new_name');
        $new_price = get_post_data('new_price');
        $new_stock = get_post_data('new_stock');
        $new_status = get_post_data('new_status');
        $new_img = get_file_name_data('new_img');
        $save_file = get_file_tmp_name_data('new_img');
        if (check_name($new_name) !== '') {
            $err_msgs[] = check_price($new_name);
        }
        if (check_price($new_price) !== '') {
            $err_msgs[] = check_price($new_price);
        }
        if (check_stock($new_stock) !== '') {
            $err_msgs[] = check_price($new_stock);
        }
        if (check_img($new_img) !== '') {
            $err_msgs[] = check_img($new_img);
        }
        if (check_status($new_status) !== '') {
            $err_msgs[] = check_status($new_status);
        }
        //エラーがなければDBに商品追加処理
        if (count($err_msgs) === 0) {
            $message =  upload_drink($link, $date, $new_name, $new_price, $new_status, $new_img, $save_file);
        }
    }
    //在庫数更新分の入力値エラーチェック
    if ($sql_kind === 'update') {
        $update_drink_id = get_post_data('drink_id');
        $update_stock = get_post_data('update_stock');
        if (check_stock($update_stock) !== '') {
            $err_msgs[] = check_price($update_stock);
        }
        //エラーがなければ在庫数更新処理
        if (count($err_msgs) === 0) {
            $message = update_stock($link, $date, $update_stock, $update_drink_id);
        }
    }
    //公開ステータス更新分の入力値エラーチェック
    if ($sql_kind === 'change') {
        $update_drink_id = get_post_data('drink_id');
        $change_status = get_post_data('change_status');
        if (check_status($change_status) !== '') {
            $err_msgs[] = check_status($change_status);
        }
        //エラーがなければ公開ステータス更新処理
        if (count($err_msgs) === 0) {
            $message = update_status($link, $date, $change_status, $update_drink_id);
        }
    }
}
$drink_lists = get_drink_list($link);
$drink_lists = entity_assoc_array($drink_lists);
close_db_connect($link);
include_once '../../include/view/view_drink_tool.php';

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>商品一覧ページ</title>
    <link type="text/css" rel="stylesheet" href="./css/common.css">
</head>

<body>
    <header>
        <div class="header-box">
            <a href="./top.php">
                <img class="logo" src="./images/logo.png" alt="CodeSHOP">
            </a>
            <a class="nemu" href="./logout.php">ログアウト</a>
            <a href="./cart.php" class="cart"></a>
            <p class="nemu">ユーザー名：taikin</p>
        </div>
    </header>
    <div class="content">

        <ul class="item-list">
            <li>
                <div class="item">
                    <form action="./top.php" method="post">
                        <img class="item-img" src="./img_item/95884a7952ffd2359cb9a771fc977df0.png">
                        <div class="item-info">
                            <span class="item-name">ワンピース</span>
                            <span class="item-price">¥5000</span>
                        </div>
                        <input class="cart-btn" type="submit" value="カートに入れる">
                        <input type="hidden" name="item_id" value="364">
                        <input type="hidden" name="sql_kind" value="insert_cart">
                    </form>
                </div>
            </li>
            <li>
                <div class="item">
                    <form action="./top.php" method="post">
                        <img class="item-img" src="./img_item/2c714f196e7b006af7a7aaffb1c598a3.png">
                        <div class="item-info">
                            <span class="item-name">Tシャツ</span>
                            <span class="item-price">¥1000</span>
                        </div>
                        <p class="sold-out">売り切れ</p>
                        <input type="hidden" name="item_id" value="365">
                        <input type="hidden" name="sql_kind" value="insert_cart">
                    </form>
                </div>
            </li>
            <li>
                <div class="item">
                    <form action="./top.php" method="post">
                        <img class="item-img" src="./img_item/3674cca1bf9772003336c5e7777f9ee9.png">
                        <div class="item-info">
                            <span class="item-name">Yシャツ</span>
                            <span class="item-price">¥3000</span>
                        </div>
                        <input class="cart-btn" type="submit" value="カートに入れる">
                        <input type="hidden" name="item_id" value="366">
                        <input type="hidden" name="sql_kind" value="insert_cart">
                    </form>
                </div>
            </li>
        </ul>
    </div>
</body>

</html>
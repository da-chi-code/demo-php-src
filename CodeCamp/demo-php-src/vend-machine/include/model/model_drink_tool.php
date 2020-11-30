<?php

/**
 * DBハンドルを取得
 * @return obj $link DBハンドル
 */
function get_db_connect()
{

    // コネクション取得
    if (!$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWD, DB_NAME)) {
        die('DB接続失敗');
    }
    // 文字コードセット
    mysqli_set_charset($link, DB_CHARACTER_SET);
    return $link;
}
function get_request_method()
{
    return $_SERVER['REQUEST_METHOD'];
}
function get_post_data($key)
{
    $str = '';
    if (isset($_POST[$key]) === TRUE) {
        $str = $_POST[$key];
    }
    return $str;
}
function get_file_name_data($key)
{
    $str = '';
    if (isset($_FILES[$key]) === TRUE) {
        $str = $_FILES[$key]['name'];
    }
    return $str;
}
function get_file_tmp_name_data($key)
{
    $str = '';
    if (isset($_FILES[$key]) === TRUE) {
        $str = $_FILES[$key]['tmp_name'];
    }
    return $str;
}
function check_name($param)
{
    $err = '';
    if (empty(trim(mb_convert_kana($param, 's', 'UTF-8'))) === TRUE) {
        $err = '名前が未入力または空白のみが入力されています';
    }
    return $err;
}
function check_price($param)
{
    $err = '';
    if (strlen($param) <> mb_strlen($param)) {
        $param = mb_convert_kana($_POST[$param], 'n');
        if (ctype_digit($param)) {
            $param = intval($param);
        }
    } else {
        if (ctype_digit($param)) {
            $param = intval($param);
        }
    }
    if (empty($param) === TRUE && $param !== 0) {
        $err = '値段が未入力です';
    } elseif (is_int($param) === false || $param < 0) {
        $err = '値段は０以上の整数で入力してください';
    }
    return $err;
}
function check_stock($param)
{
    $err = '';
    if (strlen($param) <> mb_strlen($param)) {
        $param = mb_convert_kana($_POST[$param], 'n');
        if (ctype_digit($param)) {
            $param = intval($param);
        }
    } else {
        if (ctype_digit($param)) {
            $param = intval($param);
        }
    }
    if (empty($param) === TRUE && $param !== 0) {
        $err = '在庫が未入力です';
    } elseif (is_int($param) === false || $param < 0) {
        $err = '在庫は０以上の整数で入力してください';
    }
    return $err;
}
function check_img($param)
{
    $err = '';
    if (empty($param) === TRUE) {
        $err = '商品画像が未入力です';
    } elseif (pathinfo($param, PATHINFO_EXTENSION) !== 'jpg') {
        if (pathinfo($param, PATHINFO_EXTENSION) !== 'png') {
            if (pathinfo($param, PATHINFO_EXTENSION) !== 'jpeg') {
                $err = '画像形式はJPEGまたはPNGで入力してください';
            }
        }
    }
    return $err;
}
function check_status($param)
{
    $err = '';
    if ($param !== '0') {
        if ($param !== '1') {
            $err = 'ステータスは公開または非公開を入力してください';
        }
    }
    return $err;
}
function upload_drink($link, $date, $new_name, $new_price, $new_stock, $new_status, $new_img, $save_file)
{
    $err = [];
    $message = '';
    mysqli_autocommit($link, false);
    $sql = 'INSERT INTO drink_list(drink_name,price,create_at,status,display) VALUES(\'' . $new_name . '\',\'' . $new_price . '\',\'' . $date . '\',\'' . $new_status . '\',\'' . $new_img . '\')';
    if (mysqli_query($link, $sql) === false) {
        $err[] = 'ドリンクリストに追加できませんでした';
    }
    $drink_id = mysqli_insert_id($link);
    $sql = 'INSERT INTO inventory_table(drink_id,stock,create_at) VALUES(\'' . $drink_id . '\',\'' . $new_stock . '\',\'' . $date . '\')';
    if (mysqli_query($link, $sql) === false) {
        $err[] = '在庫データを追加できませんでした';
    }
    //画像保存処理
    if (is_uploaded_file($save_file)) {
        move_uploaded_file($save_file, './image/' . str_replace(' ', '', str_replace('-', '', str_replace(':', '', $date))) . $_FILES[$new_img]['name']);
    }
    if (count($err) === 0) {
        // 処理確定
        mysqli_commit($link);
        $message = '商品追加が完了しました';
        return $message;
    } else {
        // 処理取消
        mysqli_rollback($link);
    }
}
function update_stock($link, $date, $update_stock, $update_drink_id)
{
    $message = '';
    $sql = 'UPDATE inventory_table SET stock =\'' . $update_stock . '\',update_at= \'' . $date . '\'WHERE drink_id =\'' . $update_drink_id . '\'';
    if (mysqli_query($link, $sql) !== false) {
        $message = '在庫が更新されました';
        return $message;
    } else {
        die('在庫を更新できませんでした');
    }
}
function update_status($link, $date, $change_status, $update_drink_id)
{
    $message = '';
    $sql = 'UPDATE drink_list SET status =\'' . $change_status . '\',update_at=\'' . $date . '\'WHERE drink_id =\'' . $update_drink_id . '\'';
    if (mysqli_query($link, $sql) !== false) {
        $message = '公開ステータスが更新されました';
        return $message;
    } else {
        die('公開ステータスを更新できませんでした');
    }
}
function get_drink_list($link)
{
    // SQL生成
    $sql = 'SELECT drink_list.drink_id,drink_list.drink_name,drink_list.price,drink_list.create_at,drink_list.status,drink_list.display,inventory_table.stock FROM drink_list LEFT JOIN inventory_table ON inventory_table.drink_id = drink_list.drink_id';
    // クエリ実行
    return get_as_array($link, $sql);
}
function get_as_array($link, $sql)
{
    // 返却用配列
    $data = [];
    // クエリを実行する
    if ($result = mysqli_query($link, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            // １件ずつ取り出す
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        }
        // 結果セットを開放
        mysqli_free_result($result);
    }
    return $data;
}
function close_db_connect($link)
{
    // 接続を閉じる
    mysqli_close($link);
}
function entity_str($str)
{
    return htmlspecialchars($str, ENT_QUOTES, HTML_CHARACTER_SET);
}
function entity_assoc_array($assoc_array)
{
    foreach ($assoc_array as $key => $value) {
        foreach ($value as $keys => $values) {
            // 特殊文字をHTMLエンティティに変換
            $assoc_array[$key][$keys] = entity_str($values);
        }
    }
    return $assoc_array;
}

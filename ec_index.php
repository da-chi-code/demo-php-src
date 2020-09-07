<?php
// 設定ファイル読み込み
require_once '../../include/conf/ec_const.php';
// 関数ファイルみ込み
require_once '../../include/model/ec_function.php';
//変数定義
$money = '';
$drink_lists = [];
$link = get_db_connect();
$drink_lists = get_drink_list_status($link);
$drink_lists = entity_assoc_array($drink_lists);
close_db_connect($link);

include_once '../../include/view/view_drink_index.php';

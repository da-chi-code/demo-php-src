<?php
// 設定ファイル読み込み
require_once '../../include/conf/const_drink.php';
// 関数ファイルみ込み
require_once '../../include/model/model_drink_result.php';
//変数定義
//変数定義
$money = '';
$drink_id = '';
$err_msgs = [];
$drink_lists = [];
$update_stock = '';
$change = '';
$date = date('Y-m-d H:i:s');
//接続確認
$link = get_db_connect();
$request_method = get_request_method();
if($request_method === 'POST'){
    //投入金額及び商品選択のエラーチェック
    $money = get_post_data('money');
    $drink_id = get_post_data('drink_id');
    if(check_name($money) !== ''){
        $err_msgs[] = check_price($money);
    }
    if(check_name($drink_id) !== ''){
        $err_msgs[] = check_price($drink_id);
    }
        //エラーがなければ選択商品の各データを取得する処理
        if(count($err_msgs) === 0){
            $drink_lists = get_drink_data($link);
            $drink_lists = entity_assoc_array($drink_lists);
            if(check_purchase($money,$drink_lists) !== ''){
                $err_msgs[] = array_merge($err_msgs, check_purchase($money,$drink_lists));
            }
            if(update_inventory_purchase_history($link,$update_stock,$drink_lists,$date,$drink_id) !== ''){
                $err_msgs[] = array_merge($err_msgs, update_inventory_purchase_history($link,$update_stock,$drink_lists,$date,$drink_id));
            }
            if(count($err_msgs) === 0){
                $change = change_process($money,$drink_lists);
            }
        }
    close_db_connect($link);
}
    include_once '../../include/view/view_drink_result.php';
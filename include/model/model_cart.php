<?php
function add_cart($link,$param){
    $sql = 'SELECT id,amount FROM cart WHERE user_id = \''.$_SESSION['user_id'].'\' AND item_id = \''.$param['id'].'\'';
    // クエリ実行
    $data = get_as_array($link, $sql);
    if(isset($data[0]['id'])){
        add_amount($param,$data,$link);
    }
    else{
        insert_cart($param,$link);
    }
}
function add_amount($param,$data,$link){
    $item_data = get_item_list_cart($link,$param);
    if($item_data[0]['stock'] > $data[0]['amount']){
        $sql = 'UPDATE cart SET amount =\''.($data[0]['amount'] + 1).'\',updated_at= \''.date('y-m-d H:i:s').'\' WHERE user_id =\''.$_SESSION['user_id'].'\' AND item_id =\''.$param['id'].'\'';
        if(mysqli_query($link, $sql) === FALSE){
            $_SESSION['err_msgs'][] = '商品をカートに入れられませんでした（過去に選択済の商品）';
        }
    }
    else{
        $_SESSION['err_msgs'][] = $item_data[0]['name'].'の在庫が足りません';
    }
}
function insert_cart($param,$link){
    $item_data = get_item_list_cart($link,$param);
    if($item_data[0]['stock'] > 0){
        $sql = 'INSERT INTO cart (user_id,item_id,amount,created_at) VALUES(\''.$_SESSION['user_id'].'\',\''.$param['id'].'\',\'1\',\''.date('y-m-d H:i:s').'\')';
        if(mysqli_query($link, $sql) === FALSE){
            $_SESSION['err_msgs'][] = '商品をカートに入れられませんでした（新しく選択された商品）';
        }
    }
    else{
        $_SESSION['err_msgs'][] = $item_data[0]['name'].'の在庫が足りません';
    }
}
function get_cart_list($link) {
    $sql = 'SELECT item.id,item.name,item.price,item.img,cart.user_id,cart.amount FROM item LEFT JOIN cart ON item.id = cart.item_id WHERE user_id = \''.$_SESSION['user_id'].'\'ORDER BY id ASC';
    return get_as_array($link, $sql);
}
function delete_cart($link,$param){
    $sql = 'delete FROM cart WHERE user_id =\''.$_SESSION['user_id'].'\' AND item_id =\''.$param.'\'';
    if(mysqli_query($link, $sql) === FALSE){
        $_SESSION['err_msgs'][] = 'カートの商品を削除できませんでした';
    }
}
function check_amount($param){
    if (preg_match('/^([1-9][0-9]*)$/',$param['amount']) !== 1){
        $_SESSION['err_msgs'][] = '個数は正の整数で入力してください';
    }
}
function change_amount($link,$param){
    $item_data = get_item_list_cart($link,$param);
    if($param['amount'] <= $item_data[0]['stock']){
        if(count($_SESSION['err_msgs']) === 0){
                $sql = 'UPDATE cart SET amount =\''.($param['amount']).'\',updated_at= \''.date('y-m-d H:i:s').'\' WHERE user_id = \''.$_SESSION['user_id'].'\' AND item_id =\''.$param['id'].'\'';
                if(mysqli_query($link, $sql) === FALSE){
                    $_SESSION['err_msgs'][] = 'カートの数量を変更できませんでした';
                }
        }
    }
    else{
        $_SESSION['err_msgs'][] = $item_data[0]['name'].'の在庫が足りません';
    }
}
function sum_cart($params){
    $sum = 0;
    foreach ($params as $param) {
        $sum = $sum + ($param['price'] * $param['amount']);
    }
    return $sum;
}
function buy_item($link,$params){
    mysqli_autocommit($link, false);
    foreach($params as $param){
        $item_data = get_item_list_cart($link,$param);
        delete_cart($link,$param['id']);
        change_stock($link,$item_data[0],-($param['amount']));
    }
    transaction($link);
}
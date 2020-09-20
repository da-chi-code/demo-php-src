<?php
function add_cart($link,$param){
    $sql = 'SELECT id,amount FROM cart WHERE user_id = \''.$_SESSION['user_id'].'\' AND item_id = \''.$param['id'].'\'';
    // クエリ実行
    $data = get_as_array($link, $sql);
    if(isset($data[0]['id'])){
        mysqli_autocommit($link, false);
        add_amount($param,$data,$link);
        //change_stock($link,$param,-1);
        transaction($link);
    }
    else{
        mysqli_autocommit($link, false);
        insert_cart($param,$link);
        //change_stock($link,$param,-1);
        transaction($link);
    }
}
function add_amount($param,$data,$link){
    $sql = 'UPDATE cart SET amount =\''.($data['amount'] + 1).'\',updated_at= \''.date('y-m-d H:i:s').'\'WHERE id =\''.$param['id'].'\'';
    if(mysqli_query($link, $sql) === FALSE){
        $_SESSION['err_msgs'][] = '商品がカートに入れられませんでした（過去に選択済の商品）';
    }
}
function insert_cart($param,$link){
    $sql = 'INSERT INTO cart (user_id,item_id,amount,created_at) VALUES(\''.$_SESSION['user_id'].'\',\''.$param['id'].'\',\'1\',\''.date('y-m-d H:i:s').'\'';
    if(mysqli_query($link, $sql) === FALSE){
        $_SESSION['err_msgs'][] = '商品がカートに入れられませんでした（新しく選択された商品）';
    }
}
function get_cart_list($link) {
    $sql = 'SELECT item.name,item.price,item.img,item.status,cart.user_id,cart.amount FROM item LEFT JOIN cart ON stock.item_id = item.id WHERE user_id = \''.$_SESSION['user_id'].'\'';
    return get_as_array($link, $sql);
}
function delete_item($link,$key){
    mysqli_autocommit($link, false);
    $data = get_cart_list($link);
    $sql = 'delete FROM cart WHERE user_id =\''.$SESSION['user_id'].'\' AND item_id =\''.$key['id'].'\'';
    if(mysqli_query($link, $sql) === FALSE){
        $_SESSION['err_msgs'][] = 'カートの商品を削除できませんでした';
    }
    //($link,$param,($data['amount']));
    transaction($link);
}
function change_amount($param,$link){
    mysqli_autocommit($link, false);
    $sql = 'UPDATE cart SET amount =\''.($param['amount']).'\',updated_at= \''.date('y-m-d H:i:s').'\'WHERE id =\''.$param['id'].'\'';
    if(mysqli_query($link, $sql) === FALSE){
        $_SESSION['err_msgs'][] = 'カートの数量を変更できませんでした';
    }
    $data = get_cart_list($link);
    //change_stock($link,$param,($data['amount'] - $param{'amount'}));
    transaction($link);
}
function sum_cart($params){
    foreach ($params as $param) {
        $sum = 0;
        $sum = $sum + ($param['price'] * $param['amount']);
    }
    return $sum;
}
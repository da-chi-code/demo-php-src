<?php
function validation_item($param){
    if(isset($param['name'])){
        check_item_name($param['name']);
    }
    if(isset($param['price'])){
        check_price($param['price']);
    }
    if(isset($param['stock'])){
        check_stock($param['stock']);
    }
    if(isset($param['status'])){
        check_status($param['status']);
    }
}
function validation_img($file){
   if(isset($file['img']['name'])){
        check_img($file['img']['name']);
    }    
}
function check_item_name($param){
    if (preg_match('/\s*$/', $param) !== 1){
        $_SESSION['err_msgs'][] = '名前が未入力または空白のみが入力されています';
    }
}
function check_price($param){
   if (preg_match('/^([1-9][0-9]*|0)$/', $param) !== 1){
        $_SESSION['err_msgs'][] = '値段は０以上の整数で入力してください';
    }
}
function check_stock($param){
   if (preg_match('/^([1-9][0-9]*|0)$/', $param) !== 1){
        $_SESSION['err_msgs'][] = '在庫は０以上の整数で入力してください';
    }
}
function check_status($param){
    if($param !== '0'){
        if($param !== '1'){
            $_SESSION['err_msgs'][] = 'ステータスは公開または非公開を入力してください';
        }
    }
}
function check_img($param){
    if(preg_match('/[^\s]+(\.(jpg|jpeg|png))$/',$param) !== 1){
        $_SESSION['err_msgs'][] = '拡張子はJPEGまたはPNG形式で入力してください';
    }
}
function file_name(){
    $str = uniqid(rand().'_');
    return $str;
}
function upload_item($link,$param,$file){
    mysqli_autocommit($link, false);
    $sql = 'INSERT INTO item(name,price,img,status,created_at) VALUES(\''.$param['name'].'\',\''.$param['price'].'\',\''.$param['img'].'\',\''.$param['status'].'\',\''.date('y-m-d H:i:s').'\')';
    if(mysqli_query($link, $sql) === false){
        $_SESSION['err_msgs'][] ='ドリンクリストに追加できませんでした';
    }
    $item_id = mysqli_insert_id($link);
    $sql = 'INSERT INTO stock(item_id,stock,created_at) VALUES(\''.$item_id.'\',\''.$param['stock'].'\',\''.date('y-m-d H:i:s').'\')';
    if(mysqli_query($link, $sql) === false){
        $_SESSION['err_msgs'][] ='在庫データを追加できませんでした';
    }
    if(is_uploaded_file($file['tmp_name'])){
        move_uploaded_file($file['tmp_name'], './image/'.$file['img']);
    }
    transaction($link);
}
function update_stock($link,$key,$param){
    $sql = 'UPDATE stock SET stock =\''.$param['stock'].'\',updated_at= \''.date('y-m-d H:i:s').'\'WHERE item_id =\''.$key.'\'';
    if(mysqli_query($link, $sql) === FALSE){
        $_SESSION['err_msgs'][] = '在庫が更新できませんでした';
    }
}
function update_status($link,$param){
    $sql = 'UPDATE item SET status =\''.$param['status'].'\',updated_at=\''.date('y-m-d H:i:s').'\'WHERE id =\''.$param['id'].'\'';
    if(mysqli_query($link, $sql) === FALSE){
        $_SESSION['err_msgs'][] = 'ステータスが更新できませんでした';
    }
}
function delete_item($link,$key){
    mysqli_autocommit($link, false);
    $sql = 'delete FROM item WHERE id =\''.$key['id'].'\'';
    if(mysqli_query($link, $sql) === FALSE){
        $_SESSION['err_msgs'][] = '商品を削除できませんでした';
    }
    $sql = 'delete FROM stock WHERE item_id =\''.$key['id'].'\'';
    if(mysqli_query($link, $sql) === FALSE){
        $_SESSION['err_msgs'][] = '商品の在庫を削除できませんでした';
    }
    transaction($link);
}
function get_item_list($link) {
    $sql = 'SELECT item.id,item.name,item.price,item.img,item.status,stock.stock FROM item LEFT JOIN stock ON stock.item_id = item.id';
    return get_as_array($link, $sql);
}
function get_item_list_open($link) {
    $sql = 'SELECT item.id,item.name,item.price,item.img,item.status,stock.stock FROM item LEFT JOIN stock ON stock.item_id = item.id WHERE status = \'1\'';
    return get_as_array($link, $sql);
}
function change_stock($link,$param,$key){
    $sql = 'UPDATE stock SET stock =\''.($param['stock'] + ($key)) .'\',updated_at= \''.date('y-m-d H:i:s').'\'WHERE item_id =\''.$param['id'].'\'';
    if(mysqli_query($link, $sql) === FALSE){
        $_SESSION['err_msgs'][] = '在庫が更新できませんでした';
    }
}
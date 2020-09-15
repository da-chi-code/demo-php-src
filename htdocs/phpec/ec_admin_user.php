<?php
//読み込み
require_once '../../include/conf/ec_const.php';
require_once '../../include/model/ec_function.php';
$user_lists = [];
$err_msg = '';
$link = get_db_connect();
if(is_array(get_user_list($link))){
    $user_lists = get_user_list($link);   
}
else{
    $err_msg = get_user_list($link);
}
close_db_connect($link);
include_once '../../include/view/view_ec_admin_user.php';
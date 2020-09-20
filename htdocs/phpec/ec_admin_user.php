<?php
//読み込み
require_once '../../include/conf/ec_const.php';
require_once '../../include/model/ec_function.php';
require_once '../../include/model/model_user.php';
$user_lists = [];
session_start();
if(!isset($_SESSION['user_id'])){
    redirect_login();
}
if(isset($_SESSION['user_id'])){
    if($_SESSION['user_id'] !== 'admin'){
        redirect_home();
    }
}
$_SESSION['err_msgs'] = [];
$link = get_db_connect();
$user_lists = get_user_list($link);
close_db_connect($link);
$err_msgs = $_SESSION['err_msgs'];
unset($_SESSION['err_msgs']);
include_once '../../include/view/view_ec_admin_user.php';
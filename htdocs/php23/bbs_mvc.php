<?php
// 設定ファイル読み込み
require_once '../../include/conf/const_bbs.php';
// 関数ファイルみ込み
require_once '../../include/model/model_bbs.php';

$name = '';
$comment = '';
$comment_log = [];
$error = []; 
$link = get_db_connect();
$request_method = get_request_method();
if ($request_method === 'POST'){
    $name = get_post_data('user_name');
    $comment = get_post_data('user_comment');
    if(check_name($name) !== ''){
        $error[] = check_name($name);
    }
    if(check_comment($comment) !== ''){
        $error[] = check_comment($comment);
    }
    if (count($error) === 0){
        insert_comment($link,$name,$comment);
    }
}
$comment_log = get_comment_log_list($link);
$comment_log = entity_assoc_array($comment_log);
close_db_connect($link);

include_once '../../include/view/view_bbs.php';
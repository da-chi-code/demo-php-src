<?php
function login_check($param)
{
    if ($param['user_name'] === 'admin' && $param['password'] === 'admin') {
        redirect_admin();
    } else {
        redirect_home();
    }
}
function check_login_user($link, $param)
{
    $sql = 'SELECT id FROM user WHERE user_name =\'' . $param['user_name'] . '\' AND password =\'' . $param['password'] . '\'';
    return get_as_array($link, $sql);
}
function trim_param($param)
{
    $param['user_name'] = trim($param['user_name']);
    $param['password'] = trim($param['password']);
    return $param;
}
function validation_user($param)
{
    check_user_name($param['user_name']);
    check_password($param['password']);
}
function check_user_name($param)
{
    if (preg_match('/^\s*$/u', $param) === 1) {
        $_SESSION['err_msgs'][] = 'ユーザーネームが未入力または空白のみが入力されています';
    } elseif (preg_match('/^([a-zA-Z0-9]{6,})$/', $param) !== 1 && $param !== 'admin') {
        $_SESSION['err_msgs'][] = 'ユーザー名は半角英数字６文字以上で入力してください';
    }
}
function check_password($param)
{
    if (preg_match('/^\s*$/u', $param) === 1) {
        $_SESSION['err_msgs'][] = 'パスワードが未入力または空白のみが入力されています';
    } elseif (preg_match('/^([a-zA-Z0-9]{6,})$/', $param) !== 1 && $param !== 'admin') {
        $_SESSION['err_msgs'][] = 'パスワードは半角英数字６文字以上で入力してください';
    }
}
function check_user($link, $param)
{
    $sql = 'SELECT user_name FROM user WHERE user_name = \'' . $param['user_name'] . '\'';
    // クエリ実行
    $data = get_as_array($link, $sql);
    if (isset($data[0]['user_name'])) {
        $_SESSION['err_msgs'][] = '既に登録されているユーザーです';
    }
}
function regist_user($link, $param)
{
    $sql = 'INSERT INTO user(user_name,password,created_at) VALUES(\'' . $param['user_name'] . '\',\'' . $param['password'] . '\',\'' . date('y-m-d H:i:s') . '\')';
    if (mysqli_query($link, $sql) === FALSE) {
        $_SESSION['err_msgs'][] = 'ユーザーリストに追加できませんでした';
    }
}
function get_user_list($link)
{
    $sql = 'SELECT user_name,created_at FROM user';
    // クエリ実行
    return get_as_array($link, $sql);
}

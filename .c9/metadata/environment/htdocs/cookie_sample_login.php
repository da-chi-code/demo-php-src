{"filter":false,"title":"cookie_sample_login.php","tooltip":"/htdocs/cookie_sample_login.php","undoManager":{"mark":0,"position":0,"stack":[[{"start":{"row":0,"column":0},"end":{"row":25,"column":13},"action":"insert","lines":["<?php","// Cookieの仕組み理解を優先しているため、Modelへ処理を分離していません","//require_once '../include/conf/const.php';","//require_once '../include/model/function.php';","$now = time();","if (isset($_POST['cookie_check']) === TRUE) {","   $cookie_check = $_POST['cookie_check'];","} else {","   $cookie_check = '';","}","if (isset($_POST['user_name']) === TRUE) {","   $cookie_value = $_POST['user_name'];","} else {","   $cookie_value = '';","}","// Cookieを利用するか確認","if ($cookie_check === 'checked') {","   // Cookieへ保存","   setcookie('cookie_check', $cookie_check, $now + 60 * 60 * 24 * 365);","   setcookie('user_name'   , $cookie_value, $now + 60 * 60 * 24 * 365);","} else {","   // Cookieを削除","   setcookie('cookie_check', '', $now - 3600);","   setcookie('user_name'   , '', $now - 3600);","}","print 'ようこそ';"],"id":1}]]},"ace":{"folds":[],"scrolltop":78,"scrollleft":0,"selection":{"start":{"row":25,"column":13},"end":{"row":25,"column":13},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1598613965328,"hash":"0d8afb91ec7265d2c01b92bc3f3b63fe1cc28a49"}
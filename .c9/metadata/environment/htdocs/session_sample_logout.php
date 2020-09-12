{"filter":false,"title":"session_sample_logout.php","tooltip":"/htdocs/session_sample_logout.php","undoManager":{"mark":3,"position":3,"stack":[[{"start":{"row":0,"column":0},"end":{"row":32,"column":5},"action":"insert","lines":["<?php","/*","*  ログアウト処理","*","*  セッションの仕組み理解を優先しているため、一部処理はModelへ分離していません","*  また処理はセッション関連の最低限のみ行っており、本来必要な処理も省略しています","*/","require_once '../include/conf/const.php';","require_once '../include/model/function.php';","// セッション開始","session_start();","// セッション名取得 ※デフォルトはPHPSESSID","$session_name = session_name();","// セッション変数を全て削除","$_SESSION = [];"," ","// ユーザのCookieに保存されているセッションIDを削除","if (isset($_COOKIE[$session_name])) {","  // sessionに関連する設定を取得","  $params = session_get_cookie_params();"," ","  // sessionに利用しているクッキーの有効期限を過去に設定することで無効化","  setcookie($session_name, '', time() - 42000,","    $params[\"path\"], $params[\"domain\"],","    $params[\"secure\"], $params[\"httponly\"]","  );","}"," ","// セッションIDを無効化","session_destroy();","// ログアウトの処理が完了したらログインページへリダイレクト","header('Location: http://codecamp.lesson.codecamp.jp/session_sample_top.php');","exit;"],"id":1}],[{"start":{"row":31,"column":8},"end":{"row":31,"column":75},"action":"remove","lines":["Location: http://codecamp.lesson.codecamp.jp/session_sample_top.php"],"id":2},{"start":{"row":31,"column":8},"end":{"row":31,"column":61},"action":"insert","lines":["Location: http://include/view/session_sample_home.php"]}],[{"start":{"row":31,"column":23},"end":{"row":31,"column":24},"action":"remove","lines":["/"],"id":3},{"start":{"row":31,"column":22},"end":{"row":31,"column":23},"action":"remove","lines":[":"]},{"start":{"row":31,"column":21},"end":{"row":31,"column":22},"action":"remove","lines":["p"]},{"start":{"row":31,"column":20},"end":{"row":31,"column":21},"action":"remove","lines":["t"]},{"start":{"row":31,"column":19},"end":{"row":31,"column":20},"action":"remove","lines":["t"]},{"start":{"row":31,"column":18},"end":{"row":31,"column":19},"action":"remove","lines":["h"]},{"start":{"row":31,"column":17},"end":{"row":31,"column":18},"action":"remove","lines":[" "]}],[{"start":{"row":31,"column":17},"end":{"row":31,"column":18},"action":"insert","lines":[" "],"id":4},{"start":{"row":31,"column":18},"end":{"row":31,"column":19},"action":"insert","lines":["."]},{"start":{"row":31,"column":19},"end":{"row":31,"column":20},"action":"insert","lines":["."]}]]},"ace":{"folds":[],"scrolltop":322.5,"scrollleft":0,"selection":{"start":{"row":31,"column":20},"end":{"row":31,"column":20},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1598823095979,"hash":"1f6a3fa62ef8341469e3b09945a08f506b4e0664"}
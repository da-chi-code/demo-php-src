{"filter":false,"title":"ec_admin_user.php","tooltip":"/htdocs/ec_admin_user.php","undoManager":{"mark":85,"position":85,"stack":[[{"start":{"row":0,"column":0},"end":{"row":0,"column":1},"action":"insert","lines":["v"],"id":1}],[{"start":{"row":0,"column":0},"end":{"row":0,"column":1},"action":"remove","lines":["v"],"id":2}],[{"start":{"row":0,"column":0},"end":{"row":18,"column":9},"action":"insert","lines":["<!DOCTYPE html>","<html lang=\"ja\">","<head>","  <meta charset=\"utf-8\">","  <title>ユーザ管理ページ</title>","  <link type=\"text/css\" rel=\"stylesheet\" href=\"./css/admin.css\">","</head>","<body>","  <h1>CodeSHOP 管理ページ</h1>","  <div>","    <a class=\"nemu\" href=\"./logout.php\">ログアウト</a>","    <a href=\"./admin.php\">商品管理ページ</a>","  </div>","  <h2>ユーザ情報一覧</h2>","  <table>","    <tr>","      <th>ユーザID</th>","      <th>登録日</th>","    </tr>"],"id":3}],[{"start":{"row":5,"column":0},"end":{"row":6,"column":0},"action":"remove","lines":["  <link type=\"text/css\" rel=\"stylesheet\" href=\"./css/admin.css\">",""],"id":4}],[{"start":{"row":0,"column":0},"end":{"row":17,"column":9},"action":"remove","lines":["<!DOCTYPE html>","<html lang=\"ja\">","<head>","  <meta charset=\"utf-8\">","  <title>ユーザ管理ページ</title>","</head>","<body>","  <h1>CodeSHOP 管理ページ</h1>","  <div>","    <a class=\"nemu\" href=\"./logout.php\">ログアウト</a>","    <a href=\"./admin.php\">商品管理ページ</a>","  </div>","  <h2>ユーザ情報一覧</h2>","  <table>","    <tr>","      <th>ユーザID</th>","      <th>登録日</th>","    </tr>"],"id":5},{"start":{"row":0,"column":0},"end":{"row":44,"column":49},"action":"insert","lines":["<?php","$user_name = '';","$passwd = '';","//ログイン処理","//読み込み","require_once '../include/conf/ec_const.php';","require_once '../include/model/ec_function.php';","// リクエストメソッド確認","/*if (get_request_method() !== 'POST') {","    header('Location: ./ec_login.php');","    exit;","}*/","if(isset($_SESSION['user_id'])){","    redirect_home();","}","// セッション開始","if (get_request_method() === 'POST') {","    session_start();","    // POST値取得","    $user_name  = get_post_data('user_name');  // メールアドレス","    $passwd = get_post_data('password'); // パスワード","    // ユーザー名をCookieへ保存","    setcookie('user_name', $user_name, time() + 60 * 60 * 24 * 365);","    //管理者であれば商品管理ページにリダイレクトする","    admin_check($user_name, $passwd);","    // データベース接続","    $link = get_db_connect();","    // SQL実行し登録データを配列で取得","    $data = check_login_user($link, $sql);","    // データベース切断","    close_db_connect($link);","    // 登録データを取得できたか確認","    if (isset($data[0]['user_id'])) {","        // セッション変数にuser_idを保存","        $_SESSION['user_id'] = $data[0]['user_id'];","        // ログイン済みユーザのホームページへリダイレクト","        redirect_home();","    } else {","        // セッション変数にログインのエラーフラグを保存","        $_SESSION['login_err_flag'] = TRUE;","        // ログインページへリダイレクト","        redirect_login();","    }","}","include_once '../include/view/view_ec_login.php';"]}],[{"start":{"row":7,"column":0},"end":{"row":11,"column":3},"action":"remove","lines":["// リクエストメソッド確認","/*if (get_request_method() !== 'POST') {","    header('Location: ./ec_login.php');","    exit;","}*/"],"id":6},{"start":{"row":6,"column":48},"end":{"row":7,"column":0},"action":"remove","lines":["",""]}],[{"start":{"row":3,"column":0},"end":{"row":3,"column":8},"action":"remove","lines":["//ログイン処理"],"id":7},{"start":{"row":2,"column":13},"end":{"row":3,"column":0},"action":"remove","lines":["",""]},{"start":{"row":2,"column":12},"end":{"row":2,"column":13},"action":"remove","lines":[";"]},{"start":{"row":2,"column":11},"end":{"row":2,"column":12},"action":"remove","lines":["'"]},{"start":{"row":2,"column":10},"end":{"row":2,"column":11},"action":"remove","lines":["'"]},{"start":{"row":2,"column":9},"end":{"row":2,"column":10},"action":"remove","lines":[" "]},{"start":{"row":2,"column":8},"end":{"row":2,"column":9},"action":"remove","lines":["="]},{"start":{"row":2,"column":7},"end":{"row":2,"column":8},"action":"remove","lines":[" "]},{"start":{"row":2,"column":6},"end":{"row":2,"column":7},"action":"remove","lines":["d"]},{"start":{"row":2,"column":5},"end":{"row":2,"column":6},"action":"remove","lines":["w"]},{"start":{"row":2,"column":4},"end":{"row":2,"column":5},"action":"remove","lines":["s"]},{"start":{"row":2,"column":3},"end":{"row":2,"column":4},"action":"remove","lines":["s"]},{"start":{"row":2,"column":2},"end":{"row":2,"column":3},"action":"remove","lines":["a"]},{"start":{"row":2,"column":1},"end":{"row":2,"column":2},"action":"remove","lines":["p"]},{"start":{"row":2,"column":0},"end":{"row":2,"column":1},"action":"remove","lines":["$"]},{"start":{"row":1,"column":16},"end":{"row":2,"column":0},"action":"remove","lines":["",""]},{"start":{"row":1,"column":15},"end":{"row":1,"column":16},"action":"remove","lines":[";"]}],[{"start":{"row":1,"column":14},"end":{"row":1,"column":15},"action":"remove","lines":["'"],"id":8},{"start":{"row":1,"column":13},"end":{"row":1,"column":14},"action":"remove","lines":["'"]},{"start":{"row":1,"column":12},"end":{"row":1,"column":13},"action":"remove","lines":[" "]},{"start":{"row":1,"column":11},"end":{"row":1,"column":12},"action":"remove","lines":["="]},{"start":{"row":1,"column":10},"end":{"row":1,"column":11},"action":"remove","lines":[" "]},{"start":{"row":1,"column":9},"end":{"row":1,"column":10},"action":"remove","lines":["e"]},{"start":{"row":1,"column":8},"end":{"row":1,"column":9},"action":"remove","lines":["m"]},{"start":{"row":1,"column":7},"end":{"row":1,"column":8},"action":"remove","lines":["a"]},{"start":{"row":1,"column":6},"end":{"row":1,"column":7},"action":"remove","lines":["n"]},{"start":{"row":1,"column":5},"end":{"row":1,"column":6},"action":"remove","lines":["_"]},{"start":{"row":1,"column":4},"end":{"row":1,"column":5},"action":"remove","lines":["r"]},{"start":{"row":1,"column":3},"end":{"row":1,"column":4},"action":"remove","lines":["e"]},{"start":{"row":1,"column":2},"end":{"row":1,"column":3},"action":"remove","lines":["s"]},{"start":{"row":1,"column":1},"end":{"row":1,"column":2},"action":"remove","lines":["u"]},{"start":{"row":1,"column":0},"end":{"row":1,"column":1},"action":"remove","lines":["$"]},{"start":{"row":0,"column":5},"end":{"row":1,"column":0},"action":"remove","lines":["",""]}],[{"start":{"row":4,"column":0},"end":{"row":6,"column":1},"action":"remove","lines":["if(isset($_SESSION['user_id'])){","    redirect_home();","}"],"id":9},{"start":{"row":3,"column":48},"end":{"row":4,"column":0},"action":"remove","lines":["",""]}],[{"start":{"row":5,"column":0},"end":{"row":31,"column":5},"action":"remove","lines":["if (get_request_method() === 'POST') {","    session_start();","    // POST値取得","    $user_name  = get_post_data('user_name');  // メールアドレス","    $passwd = get_post_data('password'); // パスワード","    // ユーザー名をCookieへ保存","    setcookie('user_name', $user_name, time() + 60 * 60 * 24 * 365);","    //管理者であれば商品管理ページにリダイレクトする","    admin_check($user_name, $passwd);","    // データベース接続","    $link = get_db_connect();","    // SQL実行し登録データを配列で取得","    $data = check_login_user($link, $sql);","    // データベース切断","    close_db_connect($link);","    // 登録データを取得できたか確認","    if (isset($data[0]['user_id'])) {","        // セッション変数にuser_idを保存","        $_SESSION['user_id'] = $data[0]['user_id'];","        // ログイン済みユーザのホームページへリダイレクト","        redirect_home();","    } else {","        // セッション変数にログインのエラーフラグを保存","        $_SESSION['login_err_flag'] = TRUE;","        // ログインページへリダイレクト","        redirect_login();","    }"],"id":10}],[{"start":{"row":5,"column":0},"end":{"row":10,"column":0},"action":"insert","lines":["$drink_lists = [];","$link = get_db_connect();","$drink_lists = get_drink_list_status($link);","$drink_lists = entity_assoc_array($drink_lists);","close_db_connect($link);",""],"id":11}],[{"start":{"row":11,"column":0},"end":{"row":11,"column":1},"action":"remove","lines":["}"],"id":12},{"start":{"row":10,"column":0},"end":{"row":11,"column":0},"action":"remove","lines":["",""]},{"start":{"row":9,"column":24},"end":{"row":10,"column":0},"action":"remove","lines":["",""]}],[{"start":{"row":10,"column":42},"end":{"row":10,"column":43},"action":"remove","lines":["n"],"id":13},{"start":{"row":10,"column":41},"end":{"row":10,"column":42},"action":"remove","lines":["i"]},{"start":{"row":10,"column":40},"end":{"row":10,"column":41},"action":"remove","lines":["g"]},{"start":{"row":10,"column":39},"end":{"row":10,"column":40},"action":"remove","lines":["o"]},{"start":{"row":10,"column":38},"end":{"row":10,"column":39},"action":"remove","lines":["l"]}],[{"start":{"row":10,"column":38},"end":{"row":10,"column":39},"action":"insert","lines":["a"],"id":14},{"start":{"row":10,"column":39},"end":{"row":10,"column":40},"action":"insert","lines":["d"]},{"start":{"row":10,"column":40},"end":{"row":10,"column":41},"action":"insert","lines":["m"]},{"start":{"row":10,"column":41},"end":{"row":10,"column":42},"action":"insert","lines":["i"]},{"start":{"row":10,"column":42},"end":{"row":10,"column":43},"action":"insert","lines":["n"]}],[{"start":{"row":10,"column":43},"end":{"row":10,"column":44},"action":"insert","lines":["_"],"id":15},{"start":{"row":10,"column":44},"end":{"row":10,"column":45},"action":"insert","lines":["u"]},{"start":{"row":10,"column":45},"end":{"row":10,"column":46},"action":"insert","lines":["s"]},{"start":{"row":10,"column":46},"end":{"row":10,"column":47},"action":"insert","lines":["e"]},{"start":{"row":10,"column":47},"end":{"row":10,"column":48},"action":"insert","lines":["r"]}],[{"start":{"row":5,"column":5},"end":{"row":5,"column":6},"action":"remove","lines":["k"],"id":16},{"start":{"row":5,"column":4},"end":{"row":5,"column":5},"action":"remove","lines":["n"]},{"start":{"row":5,"column":3},"end":{"row":5,"column":4},"action":"remove","lines":["i"]},{"start":{"row":5,"column":2},"end":{"row":5,"column":3},"action":"remove","lines":["r"]},{"start":{"row":5,"column":1},"end":{"row":5,"column":2},"action":"remove","lines":["d"]}],[{"start":{"row":5,"column":1},"end":{"row":5,"column":2},"action":"insert","lines":["g"],"id":17},{"start":{"row":5,"column":2},"end":{"row":5,"column":3},"action":"insert","lines":["i"]}],[{"start":{"row":5,"column":2},"end":{"row":5,"column":3},"action":"remove","lines":["i"],"id":18}],[{"start":{"row":5,"column":2},"end":{"row":5,"column":3},"action":"insert","lines":["o"],"id":19},{"start":{"row":5,"column":3},"end":{"row":5,"column":4},"action":"insert","lines":["o"]},{"start":{"row":5,"column":4},"end":{"row":5,"column":5},"action":"insert","lines":["d"]},{"start":{"row":5,"column":5},"end":{"row":5,"column":6},"action":"insert","lines":["s"]}],[{"start":{"row":7,"column":5},"end":{"row":7,"column":6},"action":"remove","lines":["k"],"id":20},{"start":{"row":7,"column":4},"end":{"row":7,"column":5},"action":"remove","lines":["n"]},{"start":{"row":7,"column":3},"end":{"row":7,"column":4},"action":"remove","lines":["i"]},{"start":{"row":7,"column":2},"end":{"row":7,"column":3},"action":"remove","lines":["r"]},{"start":{"row":7,"column":1},"end":{"row":7,"column":2},"action":"remove","lines":["d"]}],[{"start":{"row":7,"column":1},"end":{"row":7,"column":2},"action":"insert","lines":["g"],"id":21},{"start":{"row":7,"column":2},"end":{"row":7,"column":3},"action":"insert","lines":["o"]},{"start":{"row":7,"column":3},"end":{"row":7,"column":4},"action":"insert","lines":["o"]},{"start":{"row":7,"column":4},"end":{"row":7,"column":5},"action":"insert","lines":["d"]},{"start":{"row":7,"column":5},"end":{"row":7,"column":6},"action":"insert","lines":["s"]}],[{"start":{"row":7,"column":0},"end":{"row":7,"column":12},"action":"remove","lines":["$goods_lists"],"id":22},{"start":{"row":7,"column":0},"end":{"row":7,"column":12},"action":"insert","lines":["$goods_lists"]}],[{"start":{"row":8,"column":5},"end":{"row":8,"column":6},"action":"remove","lines":["k"],"id":23},{"start":{"row":8,"column":4},"end":{"row":8,"column":5},"action":"remove","lines":["n"]},{"start":{"row":8,"column":3},"end":{"row":8,"column":4},"action":"remove","lines":["i"]},{"start":{"row":8,"column":2},"end":{"row":8,"column":3},"action":"remove","lines":["r"]},{"start":{"row":8,"column":1},"end":{"row":8,"column":2},"action":"remove","lines":["d"]}],[{"start":{"row":8,"column":1},"end":{"row":8,"column":2},"action":"insert","lines":["g"],"id":24},{"start":{"row":8,"column":2},"end":{"row":8,"column":3},"action":"insert","lines":["o"]},{"start":{"row":8,"column":3},"end":{"row":8,"column":4},"action":"insert","lines":["o"]},{"start":{"row":8,"column":4},"end":{"row":8,"column":5},"action":"insert","lines":["d"]},{"start":{"row":8,"column":5},"end":{"row":8,"column":6},"action":"insert","lines":["s"]}],[{"start":{"row":8,"column":0},"end":{"row":8,"column":12},"action":"remove","lines":["$goods_lists"],"id":25},{"start":{"row":8,"column":0},"end":{"row":8,"column":12},"action":"insert","lines":["$goods_lists"]}],[{"start":{"row":5,"column":5},"end":{"row":5,"column":6},"action":"remove","lines":["s"],"id":26},{"start":{"row":5,"column":4},"end":{"row":5,"column":5},"action":"remove","lines":["d"]},{"start":{"row":5,"column":3},"end":{"row":5,"column":4},"action":"remove","lines":["o"]},{"start":{"row":5,"column":2},"end":{"row":5,"column":3},"action":"remove","lines":["o"]},{"start":{"row":5,"column":1},"end":{"row":5,"column":2},"action":"remove","lines":["g"]}],[{"start":{"row":5,"column":1},"end":{"row":5,"column":2},"action":"insert","lines":["u"],"id":27},{"start":{"row":5,"column":2},"end":{"row":5,"column":3},"action":"insert","lines":["s"]},{"start":{"row":5,"column":3},"end":{"row":5,"column":4},"action":"insert","lines":["e"]},{"start":{"row":5,"column":4},"end":{"row":5,"column":5},"action":"insert","lines":["r"]}],[{"start":{"row":5,"column":10},"end":{"row":5,"column":11},"action":"remove","lines":["s"],"id":28}],[{"start":{"row":7,"column":5},"end":{"row":7,"column":6},"action":"remove","lines":["s"],"id":29},{"start":{"row":7,"column":4},"end":{"row":7,"column":5},"action":"remove","lines":["d"]},{"start":{"row":7,"column":3},"end":{"row":7,"column":4},"action":"remove","lines":["o"]},{"start":{"row":7,"column":2},"end":{"row":7,"column":3},"action":"remove","lines":["o"]},{"start":{"row":7,"column":1},"end":{"row":7,"column":2},"action":"remove","lines":["g"]}],[{"start":{"row":7,"column":1},"end":{"row":7,"column":2},"action":"insert","lines":["u"],"id":30},{"start":{"row":7,"column":2},"end":{"row":7,"column":3},"action":"insert","lines":["s"]},{"start":{"row":7,"column":3},"end":{"row":7,"column":4},"action":"insert","lines":["e"]},{"start":{"row":7,"column":4},"end":{"row":7,"column":5},"action":"insert","lines":["r"]}],[{"start":{"row":7,"column":10},"end":{"row":7,"column":11},"action":"remove","lines":["s"],"id":31}],[{"start":{"row":8,"column":5},"end":{"row":8,"column":6},"action":"remove","lines":["s"],"id":32},{"start":{"row":8,"column":4},"end":{"row":8,"column":5},"action":"remove","lines":["d"]},{"start":{"row":8,"column":3},"end":{"row":8,"column":4},"action":"remove","lines":["o"]},{"start":{"row":8,"column":2},"end":{"row":8,"column":3},"action":"remove","lines":["o"]},{"start":{"row":8,"column":1},"end":{"row":8,"column":2},"action":"remove","lines":["g"]}],[{"start":{"row":8,"column":1},"end":{"row":8,"column":2},"action":"insert","lines":["u"],"id":33},{"start":{"row":8,"column":2},"end":{"row":8,"column":3},"action":"insert","lines":["s"]},{"start":{"row":8,"column":3},"end":{"row":8,"column":4},"action":"insert","lines":["e"]},{"start":{"row":8,"column":4},"end":{"row":8,"column":5},"action":"insert","lines":["r"]}],[{"start":{"row":8,"column":10},"end":{"row":8,"column":11},"action":"remove","lines":["s"],"id":34}],[{"start":{"row":8,"column":10},"end":{"row":8,"column":11},"action":"insert","lines":["s"],"id":35}],[{"start":{"row":7,"column":10},"end":{"row":7,"column":11},"action":"insert","lines":["s"],"id":36}],[{"start":{"row":5,"column":10},"end":{"row":5,"column":11},"action":"insert","lines":["s"],"id":37}],[{"start":{"row":8,"column":38},"end":{"row":8,"column":39},"action":"remove","lines":["k"],"id":38},{"start":{"row":8,"column":37},"end":{"row":8,"column":38},"action":"remove","lines":["n"]},{"start":{"row":8,"column":36},"end":{"row":8,"column":37},"action":"remove","lines":["i"]},{"start":{"row":8,"column":35},"end":{"row":8,"column":36},"action":"remove","lines":["r"]},{"start":{"row":8,"column":34},"end":{"row":8,"column":35},"action":"remove","lines":["d"]}],[{"start":{"row":8,"column":34},"end":{"row":8,"column":35},"action":"insert","lines":["u"],"id":39},{"start":{"row":8,"column":35},"end":{"row":8,"column":36},"action":"insert","lines":["s"]},{"start":{"row":8,"column":36},"end":{"row":8,"column":37},"action":"insert","lines":["e"]},{"start":{"row":8,"column":37},"end":{"row":8,"column":38},"action":"insert","lines":["r"]}],[{"start":{"row":7,"column":22},"end":{"row":7,"column":23},"action":"remove","lines":["k"],"id":40},{"start":{"row":7,"column":21},"end":{"row":7,"column":22},"action":"remove","lines":["n"]},{"start":{"row":7,"column":20},"end":{"row":7,"column":21},"action":"remove","lines":["i"]},{"start":{"row":7,"column":19},"end":{"row":7,"column":20},"action":"remove","lines":["r"]},{"start":{"row":7,"column":18},"end":{"row":7,"column":19},"action":"remove","lines":["d"]}],[{"start":{"row":7,"column":18},"end":{"row":7,"column":19},"action":"insert","lines":["u"],"id":41},{"start":{"row":7,"column":19},"end":{"row":7,"column":20},"action":"insert","lines":["s"]},{"start":{"row":7,"column":20},"end":{"row":7,"column":21},"action":"insert","lines":["s"]},{"start":{"row":7,"column":21},"end":{"row":7,"column":22},"action":"insert","lines":["e"]},{"start":{"row":7,"column":22},"end":{"row":7,"column":23},"action":"insert","lines":["r"]}],[{"start":{"row":7,"column":22},"end":{"row":7,"column":23},"action":"remove","lines":["r"],"id":42},{"start":{"row":7,"column":21},"end":{"row":7,"column":22},"action":"remove","lines":["e"]},{"start":{"row":7,"column":20},"end":{"row":7,"column":21},"action":"remove","lines":["s"]}],[{"start":{"row":7,"column":20},"end":{"row":7,"column":21},"action":"insert","lines":["r"],"id":43}],[{"start":{"row":7,"column":32},"end":{"row":7,"column":33},"action":"remove","lines":["s"],"id":44},{"start":{"row":7,"column":31},"end":{"row":7,"column":32},"action":"remove","lines":["u"]},{"start":{"row":7,"column":30},"end":{"row":7,"column":31},"action":"remove","lines":["t"]},{"start":{"row":7,"column":29},"end":{"row":7,"column":30},"action":"remove","lines":["a"]},{"start":{"row":7,"column":28},"end":{"row":7,"column":29},"action":"remove","lines":["t"]},{"start":{"row":7,"column":27},"end":{"row":7,"column":28},"action":"remove","lines":["s"]},{"start":{"row":7,"column":26},"end":{"row":7,"column":27},"action":"remove","lines":["_"]}],[{"start":{"row":8,"column":0},"end":{"row":8,"column":46},"action":"remove","lines":["$user_lists = entity_assoc_array($user_lists);"],"id":45},{"start":{"row":7,"column":34},"end":{"row":8,"column":0},"action":"remove","lines":["",""]}],[{"start":{"row":7,"column":20},"end":{"row":7,"column":21},"action":"insert","lines":["e"],"id":46}],[{"start":{"row":6,"column":25},"end":{"row":7,"column":0},"action":"insert","lines":["",""],"id":47}],[{"start":{"row":7,"column":0},"end":{"row":7,"column":1},"action":"insert","lines":["i"],"id":48},{"start":{"row":7,"column":1},"end":{"row":7,"column":2},"action":"insert","lines":["g"]}],[{"start":{"row":7,"column":1},"end":{"row":7,"column":2},"action":"remove","lines":["g"],"id":49}],[{"start":{"row":7,"column":1},"end":{"row":7,"column":2},"action":"insert","lines":["f"],"id":50}],[{"start":{"row":7,"column":2},"end":{"row":7,"column":4},"action":"insert","lines":["()"],"id":51}],[{"start":{"row":7,"column":3},"end":{"row":7,"column":5},"action":"insert","lines":["{}"],"id":52}],[{"start":{"row":7,"column":4},"end":{"row":9,"column":0},"action":"insert","lines":["","    ",""],"id":53}],[{"start":{"row":9,"column":1},"end":{"row":9,"column":2},"action":"remove","lines":[")"],"id":54},{"start":{"row":9,"column":0},"end":{"row":9,"column":1},"action":"remove","lines":["}"]},{"start":{"row":8,"column":4},"end":{"row":9,"column":0},"action":"remove","lines":["",""]},{"start":{"row":8,"column":0},"end":{"row":8,"column":4},"action":"remove","lines":["    "]},{"start":{"row":7,"column":4},"end":{"row":8,"column":0},"action":"remove","lines":["",""]},{"start":{"row":7,"column":3},"end":{"row":7,"column":4},"action":"remove","lines":["{"]}],[{"start":{"row":7,"column":3},"end":{"row":7,"column":23},"action":"insert","lines":["get_user_list($link)"],"id":55}],[{"start":{"row":7,"column":23},"end":{"row":7,"column":24},"action":"insert","lines":["="],"id":56},{"start":{"row":7,"column":24},"end":{"row":7,"column":25},"action":"insert","lines":["="]},{"start":{"row":7,"column":25},"end":{"row":7,"column":26},"action":"insert","lines":["="]}],[{"start":{"row":7,"column":25},"end":{"row":7,"column":26},"action":"remove","lines":["="],"id":57},{"start":{"row":7,"column":24},"end":{"row":7,"column":25},"action":"remove","lines":["="]},{"start":{"row":7,"column":23},"end":{"row":7,"column":24},"action":"remove","lines":["="]}],[{"start":{"row":7,"column":3},"end":{"row":7,"column":4},"action":"insert","lines":["i"],"id":58},{"start":{"row":7,"column":4},"end":{"row":7,"column":5},"action":"insert","lines":["s"]},{"start":{"row":7,"column":5},"end":{"row":7,"column":6},"action":"insert","lines":["_"]},{"start":{"row":7,"column":6},"end":{"row":7,"column":7},"action":"insert","lines":["a"]}],[{"start":{"row":7,"column":7},"end":{"row":7,"column":8},"action":"insert","lines":["r"],"id":59},{"start":{"row":7,"column":8},"end":{"row":7,"column":9},"action":"insert","lines":["r"]},{"start":{"row":7,"column":9},"end":{"row":7,"column":10},"action":"insert","lines":["a"]},{"start":{"row":7,"column":10},"end":{"row":7,"column":11},"action":"insert","lines":["y"]}],[{"start":{"row":7,"column":11},"end":{"row":7,"column":12},"action":"insert","lines":[")"],"id":60}],[{"start":{"row":7,"column":11},"end":{"row":7,"column":12},"action":"remove","lines":[")"],"id":61}],[{"start":{"row":7,"column":11},"end":{"row":7,"column":12},"action":"insert","lines":["("],"id":62}],[{"start":{"row":7,"column":32},"end":{"row":7,"column":33},"action":"insert","lines":[")"],"id":63},{"start":{"row":7,"column":33},"end":{"row":7,"column":34},"action":"insert","lines":["{"]},{"start":{"row":7,"column":34},"end":{"row":7,"column":35},"action":"insert","lines":["}"]}],[{"start":{"row":7,"column":34},"end":{"row":9,"column":0},"action":"insert","lines":["","    ",""],"id":64}],[{"start":{"row":7,"column":33},"end":{"row":7,"column":34},"action":"insert","lines":[")"],"id":65}],[{"start":{"row":8,"column":0},"end":{"row":8,"column":1},"action":"remove","lines":[" "],"id":66}],[{"start":{"row":8,"column":0},"end":{"row":8,"column":4},"action":"insert","lines":["    "],"id":67}],[{"start":{"row":8,"column":4},"end":{"row":8,"column":39},"action":"insert","lines":["$user_lists = get_user_list($link);"],"id":68}],[{"start":{"row":10,"column":10},"end":{"row":10,"column":11},"action":"remove","lines":["s"],"id":69},{"start":{"row":10,"column":9},"end":{"row":10,"column":10},"action":"remove","lines":["t"]},{"start":{"row":10,"column":8},"end":{"row":10,"column":9},"action":"remove","lines":["s"]},{"start":{"row":10,"column":7},"end":{"row":10,"column":8},"action":"remove","lines":["i"]},{"start":{"row":10,"column":6},"end":{"row":10,"column":7},"action":"remove","lines":["l"]},{"start":{"row":10,"column":5},"end":{"row":10,"column":6},"action":"remove","lines":["_"]},{"start":{"row":10,"column":4},"end":{"row":10,"column":5},"action":"remove","lines":["r"]},{"start":{"row":10,"column":3},"end":{"row":10,"column":4},"action":"remove","lines":["e"]},{"start":{"row":10,"column":2},"end":{"row":10,"column":3},"action":"remove","lines":["s"]},{"start":{"row":10,"column":1},"end":{"row":10,"column":2},"action":"remove","lines":["u"]}],[{"start":{"row":10,"column":1},"end":{"row":10,"column":2},"action":"insert","lines":["e"],"id":70},{"start":{"row":10,"column":2},"end":{"row":10,"column":3},"action":"insert","lines":["r"]},{"start":{"row":10,"column":3},"end":{"row":10,"column":4},"action":"insert","lines":["r"]},{"start":{"row":10,"column":4},"end":{"row":10,"column":5},"action":"insert","lines":["e"]}],[{"start":{"row":10,"column":4},"end":{"row":10,"column":5},"action":"remove","lines":["e"],"id":71}],[{"start":{"row":10,"column":4},"end":{"row":10,"column":5},"action":"insert","lines":["r"],"id":72}],[{"start":{"row":10,"column":4},"end":{"row":10,"column":5},"action":"remove","lines":["r"],"id":73}],[{"start":{"row":10,"column":4},"end":{"row":10,"column":5},"action":"insert","lines":["_"],"id":74},{"start":{"row":10,"column":5},"end":{"row":10,"column":6},"action":"insert","lines":["m"]},{"start":{"row":10,"column":6},"end":{"row":10,"column":7},"action":"insert","lines":["s"]},{"start":{"row":10,"column":7},"end":{"row":10,"column":8},"action":"insert","lines":["g"]}],[{"start":{"row":5,"column":17},"end":{"row":6,"column":0},"action":"insert","lines":["",""],"id":75}],[{"start":{"row":4,"column":9},"end":{"row":4,"column":10},"action":"remove","lines":["始"],"id":76},{"start":{"row":4,"column":8},"end":{"row":4,"column":9},"action":"remove","lines":["開"]},{"start":{"row":4,"column":7},"end":{"row":4,"column":8},"action":"remove","lines":["ン"]},{"start":{"row":4,"column":6},"end":{"row":4,"column":7},"action":"remove","lines":["ョ"]},{"start":{"row":4,"column":5},"end":{"row":4,"column":6},"action":"remove","lines":["シ"]},{"start":{"row":4,"column":4},"end":{"row":4,"column":5},"action":"remove","lines":["ッ"]},{"start":{"row":4,"column":3},"end":{"row":4,"column":4},"action":"remove","lines":["セ"]},{"start":{"row":4,"column":2},"end":{"row":4,"column":3},"action":"remove","lines":[" "]},{"start":{"row":4,"column":1},"end":{"row":4,"column":2},"action":"remove","lines":["/"]},{"start":{"row":4,"column":0},"end":{"row":4,"column":1},"action":"remove","lines":["/"]},{"start":{"row":3,"column":48},"end":{"row":4,"column":0},"action":"remove","lines":["",""]}],[{"start":{"row":3,"column":48},"end":{"row":4,"column":0},"action":"insert","lines":["",""],"id":77},{"start":{"row":4,"column":0},"end":{"row":4,"column":1},"action":"insert","lines":["$"]},{"start":{"row":4,"column":1},"end":{"row":4,"column":2},"action":"insert","lines":["e"]},{"start":{"row":4,"column":2},"end":{"row":4,"column":3},"action":"insert","lines":["r"]},{"start":{"row":4,"column":3},"end":{"row":4,"column":4},"action":"insert","lines":["r"]}],[{"start":{"row":4,"column":0},"end":{"row":4,"column":4},"action":"remove","lines":["$err"],"id":78},{"start":{"row":4,"column":0},"end":{"row":4,"column":8},"action":"insert","lines":["$err_msg"]}],[{"start":{"row":4,"column":7},"end":{"row":4,"column":8},"action":"remove","lines":["g"],"id":79},{"start":{"row":4,"column":6},"end":{"row":4,"column":7},"action":"remove","lines":["s"]},{"start":{"row":4,"column":5},"end":{"row":4,"column":6},"action":"remove","lines":["m"]},{"start":{"row":4,"column":4},"end":{"row":4,"column":5},"action":"remove","lines":["_"]},{"start":{"row":4,"column":3},"end":{"row":4,"column":4},"action":"remove","lines":["r"]},{"start":{"row":4,"column":2},"end":{"row":4,"column":3},"action":"remove","lines":["r"]},{"start":{"row":4,"column":1},"end":{"row":4,"column":2},"action":"remove","lines":["e"]},{"start":{"row":4,"column":0},"end":{"row":4,"column":1},"action":"remove","lines":["$"]},{"start":{"row":3,"column":48},"end":{"row":4,"column":0},"action":"remove","lines":["",""]}],[{"start":{"row":5,"column":0},"end":{"row":5,"column":1},"action":"insert","lines":["$"],"id":80},{"start":{"row":5,"column":1},"end":{"row":5,"column":2},"action":"insert","lines":["e"]},{"start":{"row":5,"column":2},"end":{"row":5,"column":3},"action":"insert","lines":["r"]},{"start":{"row":5,"column":3},"end":{"row":5,"column":4},"action":"insert","lines":["r"]},{"start":{"row":5,"column":4},"end":{"row":5,"column":5},"action":"insert","lines":["_"]},{"start":{"row":5,"column":5},"end":{"row":5,"column":6},"action":"insert","lines":["m"]},{"start":{"row":5,"column":6},"end":{"row":5,"column":7},"action":"insert","lines":["a"]}],[{"start":{"row":5,"column":6},"end":{"row":5,"column":7},"action":"remove","lines":["a"],"id":81}],[{"start":{"row":5,"column":6},"end":{"row":5,"column":7},"action":"insert","lines":["s"],"id":82},{"start":{"row":5,"column":7},"end":{"row":5,"column":8},"action":"insert","lines":["g"]}],[{"start":{"row":5,"column":8},"end":{"row":5,"column":9},"action":"insert","lines":[" "],"id":83},{"start":{"row":5,"column":9},"end":{"row":5,"column":10},"action":"insert","lines":["="]}],[{"start":{"row":5,"column":10},"end":{"row":5,"column":11},"action":"insert","lines":[" "],"id":84}],[{"start":{"row":5,"column":11},"end":{"row":5,"column":13},"action":"insert","lines":["''"],"id":85}],[{"start":{"row":5,"column":13},"end":{"row":5,"column":14},"action":"insert","lines":[";"],"id":86}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":5,"column":14},"end":{"row":5,"column":14},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1599894853576,"hash":"d0e0552b3b5685482db1fea20a2416223d4819cd"}
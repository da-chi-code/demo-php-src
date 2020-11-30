<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>ユーザ登録ページ</title>
    <link type="text/css" rel="stylesheet" href="./css/common.css">
</head>

<body>
    <header>
        <div class="header-box">
            <a href="./ec_top.php">
                <img class="logo" src="./images/logo.png" alt="CodeSHOP">
            </a>
            <a href="./ec_cart.php" class="cart"></a>
        </div>
    </header>
    <?php if ($message !== '') { ?>
        <p><?php print $message ?></p>
    <?php } ?>
    <?php //エラーメッセージ表示
    foreach ($err_msgs as $err_msg) { ?>
        <p><?php print $err_msg; ?></p>
    <?php } ?>
    <div class="content">
        <div class="register">
            <form method="post" action="./ec_register.php">
                <div>ユーザー名：<input type="text" name="user_name" placeholder="ユーザー名"></div>
                <div>パスワード：<input type="password" name="password" placeholder="パスワード">
                    <div><input type="submit" value="ユーザーを新規作成する">
            </form>
            <div class="login-link"><a href="./ec_login.php">ログインページに移動する</a></div>
        </div>
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>ログインページ</title>
</head>

<body>
    <header>
        <div class="header-box">
            <a href="./top.php">
                <img class="logo" src="./images/logo.png" alt="CodeSHOP">
            </a>
            <a href="./cart.php" class="cart"></a>
        </div>
    </header>
    <div class="content">
        <div class="login">
            <form method="post" action="./login.php">
                <div><input type="text" name="user_name" placeholder="ユーザー名"></div>
                <div><input type="password" name="password" placeholder="パスワード">
                    <div><input type="submit" value="ログイン">
            </form>
            <div class="account-create">
                <a href="./register.php">ユーザーの新規作成</a>
            </div>
        </div>
    </div>
</body>

</html>
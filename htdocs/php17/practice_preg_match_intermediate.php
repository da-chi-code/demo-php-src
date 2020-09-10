<?php
$mail ='';
$passwd ='';
$error = []; 
$regexp_mail   = '|^[0-9a-z_./?-]+@([0-9a-z-]+\.)+[0-9a-z-]+$|'; // メールアドレスの正規表現を入力
$regexp_passwd   = '/^[a-zA-z0-9]{6,18}/'; // パスワードの正規表現を入力
$success_massage = '$/\.(jpg|png)/';
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    if (isset($_POST['mail']) === TRUE){
    $mail = $_POST['mail'];
    }
    if (isset($_POST['passwd']) === TRUE){
        $passwd = $_POST['passwd'];
    }
    if (empty($mail) === TRUE) {
        $error[] = 'メールアドレスが未入力です';
    }
    elseif (preg_match($regexp_mail,$mail) !== 1) {
        $error[] = 'メールアドレスの形式が正しくありません';
    }
    if (empty($passwd) === TRUE) {
        $error[] = 'パスワードが未入力です';
    }
    elseif (preg_match($regexp_passwd,$passwd) !== 1) {
        $error[] = 'パスワードは半角英数記号6文字以上18文字以下で入力してください';
    }
    if(count($error) === 0){
        $success_massage = '登録完了';
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
   <meta charset="UTF-8">
   <title>正規表現課題</title>
   <style>
        .block {
            display: block;
            margin-bottom: 10px;
        }
   </style>
</head>
<body>
<?php if($success_massage === '登録完了'){?>
        <p><?php print $success_massage; ?></p>
<?php } else {?>
    <form method="post">
        <label for="mail">メールアドレス</label>
        <input type="text" class="block" id="mail" name="mail" value="">
        <label for="passwd">パスワード</label>
        <input type="password" class="block" id="passwd" name="passwd" value="">
        <p>メールアドレスを入力してください</p>
        <button type="submit">登録</button>
    </form>
<?php } ?>
    <ul>
    <?php foreach ($error as $message) { ?>
            <li><?php print $message;?></li>
    <?php } ?>
    </ul>
</body>
</html>
<a href=<?php print'/php17/practice_post_code_advanced.php?pref=\''.$pref.'\'&address=\''.$address.'\'&search_method=address&page_id='.($now - 1)?>>前のページ</a>
<a href=<?php print'/php17/practice_post_code_advanced.php?pref=\''.$pref.'\'&address=\''.$address.'\'&search_method=address&page_id='.($now + 1)?>>次のページ</a>
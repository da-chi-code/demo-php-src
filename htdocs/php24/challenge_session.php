<pre>
<?php
session_start();
if (isset($_SESSION['count']) === TRUE) {
    $_SESSION['count'] ++;
} else {
    $_SESSION['count'] = 1;
}
if (isset($_SESSION['date']) === TRUE) {
    $date = $_SESSION['date'];
    $_SESSION['date'] = date('Y年m月d日 H時i分s秒');
} else {
    $_SESSION['date'] = date('Y年m月d日 H時i分s秒');
}
if (isset($_POST['delete']) === TRUE){
    if (isset($_COOKIE['PHPSESSID'])) {
        setcookie('PHPSESSID', '', time() - 1800, '/');
    }
    session_destroy();
}
?>
</pre>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>課題（SESSION）</title>
</head>
<body>
<?php if($_SESSION['count'] === 1){ 
    print '<p>初めての訪問です</p>';
    print '<p>'.$_SESSION['date'].'（現在日時）</p>';
}
else{
    print '<p>'.$_SESSION['count'] . '回目の訪問です</p>';
    print '<p>'.$_SESSION['date'].'（現在日時）</p>';
    print '<p>'.$date.'（前回のアクセス日時）</p>';
}?>
    <form method="post">
         <input type = 'submit' value ='履歴削除'>
         <input type= 'hidden' name='delete' value='delete'>
    </form>
</body>
</html>

<?php
if (isset($_COOKIE['visited']) === TRUE) {
    $count = $_COOKIE['visited'] + 1;
} else {
    $count = 1;
}
setcookie('visited', $count, time() + 60 * 60 * 24 * 365);
if (isset($_COOKIE['date']) === TRUE) {
    $date = $_COOKIE['date'];
    $new_date = date('Y年m月d日 H時i分s秒');
} else {
    $new_date = date('Y年m月d日 H時i分s秒');
}
setcookie('date', $new_date, time() + 60 * 60 * 24 * 365);
if (isset($_POST['delete']) === TRUE){
    setcookie('visited',$count, time() - 3600);
    setcookie('visited',$new_date, time() - 3600);
    
    header('Location: challenge_cookie.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>課題（COOKIE）</title>
</head>
<body>
<?php if($count === 1){ 
    print '<p>初めての訪問です</p>';
    print '<p>'.$new_date.'（現在日時）</p>';
}
else{
    print '<p>'.$count . '回目の訪問です</p>';
    print '<p>'.$new_date.'（現在日時）</p>';
    print '<p>'.$date.'（前回のアクセス日時）</p>';
}?>
    <form method="post">
         <input type = 'submit' value ='履歴削除'>
         <input type= 'hidden' name='delete' value='delete'>
    </form>
</body>
</html>
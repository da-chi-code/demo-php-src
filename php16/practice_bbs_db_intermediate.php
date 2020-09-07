<?php
date_default_timezone_set('Asia/Tokyo');
$date = date('-y-m-d H:i:s');
$host = 'localhost'; // データベースのホスト名又はIPアドレス ※CodeCampでは「localhost」で接続できます
$username = 'codecamp33848';  // MySQLのパスワード
$passwd   = 'codecamp33848';    // MySQLのパスワード
$dbname   = 'codecamp33848';    // データベース名
$link = mysqli_connect($host, $username, $passwd, $dbname);
$name = '';
$comment = '';
$comment_log = [];
$error = []; 
if (isset($_POST['user_name']) === TRUE){
    $name = $_POST['user_name'];
}
if (isset($_POST['user_comment']) === TRUE){
    $comment = $_POST['user_comment'];
}
if($link){
    mysqli_set_charset($link, 'utf8');
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        if (empty($name) === TRUE) {
            $error[] = '名前が未入力です';
        }
        if (mb_strlen($name) > 20) {
            $error[] = '名前は２０文字以内で入力してください';
        }
        if (empty($comment) === TRUE) {
            $error[] = 'ひとことが未入力です';
        }
        if (mb_strlen($comment) > 100) {
            $error[] = 'ひとことは１００文字以内で入力してください';
        }
        if (count($error) === 0){
            $query = 'INSERT INTO comment_log(comment_name,comment,comment_time) VALUES(\''.$name.':\',\''.$comment.'\',\''.$date.'\')';
            if(mysqli_query($link, $query)===false){
                $error[]='入力できませんでした';
            }
        }
    }
        $query = 'SELECT comment_name,comment,comment_time FROM comment_log ORDER BY comment_id desc';
        $result = mysqli_query($link, $query);
        while ($row = mysqli_fetch_array($result)) {
            $comment_log[] = $row;
        }
        mysqli_free_result($result);
        mysqli_close($link);
} 
else {
   print 'DB接続失敗';
}        
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ひとこと掲示板</title>
</head>
<body>
    <h1>ひとこと掲示板</h1>
    <ul>
    <?php foreach ($error as $message) { ?>
            <li><?php print $message;?></li>
    <?php } ?>
    </ul>
    <form action="practice_bbs_db_intermediate.php" method="post">
        名前：<input type="text" name="user_name">
        ひとこと：<input type="text" name="user_comment" size="60">
        <input type="submit" name="submit" value="送信">
    </form>
    <ul>
    <?php 
    foreach ($comment_log as $read) { ?>
            <li><?php print htmlspecialchars($read['comment_name'], ENT_QUOTES, 'UTF-8'); 
            print htmlspecialchars($read['comment'], ENT_QUOTES, 'UTF-8'); 
            print htmlspecialchars($read['comment_time'], ENT_QUOTES, 'UTF-8'); 
            ?>
            </li>
    <?php } ?>
    </ul>
</body>
</html>
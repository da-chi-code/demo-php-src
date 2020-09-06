<?php
date_default_timezone_set('Asia/Tokyo');
$filename = 'bbs_log.txt';
$log = '';
$name = '';
$comment = '';
$error = []; 
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    if (isset($_POST['user_name']) === TRUE){
        $name = $_POST['user_name'];
    }
    if (isset($_POST['user_comment']) === TRUE){
        $comment = $_POST['user_comment'];
    }
    $name = str_replace(array(" ", "　"), "", $name);
    $comment = str_replace(array(" ", "　"), "", $comment);
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
        $log = $name . ':' . "\t" .$comment . "\t" . date('-y-m-d H:i:s');
        if (($fp = fopen($filename, 'a')) !== FALSE) {
            if (fwrite($fp, $log . "\n") === FALSE) {
                $error[] =  'ファイル書き込み失敗:  ' . $filename;
            }
            fclose($fp);
        }
    }
}
$data = [];
$display = []; 
if (is_readable($filename) === TRUE) {
    if (($fp = fopen($filename, 'r')) !== FALSE) {
        while (($tmp = fgets($fp)) !== FALSE) {
            $data[] = htmlspecialchars($tmp, ENT_QUOTES, 'UTF-8');
        }
        $display = array_reverse($data);
        fclose($fp);
    }
} else {
    $data[] = 'ファイルがありません';
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
    <form action="bbs.php" method="post">
        名前：<input type="text" name="user_name">
        ひとこと：<input type="text" name="user_comment" size="60">
        <input type="submit" name="submit" value="送信">
    </form>
    <ul>
    <?php foreach ($display as $read) { ?>
            <li><?php print $read;?></li>
    <?php } ?>
    </ul>
</body>
</html>
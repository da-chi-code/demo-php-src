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
    <form method="post">
        名前：<input type="text" name="user_name">
        ひとこと：<input type="text" name="user_comment" size="60">
        <input type="submit" name="submit" value="送信">
    </form>
    <ul>
    <?php 
    foreach ($comment_log as $read) { ?>
            <li><?php print $read['comment_name']; 
            print $read['comment']; 
            print $read['comment_time']; 
            ?>
            </li>
    <?php } ?>
    </ul>
</body>
</html>
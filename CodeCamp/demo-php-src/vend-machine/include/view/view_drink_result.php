<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>自動販売機結果</title>
</head>
<body>
    <h1>自動販売機結果</h1>
<?php foreach ($err_msgs as $err_msg) { ?>
        <p><?php print $err_msg;?></p>
<?php } ?>
<?php if(count($err_msgs) === 0){?>
        <img src=<?php print '../drink/image/'.str_replace(' ','',str_replace('-','',str_replace(':','',$drink_lists['create_at']))).$drink_lists['display'];?>>
        <p>がしゃん！【<?php print $drink_lists['drink_name']?>】が買えました！</p>
        <p>おつりは【<?php print $change?>円】です</p>
<?php }?>
    <footer><a href="index.php">戻る</a></footer>
</body>
</html>
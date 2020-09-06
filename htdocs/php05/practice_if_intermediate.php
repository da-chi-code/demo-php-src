<?php
// 現在時刻の秒のみ取得
$date = date('s');
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>課題（中級）</title>
</head>
<body>
<?php if ($date === '00') { ?>
    <p>ジャストタイム！！</p>
<?php } elseif ($date % 11 === 0) { ?>
    <p>ゾロ目！</p>
<?php } else{ ?>
    <p>外れ</p>
<?php } ?>
    <p>アクセスした瞬間の秒は<?php print $date; ?>でした</p>
</body>
</html>
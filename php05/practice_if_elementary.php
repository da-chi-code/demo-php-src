<?php
// 0〜2の値をランダムに２つ取得
$rand1 = mt_rand(0, 2);
$rand2 = mt_rand(0, 2);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>課題（初級）</title>
</head>
<body>
    <p>rand1：<?php print $rand1; ?></p>
    <p>rand2：<?php print $rand2; ?></p>
<?php if ($rand1 > $rand2) { ?>
    <p>rand1のほうが大きい値です</p>
<?php } elseif ($rand1 < $rand2) { ?>
    <p>rand2のほうが大きい値です</p>
<?php } else{ ?>
    <p>２つは同じ値です</p>
<?php } ?>
</body>
</html>
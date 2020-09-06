<?php
$rand = mt_rand(1, 6); // １〜６の値をランダムに取得
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>課題</title>
</head>
<body>
    <h1>サイコロ</h1>
    <p>値は：<?php print $rand; ?></p>
<?php if ($rand % 2 === 0) { ?>
    <h2>偶数です。</h2>
<?php } else { ?>
    <h2>奇数です。</h2>
<?php } ?>
</body>
</html>
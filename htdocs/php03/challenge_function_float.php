<?php
// $valueの値を定義
$value = 55.5555;
 
// 小数切り捨て値の処理を記述
$floor_value = floor($value);
 
// 小数切り上げの処理を記述
$ceil_value = ceil($value);
 
// 小数四捨五入の処理を記述
$round_value = round($value);
 
// 小数第二位で四捨五入の処理を記述
$round_value_second = round($value,2); 
 
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>課題</title>
</head>
<body>
    <p>元の値: <?php print $value ?></p>
    <p>小数切り捨て: <?php print $floor_value ?></p>
    <p>小数切り上げ: <?php print $ceil_value ?></p>
    <p>小数四捨五入: <?php print $round_value ?></p>
    <p>小数第二位で四捨五入: <?php print $round_value_second ?></p>
</body>
</html>
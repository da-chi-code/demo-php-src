<?php
$hp = 100;
?>
<!DOCTYPE html>
<html lang="ja">
<head>
   <meta charset="UTF-8">
   <title>演算子課題</title>
</head>
<body>
<?php
$int1 = 7 + 7;
$int2 = 7 + 7 / 7;
$int3 = 7 + (7 / 7);
$int4 = (7 + 7) / 7;
$int5 = 7 + 7 / 7 + 7;
$int6 = (7 + 7) / 7 + 7;
$int7 = (7 + 7) / (7 + 7);
$int8 = 7 + 7 * 7 / 7 + 7;
$int9 = 7 + (7 + 7 * 7 / 7 + 7);
?>
<p><?php print $int1 ?></p>
<p><?php print $int2 ?></p>
<p><?php print $int3 ?></p>
<p><?php print $int4 ?></p>
<p><?php print $int5 ?></p>
<p><?php print $int6 ?></p>
<p><?php print $int7 ?></p>
<p><?php print $int8 ?></p>
<p><?php print $int9 ?></p>
</body>
</html>
{"filter":false,"title":"mb_strlen.php","tooltip":"/htdocs/php03/mb_strlen.php","undoManager":{"mark":5,"position":5,"stack":[[{"start":{"row":0,"column":0},"end":{"row":21,"column":7},"action":"insert","lines":["<?php"," ","// この変数に調べたい文字を入れる","$str = 'この変数に文字列の長さを調べたい文字を自由に入力してください';"," ","$length = mb_strlen($str);"," ","$str = htmlspecialchars($str, ENT_QUOTES, 'UTF-8');","$length = htmlspecialchars($length, ENT_QUOTES, 'UTF-8');"," ","?>","<!DOCTYPE html>","<html lang=\"ja\">","<head>","   <meta charset=\"UTF-8\">","   <title>mb_strlen</title>","</head>","<body>","   <p>この文字列の長さは「<?php print $length; ?>」文字です。</p>","   <p><?php print $str; ?></p>","</body>","</html>"],"id":1}],[{"start":{"row":3,"column":8},"end":{"row":3,"column":37},"action":"remove","lines":["この変数に文字列の長さを調べたい文字を自由に入力してくださ"],"id":2}],[{"start":{"row":3,"column":8},"end":{"row":3,"column":9},"action":"remove","lines":["い"],"id":3}],[{"start":{"row":3,"column":8},"end":{"row":3,"column":9},"action":"insert","lines":["t"],"id":4},{"start":{"row":3,"column":9},"end":{"row":3,"column":10},"action":"insert","lines":["a"]},{"start":{"row":3,"column":10},"end":{"row":3,"column":11},"action":"insert","lines":["i"]},{"start":{"row":3,"column":11},"end":{"row":3,"column":12},"action":"insert","lines":["t"]},{"start":{"row":3,"column":12},"end":{"row":3,"column":13},"action":"insert","lines":["i"]}],[{"start":{"row":3,"column":12},"end":{"row":3,"column":13},"action":"remove","lines":["i"],"id":5},{"start":{"row":3,"column":11},"end":{"row":3,"column":12},"action":"remove","lines":["t"]},{"start":{"row":3,"column":10},"end":{"row":3,"column":11},"action":"remove","lines":["i"]},{"start":{"row":3,"column":9},"end":{"row":3,"column":10},"action":"remove","lines":["a"]},{"start":{"row":3,"column":8},"end":{"row":3,"column":9},"action":"remove","lines":["t"]}],[{"start":{"row":3,"column":8},"end":{"row":3,"column":10},"action":"insert","lines":["太一"],"id":6}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":3,"column":10},"end":{"row":3,"column":10},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1593410800621,"hash":"5aafe5b2673c01023477d504731692dc469540dd"}
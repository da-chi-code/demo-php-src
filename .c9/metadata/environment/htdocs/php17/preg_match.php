{"filter":false,"title":"preg_match.php","tooltip":"/htdocs/php17/preg_match.php","ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":29,"column":7},"end":{"row":29,"column":7},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":5,"state":"php-start","mode":"ace/mode/php"}},"hash":"c999e055e4ede9cbc2c4ec9835c3cd5bdadaeae2","undoManager":{"mark":0,"position":0,"stack":[[{"start":{"row":0,"column":0},"end":{"row":29,"column":7},"action":"insert","lines":["<?php","$message = NULL;","if (isset($_POST['phone_number']) === TRUE) {","   $phone_number = $_POST['phone_number'];","   if (mb_strlen($phone_number) === 0) {","       $message =  '携帯電話番号を入力してください。';","   } else if (preg_match('/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/', $phone_number) !== 1) {","       $message = '形式が違います。xxx-xxxx-xxxxの形式の数値で入力してください';","   } else {","       $message = 'あなたの携帯電話番号は「' . htmlspecialchars($phone_number, ENT_QUOTES, 'UTF-8') . '」です';","   }","}","?>","<!DOCTYPE HTML>","<html lang=\"ja\">","<head>","   <meta charset=\"UTF-8\">","   <title>正規表現</title>","</head>","<body>","<form method=\"post\">","   <label for=\"phone_number\">携帯電話番号(xxx-xxxx-xxxx)：</label>","   <input id=\"phone_number\" type=\"text\" name=\"phone_number\" value=\"<?php if (isset($phone_number) === TRUE) { print $phone_number; }?>\">","   <input type=\"submit\" value=\"送信\">","</form>","<?php if ($message !== NULL) { ?>","   <p><?php print $message;?></p>","<?php } ?>","</body>","</html>"],"id":1}]]},"timestamp":1595192525453}
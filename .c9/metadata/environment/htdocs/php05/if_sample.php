{"filter":false,"title":"if_sample.php","tooltip":"/htdocs/php05/if_sample.php","ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":7,"column":25},"end":{"row":7,"column":25},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"hash":"17766a60923c5b3f6025abcd46c10b84a852df91","undoManager":{"mark":3,"position":3,"stack":[[{"start":{"row":0,"column":0},"end":{"row":23,"column":7},"action":"insert","lines":["<?php","$rand = mt_rand(1, 10); // １〜１０の値をランダムに取得","?>","<!DOCTYPE html>","<html lang=\"ja\">","<head>","    <meta charset=\"UTF-8\">","    <title>ifの使用例</title>","    <style type=\"text/css\">","        .em_red {","            color: #FF0000;","        }","    </style>","</head>","<body>","    <h1>抽選システム</h1>","    <p>値は：<?php print $rand; ?></p>","<?php if ($rand <= 3) { ?>","    <h2 class=\"em_red\">当たり！！</h2>","<?php } else { ?>","    <h2>残念でした・・また引いてね</h2>","<?php } ?>","</body>","</html>"],"id":1}],[{"start":{"row":9,"column":0},"end":{"row":12,"column":12},"action":"remove","lines":["        .em_red {","            color: #FF0000;","        }","    </style>"],"id":2},{"start":{"row":8,"column":27},"end":{"row":9,"column":0},"action":"remove","lines":["",""]},{"start":{"row":8,"column":26},"end":{"row":8,"column":27},"action":"remove","lines":[">"]},{"start":{"row":8,"column":25},"end":{"row":8,"column":26},"action":"remove","lines":["\""]},{"start":{"row":8,"column":24},"end":{"row":8,"column":25},"action":"remove","lines":["s"]},{"start":{"row":8,"column":23},"end":{"row":8,"column":24},"action":"remove","lines":["s"]},{"start":{"row":8,"column":22},"end":{"row":8,"column":23},"action":"remove","lines":["c"]},{"start":{"row":8,"column":21},"end":{"row":8,"column":22},"action":"remove","lines":["/"]},{"start":{"row":8,"column":20},"end":{"row":8,"column":21},"action":"remove","lines":["t"]},{"start":{"row":8,"column":19},"end":{"row":8,"column":20},"action":"remove","lines":["x"]},{"start":{"row":8,"column":18},"end":{"row":8,"column":19},"action":"remove","lines":["e"]},{"start":{"row":8,"column":17},"end":{"row":8,"column":18},"action":"remove","lines":["t"]},{"start":{"row":8,"column":16},"end":{"row":8,"column":17},"action":"remove","lines":["\""]},{"start":{"row":8,"column":15},"end":{"row":8,"column":16},"action":"remove","lines":["="]},{"start":{"row":8,"column":14},"end":{"row":8,"column":15},"action":"remove","lines":["e"]},{"start":{"row":8,"column":13},"end":{"row":8,"column":14},"action":"remove","lines":["p"]},{"start":{"row":8,"column":12},"end":{"row":8,"column":13},"action":"remove","lines":["y"]}],[{"start":{"row":8,"column":11},"end":{"row":8,"column":12},"action":"remove","lines":["t"],"id":3},{"start":{"row":8,"column":10},"end":{"row":8,"column":11},"action":"remove","lines":[" "]},{"start":{"row":8,"column":9},"end":{"row":8,"column":10},"action":"remove","lines":["e"]},{"start":{"row":8,"column":8},"end":{"row":8,"column":9},"action":"remove","lines":["l"]},{"start":{"row":8,"column":7},"end":{"row":8,"column":8},"action":"remove","lines":["y"]},{"start":{"row":8,"column":6},"end":{"row":8,"column":7},"action":"remove","lines":["t"]},{"start":{"row":8,"column":5},"end":{"row":8,"column":6},"action":"remove","lines":["s"]},{"start":{"row":8,"column":4},"end":{"row":8,"column":5},"action":"remove","lines":["<"]},{"start":{"row":8,"column":0},"end":{"row":8,"column":4},"action":"remove","lines":["    "]}],[{"start":{"row":7,"column":25},"end":{"row":8,"column":0},"action":"remove","lines":["",""],"id":4}]]},"timestamp":1593637860275}
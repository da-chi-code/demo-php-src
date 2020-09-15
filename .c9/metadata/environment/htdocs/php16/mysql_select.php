{"filter":false,"title":"mysql_select.php","tooltip":"/htdocs/php16/mysql_select.php","ace":{"folds":[],"scrolltop":11,"scrollleft":0,"selection":{"start":{"row":1,"column":5},"end":{"row":1,"column":5},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":14,"state":"php-start","mode":"ace/mode/php"}},"hash":"c97b18646a65a104c60eef28c8cd7266bba9f482","undoManager":{"mark":18,"position":18,"stack":[[{"start":{"row":0,"column":0},"end":{"row":30,"column":6},"action":"insert","lines":["<pre>","<?php","$host = 'localhost'; // データベースのホスト名又はIPアドレス ※CodeCampでは「localhost」で接続できます","$username = 'username';  // MySQLのユーザ名","$passwd   = 'passwd';    // MySQLのパスワード","$dbname   = 'dbname';    // データベース名","$link = mysqli_connect($host, $username, $passwd, $dbname);","// 接続成功した場合","if ($link) {","   // 文字化け防止","   mysqli_set_charset($link, 'utf8');","   $query = 'SELECT goods_id, goods_name, price FROM goods_table';","   // クエリを実行します","   $result = mysqli_query($link, $query);","   // 1行ずつ結果を配列で取得します","   while ($row = mysqli_fetch_array($result)) {","       print $row['goods_id'];","       print $row['goods_name'];","       print $row['price'];","       print \"\\n\";","   }","   // 結果セットを開放します","   mysqli_free_result($result);","   // 接続を閉じます","   mysqli_close($link);","// 接続失敗した場合","} else {","   print 'DB接続失敗';","}","?>","</pre>"],"id":1}],[{"start":{"row":5,"column":18},"end":{"row":5,"column":19},"action":"remove","lines":["e"],"id":2},{"start":{"row":5,"column":17},"end":{"row":5,"column":18},"action":"remove","lines":["m"]},{"start":{"row":5,"column":16},"end":{"row":5,"column":17},"action":"remove","lines":["a"]},{"start":{"row":5,"column":15},"end":{"row":5,"column":16},"action":"remove","lines":["n"]},{"start":{"row":5,"column":14},"end":{"row":5,"column":15},"action":"remove","lines":["b"]},{"start":{"row":5,"column":13},"end":{"row":5,"column":14},"action":"remove","lines":["d"]}],[{"start":{"row":5,"column":13},"end":{"row":5,"column":26},"action":"insert","lines":["codecamp33848"],"id":3}],[{"start":{"row":4,"column":0},"end":{"row":4,"column":1},"action":"insert","lines":["/"],"id":4},{"start":{"row":4,"column":1},"end":{"row":4,"column":2},"action":"insert","lines":["*"]}],[{"start":{"row":4,"column":23},"end":{"row":4,"column":24},"action":"insert","lines":["*"],"id":5},{"start":{"row":4,"column":24},"end":{"row":4,"column":25},"action":"insert","lines":["/"]}],[{"start":{"row":3,"column":20},"end":{"row":3,"column":21},"action":"remove","lines":["e"],"id":6},{"start":{"row":3,"column":19},"end":{"row":3,"column":20},"action":"remove","lines":["m"]},{"start":{"row":3,"column":18},"end":{"row":3,"column":19},"action":"remove","lines":["a"]},{"start":{"row":3,"column":17},"end":{"row":3,"column":18},"action":"remove","lines":["n"]},{"start":{"row":3,"column":16},"end":{"row":3,"column":17},"action":"remove","lines":["r"]},{"start":{"row":3,"column":15},"end":{"row":3,"column":16},"action":"remove","lines":["e"]},{"start":{"row":3,"column":14},"end":{"row":3,"column":15},"action":"remove","lines":["s"]},{"start":{"row":3,"column":13},"end":{"row":3,"column":14},"action":"remove","lines":["u"]}],[{"start":{"row":3,"column":13},"end":{"row":4,"column":13},"action":"insert","lines":["   // MySQLのパスワード","$dbname   = '"],"id":7}],[{"start":{"row":3,"column":14},"end":{"row":3,"column":15},"action":"insert","lines":["'"],"id":8}],[{"start":{"row":4,"column":15},"end":{"row":4,"column":16},"action":"remove","lines":[" "],"id":9},{"start":{"row":4,"column":14},"end":{"row":4,"column":15},"action":"remove","lines":[";"]}],[{"start":{"row":3,"column":14},"end":{"row":3,"column":15},"action":"remove","lines":["'"],"id":10},{"start":{"row":3,"column":13},"end":{"row":3,"column":14},"action":"remove","lines":[" "]}],[{"start":{"row":3,"column":13},"end":{"row":3,"column":14},"action":"insert","lines":["'"],"id":11},{"start":{"row":3,"column":14},"end":{"row":3,"column":15},"action":"insert","lines":[";"]}],[{"start":{"row":4,"column":15},"end":{"row":4,"column":16},"action":"insert","lines":[";"],"id":12}],[{"start":{"row":4,"column":14},"end":{"row":4,"column":15},"action":"remove","lines":[" "],"id":13}],[{"start":{"row":4,"column":0},"end":{"row":4,"column":28},"action":"remove","lines":["$dbname   = '';// MySQLのユーザ名"],"id":14},{"start":{"row":3,"column":31},"end":{"row":4,"column":0},"action":"remove","lines":["",""]}],[{"start":{"row":3,"column":13},"end":{"row":3,"column":26},"action":"insert","lines":["codecamp33848"],"id":15}],[{"start":{"row":4,"column":24},"end":{"row":4,"column":25},"action":"remove","lines":["/"],"id":16},{"start":{"row":4,"column":23},"end":{"row":4,"column":24},"action":"remove","lines":["*"]}],[{"start":{"row":4,"column":20},"end":{"row":4,"column":21},"action":"remove","lines":["d"],"id":17},{"start":{"row":4,"column":19},"end":{"row":4,"column":20},"action":"remove","lines":["w"]},{"start":{"row":4,"column":18},"end":{"row":4,"column":19},"action":"remove","lines":["s"]},{"start":{"row":4,"column":17},"end":{"row":4,"column":18},"action":"remove","lines":["s"]},{"start":{"row":4,"column":16},"end":{"row":4,"column":17},"action":"remove","lines":["a"]},{"start":{"row":4,"column":15},"end":{"row":4,"column":16},"action":"remove","lines":["p"]}],[{"start":{"row":4,"column":15},"end":{"row":4,"column":28},"action":"insert","lines":["codecamp33848"],"id":18}],[{"start":{"row":4,"column":1},"end":{"row":4,"column":2},"action":"remove","lines":["*"],"id":19},{"start":{"row":4,"column":0},"end":{"row":4,"column":1},"action":"remove","lines":["/"]}]]},"timestamp":1594898403426}
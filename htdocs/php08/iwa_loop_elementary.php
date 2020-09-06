<?php

	define('CODE_NUMBER_S', 10);
	define('CODE_NUMBER_M', 100);
	define('CODE_NUMBER_L', 1000);

	$number = 0;

	//$coin_head = 0;
	//$coin_tail = 0;

	// ifを使わない場合 配列を使う
	$head = 1;
	$tail = 2;
	$coin = array();
	$coin[$head] = 0;
	$coin[$tail] = 0;

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	
	    if (isset($_POST['number']) === TRUE) {
	        $number = (int) $_POST['number'];
	    }
	
	    for ($i = 0; $i < $number; $i++) {
	
			/** 
	        $rand = mt_rand(0, 1);
	        if ($rand === 0) {
	            $coin_head += 1;
	        } else {
	            $coin_tail += 1;
	        }
	        */

			// ifを使わない場合 配列を使う 
			// １，２をそれぞれ表と裏に見立てて mt_rand(1, 2) の戻り値を配列のキーに使う
			//  ここでは mt_rand(1, 2)が1を返したら
			//  $coin[1] += 1; 表の出た回数を+1する
			//  mt_rand(1, 2)が2を返したら
			//  $coin[2] += 1; 裏の出た回数を+1する
			//
			//  こういう具合にデータ構造をうまく設計出来ればif制御構造を使わず、かつ値の判定を行う事なく
			//  狙った値を配列変数にsetできる。
			//  データ構造設計はとても、とてもとても大事なわけだ。
			//  それゆえ配列構造での狙ったキーへアクセスと値のセットが重要となる。
			
			// ※
			//  ifを使わないジャンケン結果表示サンプルの配列のデータ構造がどうなっているかが理解できれば
			//  配列操作についてはひとまず卒業です。

			$coin[ mt_rand($head, $tail) ] += 1;
	
	    }
	
	}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>課題</title>
</head>
<body>
    <article id="wrap">
        <section>
            <p>表: <?php print $coin[$head]; ?>回</p>
            <p>裏: <?php print $coin[$tail]; ?>回</p>
        </section>
        <form method="post">
            <select name="number">
                <option value="">回数選択</option>
                <option value="<?php print CODE_NUMBER_S; ?>" <?php if ($number === CODE_NUMBER_S) { print 'selected'; } ?>><?php print CODE_NUMBER_S; ?></option>
                <option value="<?php print CODE_NUMBER_M; ?>" <?php if ($number === CODE_NUMBER_M) { print 'selected'; } ?>><?php print CODE_NUMBER_M; ?></option>
                <option value="<?php print CODE_NUMBER_L; ?>" <?php if ($number === CODE_NUMBER_L) { print 'selected'; } ?>><?php print CODE_NUMBER_L; ?></option>
            </select>回
            <button type="submit">コイントス</button>
        </form>
    </article>
</body>
</html>
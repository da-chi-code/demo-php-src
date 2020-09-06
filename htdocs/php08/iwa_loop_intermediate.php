<?php
	$disp = array();

    //　関数従属性
	// 解答例その1(foreach)
	$array = array();
	for ($i = 1; $i < 10; $i++)
	{
		for ($j = 1; $j < 10; $j++)
		{
			$array[$i][$j] = $j . '×' . $i .'=' . $i * $j;
		}
	}

	$disp['table1'] = '';
	foreach ($array as $key => $value)
	{
		$disp['table1'] .= "<tr>\n";
		foreach ($value as $keys => $values)
		{
			if ( ($key % 2 === 0 && $keys % 2 === 0) || ($key % 2 === 1 && $keys % 2 === 1) )
			{
				$disp['table1'] .= '<td class="even">' . $values . "</td>\n";
			} 
			else
			{
				$disp['table1'] .= '<td>' . $values . "</td>\n";
			}
		}
		$disp['table1'] .= "</tr>\n";
	}

	$disp['table2'] = '';
	for ($i = 1; $i < 10; $i++)
	{
		$disp['table2'] .= "<tr>\n";
		for ($j = 1; $j < 10; $j++)
		{
			if ( ($i % 2 === 0 && $j % 2 === 0) || ($i % 2 === 1 && $j % 2 === 1) )
			{
				$disp['table2'] .= '<td class="even">' .  $j . '×' . $i . '=' . $i * $j . "</td>\n";
			}
			else
			{
				$disp['table2'] .= '<td>' .  $j . '×' . $i . '=' . $i * $j . "</td>\n";
			}
		}

		$disp['table2'] .= "</tr>\n";
	}

    //ヒアドキュメント演算子　=<<<
	$html =<<<EOT
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>九九</title>
    <style type="text/css">
        table, tr, td {
            border: solid 1px;
        }

        td {
            padding: 5px;
        }

        .even {
            background-color: #F5F5F5;
        }
    </style>
</head>
<body>
    <!-- 解答例その1(foreach) -->
    <table>
        <caption>解答例その1(foreach)</caption>
        __table1__
    </table>
    
    <!-- 解答例その2(for) -->
    <table>
        <caption>解答例その2(for)</caption>
        __table2__
    </table>

</body>
</html>
EOT;


	// foreach ($disp as $k => $v) の中身は以下と同じ
	//$html = str_replace('__table1__', $disp['table1'], $html);
	//$html = str_replace('__table2__', $disp['table2'], $html);

	foreach ($disp as $k => $v)
	{
		$html = str_replace('__' . $k . '__', $v, $html);
	}

print($html);



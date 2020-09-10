<pre>
<?php
/*
	配列のいろんな定義の仕方
*/
$ar = [];
$ar = [
	0 => [ 0 => 'val0', 1=> 'val1'], 
	1 => [ 0 => 'val0', 1=> 'val1'],
];

print(print_r($ar, true) . "\t" . __FILE__ . ':' . __LINE__ . "<br>\n");


$ar = [];
$ar[0][0] = 'val0';
$ar[0][1] = 'val1';
$ar[1][0] = 'val0';
$ar[1][1] = 'val1';

print(print_r($ar, true) . "\t" . __FILE__ . ':' . __LINE__ . "<br>\n");


$ar = [];
$ar[0][0] = '郵便番号';
$ar[0][1] = 'カナのなんとか';
$ar[0][2] = 'カナのなんとか２';
$ar[0][3] = 'カナのなんとか３';
$ar[0][4] = '県名';
$ar[0][5] = '市区';
$ar[0][6] = '町';

print(print_r($ar, true) . "\t" . __FILE__ . ':' . __LINE__ . "<br>\n");

?>
</pre>

<?php
$class = ['ガリ勉' => '鈴木', '委員長' => '佐藤', 'セレブ' => '斎藤', 'メガネ' => '伊藤', '女神' => '杉内'];
// 都道府県の配列をループさせる
foreach ($class as $key => $value) {
?>
           <p><?php print $value?>さんのアダ名は<?php print $key?>です。</p>
<?php
}
?>
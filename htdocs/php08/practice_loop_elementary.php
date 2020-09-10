<?php
print_r($_POST);
// 変数初期化
$number = '';
$front ='';
$back ='';
$coin = array();
$result = '';
if (isset($_POST['number']) === TRUE && $_POST['number'] !== '') {
    $coin = array('表', '裏');
    $number = htmlspecialchars($_POST['number'], ENT_QUOTES, 'UTF-8');
    for ($i = 1;$i <= $number;$i++) {
        $result = $coin[array_rand($coin)];
        if($result === '表'){
            $front ++;
        }
        else{
            $back ++;
        }
    }
}
?>
<DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>課題</title>
</head>
<body>
    <article id="wrap">
        <section>
            <p>表:<?php print $front;?>回</p>
            <p>裏:<?php print $back;?>回</p>
        </section>
        <form method="post">
            <select name="number">
                <option value="">回数選択</option>
                <option value="10">10</option>
                <option value="100">100</option>
                <option value="1000">1000</option>
            </select>回
            <button type="submit">コイントス</button>
        </form>
    </article>
</body>
</html>
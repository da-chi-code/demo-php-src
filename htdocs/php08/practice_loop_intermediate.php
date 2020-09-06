<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>課題（中級）</title>
    <script src="../jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="practice_loop_intermediate.css">
</head>
<body>
    <table id="matrix">
        <caption>九九表</caption>
<?php
$matrix = array(1,2,3,4,5,6,7,8,9);
$multi = array(1,2,3,4,5,6,7,8,9);
foreach ($matrix as $value){
    print '<tr>';
    foreach ($multi as $figure){
        if(($value + $figure) % 2 === 0){
            print'<td>'.$value.'*'.$figure.'='.$value * $figure.'</td>';
        }
        else{
            print'<td class="even">'.$value.'*'.$figure.'='.$value * $figure.'</td>';
        }
    }
    print '</tr>';
}
?>
    </table>
</body>
</html>
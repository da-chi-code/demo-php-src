<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>課題（中級）</title>
    <link rel="stylesheet" href="practice_file_intermediate.css">
</head>
<body>
    <p>以下にファイルから読み込んだ住所データを表示</p>
    <p>住所データ</p>
    <table>
    <tr>
        <td class ='table_top'>郵便番号</td>
        <td class ='table_top'>都道府県</td>
        <td class ='table_top'>市区町村</td>
        <td class ='table_top'>町域</td>
    </tr>
<?php
if( ( $f = fopen("zip_data_split_1.csv", "r") ) !== FALSE ) {
    while($line = fgetcsv($f)){
        print '<tr>';
        print'<td>'.$line[0].'</td>';
        for ($i = 4;$i < count($line) ;$i++){
                print'<td>'.$line[$i].'</td>';
            }
        print '</tr>';
    }
fclose($f);
}
?>
    </table>
</body>
</html>
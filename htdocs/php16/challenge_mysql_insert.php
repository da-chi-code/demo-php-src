<?php
$goods_data = [];
$name = '';
$price = '';
$comment = '追加したい商品の名前と価格を入力してください';
$error = array();
if (isset($_POST['name']) === TRUE) {
    $name= $_POST['name'];
}
if (isset($_POST['price']) === TRUE) {
    $price = $_POST['price'];
}
$host = 'localhost'; // データベースのホスト名又はIPアドレス ※CodeCampでは「localhost」で接続できます
$username = 'codecamp33848';  // MySQLのパスワード
$passwd   = 'codecamp33848';    // MySQLのパスワード
$dbname   = 'codecamp33848';    // データベース名
$link = mysqli_connect($host, $username, $passwd, $dbname);
// 接続成功した場合
if ($link) {
   // 文字化け防止
    mysqli_set_charset($link, 'utf8');
    /*
    if($name = '' || $price =''){
        $query = 'SELECT goods_name, price FROM goods_table';
        $result = mysqli_query($link, $query);
        while ($row = mysqli_fetch_array($result)) {
        $goods_data[] = $row;
        }
        // 結果セットを開放します
        mysqli_free_result($result);
        // 接続を閉じます
        mysqli_close($link);
    }
    */
    /*elseif(gettype($price) === 'integer' || gettype($price) === 'double'){
        $query = 'INSERT INTO goods_table(goods_name, price) VALUES(\''. $name .'\', ' . $price .');SELECT goods_name, price FROM goods_table';
        $comment = '追加成功';
        $result = mysqli_multi_query($link, $query);
    }
    */
    //else{
        if($_SERVER['REQUEST_METHOD']==="POST"){
            if(preg_match("/^[0-9]+$/",$price) !== 1){
                $error[]='価格は数字を入力してください。';
            }
            if(mb_strlen($name)>100){
                $error[]='名前は１００文字以内です';
            }
            if(count($error)===0){
                $query = 'INSERT INTO goods_table(goods_name, price) VALUES(\''. $name .'\', ' . $price .')';
                if(mysqli_query($link, $query)===false){
                    $error[]='入力できませんでした';
                }
            }
        }
        
        $query = 'SELECT goods_name, price FROM goods_table';
        $result = mysqli_query($link, $query);
        while ($row = mysqli_fetch_array($result)) {
            $goods_data[] = $row;
        }
        // 結果セットを開放します
        mysqli_free_result($result);
        // 接続を閉じます
        mysqli_close($link);
        /*$comment = '追加失敗';*/
    //}
// 接続失敗した場合
} else {
   print 'DB接続失敗';
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
   <meta charset="UTF-8">
   <title>課題</title>
   <style type="text/css">
       table, td, th {
           border: solid black 1px;
       }
       table {
           width: 200px;
       }
   </style>
</head>
<body>
    <ul>
        <?php foreach($error as $e){ ?>
            <li><?php print $e; ?></li>
        <?php } ?>
    </ul>
   <?php print'<p>'. $comment . '</p>'?>
   <form method="POST">
       <p>
           商品名：<input type="text" name="name">
           価格：<input type="text" name="price">
       </p>
       <input type="submit" value="追加">
   </form>
   <table>
       <tr>
           <th>商品名</th>
           <th>値段</th>
       </tr>
<?php
foreach ($goods_data as $value) {
?>
       <tr>
           <td><?php print htmlspecialchars($value['goods_name'], ENT_QUOTES, 'UTF-8'); ?></td>
           <td><?php print htmlspecialchars($value['price'], ENT_QUOTES, 'UTF-8'); ?></td>
       </tr>
<?php
}
?>
   </table>
</body>
</html>
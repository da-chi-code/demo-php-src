<?php
// MySQL接続情報
$host   = 'localhost'; // データベースのホスト名又はIPアドレス
$user   = 'codecamp33848';  // MySQLのユーザ名
$passwd = 'codecamp33848';    // MySQLのパスワード
$dbname = 'codecamp33848';    // データベース名
//変数定義
$money = '';
$drink_lists = [];
//ドリンクリストステータス公開のデータのみ配列に入れる
if ($link = mysqli_connect($host, $user, $passwd, $dbname)) {
    mysqli_set_charset($link, 'UTF8');
    $sql = 'SELECT drink_list.drink_id,drink_list.drink_name,drink_list.price,drink_list.create_at,drink_list.status,drink_list.display,inventory_table.stock FROM drink_list LEFT JOIN inventory_table ON inventory_table.drink_id = drink_list.drink_id WHERE status = \'1\'';
    $result = mysqli_query($link, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $drink_lists[] = $row;
    }
    mysqli_free_result($result);
    mysqli_close($link);
}
else {
   print 'DB接続失敗';
} 
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>自動販売機購入画面</title>
    <style>
        #flex {
            width: 600px;
        }

        #flex .drink {
            width: 120px;
            height: 210px;
            text-align: center;
            margin: 10px;
            float: left; 
        }

        #flex span {
            display: block;
            margin: 3px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .img_size{
            display: inline-block; 
            height: 125px;    
        }
        .img_size img{
            height: 100%;
        }
        .red {
            color: #FF0000;
        }

        #submit {
            clear: both;
        }

    </style>
</head>
<body>
    <h1>自動販売機</h1>
    <form action="result.php" method="post">
        <div>金額<input type="text" name="money" value=""></div>
        <div id="flex">
<?php foreach($drink_lists as $drink_list){ ?>
            <div class="drink">
                <span class="img_size"><img src=<?php print './image/'.str_replace(' ','',str_replace('-','',str_replace(':','',$drink_list['create_at']))).$drink_list['display'];?>></span>
                <span><?php print htmlspecialchars($drink_list['drink_name'],ENT_QUOTES,'UTF-8');?></span>
                <span><?php print htmlspecialchars($drink_list['price'],ENT_QUOTES,'UTF-8');?>円</span>
<?php if($drink_list['stock'] === '0'){ ?>
                <span class="red">売り切れ</span>
            </div>
<?php } else { ?>
                <input type="radio" name="drink_id" value=<?php print htmlspecialchars($drink_list['drink_id'],ENT_QUOTES,'UTF-8');?>>
            </div>
<?php } }?>
        </div>
        <div id="submit">
            <input type="submit" value="■□■□■ 購入 ■□■□■">
        </div>
    </form>
</body>
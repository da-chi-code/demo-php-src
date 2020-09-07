<?php
// MySQL接続情報
$host   = 'localhost'; // データベースのホスト名又はIPアドレス
$user   = 'codecamp33848';  // MySQLのユーザ名
$passwd = 'codecamp33848';    // MySQLのパスワード
$dbname = 'codecamp33848';    // データベース名
//変数定義
$money = '';
$drink_id = '';
$err_msgs = [];
$drink_lists = [];
$update_stock = '';
$change = '';
$date = date('Y-m-d H:i:s');
//接続確認
if ($link = mysqli_connect($host, $user, $passwd, $dbname)) {
    mysqli_set_charset($link, 'UTF8');
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        //投入金額及び商品選択のエラーチェック
        if (isset($_POST['money']) === TRUE){
            $money = $_POST['money'];
            if(strlen($money) <> mb_strlen($money)){
                $money = mb_convert_kana($_POST['money'],'n');
                if(ctype_digit($money)){
                    $money = intval($money);
                }
            }
            else{
                if(ctype_digit($money)){
                    $money = intval($money);
                }
            }
                
        }
        if (isset($_POST['drink_id']) === TRUE){
            $drink_id = $_POST['drink_id'];
        }
        if (empty($money) === TRUE) {
            $err_msgs[] = 'お金を投入してください';
        }
        elseif(is_int($money) === false || $money < 0){
            $err_msgs[] = 'お金は０以上の整数で入力してください';
        }
        if (empty($drink_id) === TRUE) {
            $err_msgs[] = '商品を選択してください';
        }
        //エラーがなければ選択商品の各データを取得する処理
        if(count($err_msgs) === 0){
            //トランザクション開始
            mysqli_autocommit($link, false);
            $sql = 'SELECT drink_list.drink_id,drink_list.drink_name,drink_list.price,drink_list.create_at,drink_list.status,drink_list.display,inventory_table.stock FROM drink_list LEFT JOIN inventory_table ON inventory_table.drink_id = drink_list.drink_id WHERE drink_list.drink_id ='.$drink_id;
            if($result = mysqli_query($link, $sql)){
                $drink_lists = mysqli_fetch_assoc($result);
                if($money < $drink_lists['price'] ){
                    $err_msgs[]='お金がたりません';
                }
                if($drink_lists['stock'] === 0){
                    $err_msgs[]='商品の在庫がありません';
                }
                if($drink_lists['status'] === '0'){
                    $err_msgs[]='非公開の商品です';
                }
            }
            else{
                $err_msgs[]='選択できませんでした';
            }
            //在庫を１つ減らす処理
            $update_stock = $drink_lists['stock'] - 1;
            if($drink_lists['stock'] <= 0){
                $err_msgs[]='商品の在庫がありません';
            }
            $sql = 'UPDATE inventory_table SET stock =\''.$update_stock.'\',update_at =\''.$date.'\'WHERE drink_id =\''.$drink_id.'\'';
            if(mysqli_query($link, $sql) === false){
                $err_msgs[]='在庫を減らせませんでした';
            }
            //購入履歴を追加する処理
            $sql = 'INSERT INTO purchase_history(drink_id,purchase_at) VALUES(\''.$drink_id.'\',\''.$date.'\')';
            if(mysqli_query($link, $sql) === false){
                $err_msgs[]='購入履歴を追加できませんでした';
            }
            if (count($err_msgs) === 0) {
                // 処理確定
                mysqli_commit($link);
                //おつり処理
                if($money - $drink_lists['price'] >= 0){
                    $change = $money - $drink_lists['price'];
                }
                else{
                    $change = 0;
                }
            } else {
                // 処理取消
                mysqli_rollback($link);
            }
            mysqli_free_result($result);
            mysqli_close($link);
        }
    }
}
else {
   print 'DB接続失敗';
} 
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>自動販売機結果</title>
</head>
<body>
    <h1>自動販売機結果</h1>
<?php foreach ($err_msgs as $err_msg) { ?>
        <p><?php print $err_msg;?></p>
<?php } ?>
<?php if(count($err_msgs) === 0){?>
        <img src=<?php print './image/'.str_replace(' ','',str_replace('-','',str_replace(':','',$drink_lists['create_at']))).$drink_lists['display'];?>>
        <p>がしゃん！【<?php print htmlspecialchars($drink_lists['drink_name'],ENT_QUOTES,'UTF-8')?>】が買えました！</p>
        <p>おつりは【<?php print $change?>円】です</p>
<?php }?>
    <footer><a href="index.php">戻る</a></footer>
</body>
</html>
<?php
// MySQL接続情報
$host   = 'localhost'; // データベースのホスト名又はIPアドレス
$user   = 'codecamp33848';  // MySQLのユーザ名
$passwd = 'codecamp33848';    // MySQLのパスワード
$dbname = 'codecamp33848';    // データベース名
//変数定義
$sql_kind = '';
$new_name = '';
$new_price = '';
$new_stock = '';
$new_img = '';
$save_file = '';
$new_status = '';
$err_msgs = [];
$drink_id = '';
$update_drink_id = '';
$update_stock = '';
$change_status = '';
$drink_lists = [];
$date = date('Y-m-d H:i:s');
$message = '';
//DB接続
if ($link = mysqli_connect($host, $user, $passwd, $dbname)) {
    mysqli_set_charset($link, 'UTF8');
    //データ送信後処理
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if (isset($_POST['sql_kind']) === TRUE){
            $sql_kind = $_POST['sql_kind'];
        }
        //新規分の入力値エラーチェック
        if($sql_kind === 'insert'){
            if (isset($_POST['new_name']) === TRUE){
                $new_name = $_POST['new_name'];
            }
            if (isset($_POST['new_price']) === TRUE){
                $new_price = $_POST['new_price'];
                if(strlen($new_price) <> mb_strlen($new_price)){
                    $new_price = mb_convert_kana($_POST['new_price'],'n');
                    if(ctype_digit($new_price)){
                        $new_price = intval($new_price);
                    }
                }
                else{
                    if(ctype_digit($new_price)){
                        $new_price = intval($new_price);
                    }
                }
            }
            if (isset($_POST['new_stock']) === TRUE){
                $new_stock = $_POST['new_stock'];
                if(strlen($new_stock) <> mb_strlen($new_stock)){
                    $new_stock = mb_convert_kana($_POST['new_stock'],'n');
                    if(ctype_digit($new_stock)){
                        $new_stock = intval($new_stock);
                    }
                }
                else{
                    if(ctype_digit($new_stock)){
                        $new_stock = intval($new_stock);
                    }
                }
            }
            if (isset($_FILES['new_img']) === TRUE){
                $new_img = $_FILES['new_img']['name'];
                $save_file = $_FILES['new_img']['tmp_name'];
            }
            if (isset($_POST['new_status']) === TRUE){
                $new_status = $_POST['new_status'];
            }
            if (empty(trim(mb_convert_kana($new_name, 's', 'UTF-8')))=== TRUE) {
                $err_msgs[] = '名前が未入力または空白のみが入力されています';
            }
            if (empty($new_price) === TRUE && $new_price !== 0) {
                $err_msgs[] = '値段が未入力です';
            }
            elseif(is_int($new_price) === false || $new_price < 0){
                $err_msgs[] = '値段は０以上の整数で入力してください';
            }
            if (empty($new_stock) === TRUE && $new_stock !== 0) {
                $err_msgs[] = '在庫が未入力です';
            }
            elseif(is_int($new_stock) === false || $new_stock < 0){
                $err_msgs[] = '在庫は０以上の整数で入力してください';
            }
            if (empty($new_img) === TRUE) {
                $err_msgs[] = '商品画像が未入力です';
            }
            elseif(pathinfo($new_img,PATHINFO_EXTENSION) !== 'jpg'){
                if(pathinfo($new_img,PATHINFO_EXTENSION) !== 'png'){
                    if(pathinfo($new_img,PATHINFO_EXTENSION) !== 'jpeg'){
                        $err_msgs[] = '画像形式はJPEGまたはPNGで入力してください';
                    }
                }
            }
            if($new_status !== '0'){
                if($new_status !== '1'){
                    $err_msgs[] = 'ステータスは公開または非公開を入力してください';
                }
            }
            //エラーがなければDBに商品追加処理
            if (count($err_msgs) === 0){
                mysqli_autocommit($link, false);
                $sql = 'INSERT INTO drink_list(drink_name,price,create_at,status,display) VALUES(\''.$new_name.'\',\''.$new_price.'\',\''.$date.'\',\''.$new_status.'\',\''.$new_img.'\')';
                if(mysqli_query($link, $sql) === false){
                    $err_msgs[]='ドリンクリストに追加できませんでした';
                }
                $drink_id = mysqli_insert_id($link);
                $sql = 'INSERT INTO inventory_table(drink_id,stock,create_at) VALUES(\''.$drink_id.'\',\''.$new_stock.'\',\''.$date.'\')';
                if(mysqli_query($link, $sql) === false){
                    $err_msgs[]='在庫データを追加できませんでした';
                }
            //画像保存処理
                if(is_uploaded_file($save_file)){
                    move_uploaded_file($save_file, './image/'.str_replace(' ','',str_replace('-','',str_replace(':','',$date))).$_FILES['new_img']['name']);
                }
                if (count($err_msgs) === 0) {
                // 処理確定
                    mysqli_commit($link);
                    $message = '商品追加が完了しました';
                }
                else{
                // 処理取消
                mysqli_rollback($link);
                }
            }
        }
        //在庫数更新分の入力値エラーチェック
        if($sql_kind === 'update'){
            if (isset($_POST['drink_id']) === TRUE){
                $update_drink_id = $_POST['drink_id'];
            }
            if (isset($_POST['update_stock']) === TRUE){
                $update_stock = $_POST['update_stock'];
                if(strlen($update_stock) <> mb_strlen($update_stock)){
                    $update_stock = mb_convert_kana($_POST['update_stock'],'n');
                    if(ctype_digit($update_stock)){
                        $update_stock = intval($update_stock);
                    }
                }
                else{
                    if(ctype_digit($update_stock)){
                        $update_stock = intval($update_stock);
                    }
                }
            }
            if (empty($update_stock) === TRUE && $update_stock !== 0) {
                $err_msgs[] = '更新する在庫が未入力です';
            }
            elseif(is_int($update_stock) === false || $update_stock < 0){
                $err_msgs[] = '更新する在庫は０以上の整数で入力してください';
            }
            //エラーがなければ在庫数更新処理
            if (count($err_msgs) === 0){
                $sql = 'UPDATE inventory_table SET stock =\''.$update_stock.'\',update_at= \''.$date.'\'WHERE drink_id =\''.$update_drink_id.'\'';
                if(mysqli_query($link, $sql) !== false){
                    $message='在庫が更新されました';
                }
                else{
                    $err_msgs[]='在庫を更新できませんでした';
                }
            }
        }
        //公開ステータス更新分の入力値エラーチェック
        if($sql_kind === 'change'){
            if (isset($_POST['drink_id']) === TRUE){
                $update_drink_id = $_POST['drink_id'];
            }
            if (isset($_POST['change_status']) === TRUE){
                $change_status = mb_convert_kana($_POST['change_status'],'n');
            }            
            if($change_status !== '0'){
                if($change_status !== '1'){
                    $err_msgs[] = 'ステータスは公開または非公開を入力してください';
                }
            }
            //エラーがなければ公開ステータス更新処理
            if (count($err_msgs) === 0){
                $sql = 'UPDATE drink_list SET status =\''.$change_status.'\',update_at=\''.$date.'\'WHERE drink_id =\''.$update_drink_id.'\'';
                if(mysqli_query($link, $sql) !== false){
                    $message='公開ステータスが更新されました';
                }
                else{
                    $err_msgs[]='公開ステータスを更新できませんでした';
                }
            }
        }
    }
    //ドリンクリスト全件配列に入れる
    $sql = 'SELECT drink_list.drink_id,drink_list.drink_name,drink_list.price,drink_list.create_at,drink_list.status,drink_list.display,inventory_table.stock FROM drink_list LEFT JOIN inventory_table ON inventory_table.drink_id = drink_list.drink_id';
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
    <title>自動販売機管理ツール</title>
    <style>
        section {
            margin-bottom: 20px;
            border-top: solid 1px;
        }

        table {
            width: 660px;
            border-collapse: collapse;
        }

        table, tr, th, td {
            border: solid 1px;
            padding: 10px;
            text-align: center;
        }

        caption {
            text-align: left;
        }

        .text_align_right {
            text-align: right;
        }

        .drink_name_width {
            width: 100px;
        }

        .input_text_width {
            width: 60px;
        }

        .status_false {
            background-color: #A9A9A9;
        }
    </style>
</head>
<body>
    <?php //処理完了メッセージ表示
    if($message <> ''){?>
            <p><?php print $message;?></p>
    <?php } ?>
    <?php //エラーメッセージ表示
    foreach ($err_msgs as $err_msg) { ?>
            <p><?php print $err_msg;?></p>
    <?php } ?>
    <h1>自動販売機管理ツール</h1>
    <section>
        <h2>新規商品追加</h2>
        <form method="post" enctype="multipart/form-data">
            <div><label>名前: <input type="text" name="new_name" value=""></label></div>
            <div><label>値段: <input type="text" name="new_price" value=""></label></div>
            <div><label>個数: <input type="text" name="new_stock" value=""></label></div>
            <div><input type="file" name="new_img"></div>
            <div>
                <select name="new_status">
                    <option value="0">非公開</option>
                    <option value="1">公開</option>
                </select>
            </div>
            <input type="hidden" name="sql_kind" value="insert">
            <div><input type="submit" value="■□■□■商品追加■□■□■"></div>
        </form>
    </section>
    <section>
        <h2>商品情報変更</h2>
        <table>
            <caption>商品一覧</caption>
            <tr>
                <th>商品画像</th>
                <th>商品名</th>
                <th>価格</th>
                <th>在庫数</th>
                <th>ステータス</th>
            </tr>
<?php foreach ($drink_lists as $drink_list) { ?>
            <tr>
                <form method="post">
                    <td><img src=<?php print './image/'.str_replace(' ','',str_replace('-','',str_replace(':','',$drink_list['create_at']))).$drink_list['display'];?>></td>
                    <td class="drink_name_width"><?php print htmlspecialchars($drink_list['drink_name'],ENT_QUOTES,'UTF-8');?></td>
                    <td class="text_align_right"><?php print htmlspecialchars($drink_list['price'],ENT_QUOTES,'UTF-8');?>円</td>
                    <td><input type="text"  class="input_text_width text_align_right" name="update_stock" value=<?php print htmlspecialchars($drink_list['stock'],ENT_QUOTES,'UTF-8');?>>個&nbsp;&nbsp;<input type="submit" value="変更"></td>
                    <input type="hidden" name="drink_id" value=<?php print htmlspecialchars($drink_list['drink_id'],ENT_QUOTES,'UTF-8');?>>
                    <input type="hidden" name="sql_kind" value="update">
                </form>
                <form method="post">
                    <td><input type="submit" value=<?php if($drink_list['status']=== '0'){print'非公開→公開';}else{print'公開→非公開';}?>></td>
                    <input type="hidden" name="change_status" value=<?php if($drink_list['status'] === '0'){print '1';}else{print '0';}?>>
                    <input type="hidden" name="drink_id" value=<?php print htmlspecialchars($drink_list['drink_id'],ENT_QUOTES,'UTF-8');?>>
                    <input type="hidden" name="sql_kind" value="change">
                </form>
            </tr>
<?php } ?>
        </table>
    </section>
</body>
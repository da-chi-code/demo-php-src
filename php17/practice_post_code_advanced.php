<?php
$zipcode = '';
$pref ='';
$address ='';
$error = []; 
$regexp_post   = '/[0-9]{7}/'; // 郵便番号の正規表現を入力
$host = 'localhost'; // データベースのホスト名又はIPアドレス ※CodeCampでは「localhost」で接続できます
$username = 'codecamp33848';  // MySQLのパスワード
$passwd   = 'codecamp33848';    // MySQLのパスワード
$dbname   = 'codecamp33848';    // データベース名
$link = mysqli_connect($host, $username, $passwd, $dbname);
$now = '';
$search_method = '';
$search_result = [];
$search_flag = '';
$MAX = 10;
$MAX_page = '';
if($link){
    mysqli_set_charset($link, 'utf8');
    if (isset($_GET['search_method']) === TRUE){
    $search_method = $_GET['search_method'];
    }
    if ($search_method !== ''){
        if(!isset($_GET['page_id'])){ // $_GET['page_id'] はURLに渡された現在のページ数
            $now = 1; // 設定されてない場合は1ページ目にする
        }else{
            $now = $_GET['page_id'];
        }
        if (isset($_GET['zipcode']) === TRUE){
        $zipcode = $_GET['zipcode'];
        }
        if (isset($_GET['pref']) === TRUE){
        $pref = $_GET['pref'];
        }
        if (isset($_GET['address']) === TRUE){
        $address = $_GET['address'];
        }
        $zipcode = str_replace(array(" ", "　"), "", $zipcode);
        $pref = str_replace(array(" ", "　"), "", $pref);
        $address = str_replace(array(" ", "　"), "", $address);
        if (empty($zipcode) === TRUE && empty($pref) === TRUE && empty($address) === TRUE) {
            $error[] = '郵便番号が未入力です';
        }
        elseif (preg_match($regexp_post,$zipcode) !== 1 && empty($pref) === TRUE && empty($address) === TRUE) {
            $error[] = '郵便番号は半角数字７桁で入力して下さい';
        }
        if (empty($zipcode) === TRUE && (empty($pref) === TRUE||empty($address) === TRUE)) {
            $error[] = '都道府県名か住所が未入力です';
        }
        if(count($error) === 0){
            if(empty($pref) === true && empty($address) === true){
                $query = 'SELECT post_code,pref,city,address FROM address_table WHERE post_code = \''.$zipcode.'\'';
            }
            else{
                $query = 'SELECT post_code,pref,city,address FROM address_table WHERE pref like \'%'.$pref.'%\' AND CONCAT(city,address) like \'%'.$address.'%\'';    
            }
            $result = mysqli_query($link, $query);
            while ($row = mysqli_fetch_array($result)) {
                $search_result[] = $row;
            }
            mysqli_free_result($result);
            mysqli_close($link);
            $search_flag = '完了';
            //ページング処理
            $MAX_page = ceil(count($search_result)/$MAX);
            if(count($search_result) > $MAX){
                $disp_data = array_slice($search_result,$MAX*($now-1),$MAX);
            }else{
                $disp_data = $search_result;
            }
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
    <title>郵便番号検索</title>
    <style>
        .search_result {
            border-top: solid 1px;
            margin-top: 10px;
        }
        
        table {
            border-collapse: collapse;
        }
        table, tr, th, td {
            border: solid 1px;
        }
        caption {
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>郵便番号検索</h1>
    <section>
        <h2>郵便番号から検索</h2>
        <form method = "GET">
            <input type="text" name="zipcode" placeholder="例）1010001" value=<?php if($zipcode!==''){print $zipcode ;}else{print'';}?>>
            <input type="hidden" name="search_method" value="zipcode">
            <input type="submit" value="検索">
        </form>
        <h2>地名から検索</h2>
        <form method = "GET">
            都道府県を選択
            <select name="pref">
                <option value="" selected>都道府県を選択</option>
                <option value="北海道" <?php if($pref==='北海道'){print'selected';}?>>北海道</option>
                <option value="青森県" >青森県</option>
                <option value="岩手県" >岩手県</option>
                <option value="宮城県" >宮城県</option>
                <option value="秋田県" >秋田県</option>
                <option value="山形県" >山形県</option>
                <option value="福島県" >福島県</option>
                <option value="茨城県" >茨城県</option>
                <option value="栃木県" >栃木県</option>
                <option value="群馬県" >群馬県</option>
                <option value="埼玉県" >埼玉県</option>
                <option value="千葉県" >千葉県</option>
                <option value="東京都" >東京都</option>
                <option value="神奈川県" >神奈川県</option>
                <option value="新潟県" >新潟県</option>
                <option value="富山県" >富山県</option>
                <option value="石川県" >石川県</option>
                <option value="福井県" >福井県</option>
                <option value="山梨県" >山梨県</option>
                <option value="長野県" >長野県</option>
                <option value="岐阜県" >岐阜県</option>
                <option value="静岡県" >静岡県</option>
                <option value="愛知県" >愛知県</option>
                <option value="三重県" >三重県</option>
                <option value="滋賀県" >滋賀県</option>
                <option value="京都府" >京都府</option>
                <option value="大阪府" >大阪府</option>
                <option value="兵庫県" >兵庫県</option>
                <option value="奈良県" >奈良県</option>
                <option value="和歌山県" >和歌山県</option>
                <option value="鳥取県" >鳥取県</option>
                <option value="島根県" >島根県</option>
                <option value="岡山県" >岡山県</option>
                <option value="広島県" >広島県</option>
                <option value="山口県" >山口県</option>
                <option value="徳島県" >徳島県</option>
                <option value="香川県" >香川県</option>
                <option value="愛媛県" >愛媛県</option>
                <option value="高知県" >高知県</option>
                <option value="福岡県" >福岡県</option>
                <option value="佐賀県" >佐賀県</option>
                <option value="長崎県" >長崎県</option>
                <option value="熊本県" >熊本県</option>
                <option value="大分県" >大分県</option>
                <option value="宮崎県" >宮崎県</option>
                <option value="鹿児島県" >鹿児島県</option>
                <option value="沖縄県" >沖縄県</option>
            </select>
            市区町村
            <input type="text" name="address" value=<?php if($address!==''){print $address ;}else{print'';}?>>
            <input type="hidden" name="search_method" value="address">
            <input type="submit" value="検索">
        </form>
    </section>
    <section class="search_result">
    <?php if($search_flag === '完了'){?>
        <p><?php print '検索結果'.count($search_result).'件';?></p>
        <table>
            <caption><?php print '郵便番号検索結果';?></caption>
            <tr>
                <th>郵便番号</th>
                <th>都道府県</th>
                <th>市区町村</th>
                <th>町域</th>
            </tr>
    <?php foreach ($disp_data as $result) { ?>
            <tr>
                <td><?php print htmlspecialchars($result['post_code'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php print htmlspecialchars($result['pref'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php print htmlspecialchars($result['city'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php print htmlspecialchars($result['address'], ENT_QUOTES, 'UTF-8'); ?></td>
            </tr>
    <?php }?>
        </table>
    <?php if($now > 1){?>
            <a href=<?php print'/php17/practice_post_code_advanced.php?pref='.$pref.'&address='.$address.'&search_method=address&page_id='.($now - 1)?>>前のページ</a>
    <?php }?>
    <?php if($now  < $MAX_page){?>
            <a href=<?php print'/php17/practice_post_code_advanced.php?pref='.$pref.'&address='.$address.'&search_method=address&page_id='.($now + 1)?>>次のページ</a>
    <?php }} else{ ?>
    <p><?php print'ここに検索結果が表示されます';?></p>
    <?php foreach ($error as $message) { ?>
            <p><?php print $message;?></p>
    <?php } ?>
    <?php } ?>
    </section>
</body>
</html>
SELECT order_table.order_id, order_table.order_date ,customer_table.customer_name, customer_table.address ,customer_table.phone_number, order_table.payment, goods_table.goods_name, goods_table.price, order_detail_table.quantity FROM order_table JOIN customer_table ON order_table.customer_id = customer_table.customer_id JOIN order_detail_table ON order_table.order_id = order_detail_table.order_id JOIN goods_table ON order_detail_table.goods_id = goods_table.goods_id
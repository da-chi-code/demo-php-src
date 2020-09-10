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
                    <td><img src=<?php print '../drink/image/'.str_replace(' ','',str_replace('-','',str_replace(':','',$drink_list['create_at']))).$drink_list['display'];?>></td>
                    <td class="drink_name_width"><?php print $drink_list['drink_name'];?></td>
                    <td class="text_align_right"><?php print $drink_list['price'];?>円</td>
                    <td><input type="text"  class="input_text_width text_align_right" name="update_stock" value=<?php print $drink_list['stock'];?>>個&nbsp;&nbsp;<input type="submit" value="変更"></td>
                    <input type="hidden" name="drink_id" value=<?php print $drink_list['drink_id'];?>>
                    <input type="hidden" name="sql_kind" value="update">
                </form>
                <form method="post">
                    <td><input type="submit" value=<?php if($drink_list['status']=== '0'){print'非公開→公開';}else{print'公開→非公開';}?>></td>
                    <input type="hidden" name="change_status" value=<?php if($drink_list['status'] === '0'){print '1';}else{print '0';}?>>
                    <input type="hidden" name="drink_id" value=<?php print $drink_list['drink_id'];?>>
                    <input type="hidden" name="sql_kind" value="change">
                </form>
            </tr>
<?php } ?>
        </table>
    </section>
</body>
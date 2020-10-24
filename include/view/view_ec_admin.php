<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>商品管理ページ</title>
  <link type="text/css" rel="stylesheet" href="./css/admin.css">
</head>
<body>
  <h1>CodeSHOP 管理ページ</h1>
  <div>
    <a class="nemu" href="./ec_logout.php">ログアウト</a>
    <a href="./ec_admin_user.php">ユーザ管理ページ</a>
  </div>
  <section>
    <?php //処理完了メッセージ表示
    if($message !== ""){ ?>
      <p><?php print $message;?></p>
    <?php } ?>
    <?php //エラーメッセージ表示
    foreach ($err_msgs as $err_msg) { ?>
            <p><?php print $err_msg;?></p>
    <?php } ?>
    <h2>商品の登録</h2>
    <form method="post" enctype="multipart/form-data">
      <div><label>商品名: <input type="text" name="name" value=""></label></div>
      <div><label>値　段: <input type="text" name="price" value=""></label></div>
      <div><label>個　数: <input type="text" name="stock" value=""></label></div>
      <div><label>商品画像:<input type="file" name="img"></label></div>
      <div><label>ステータス:
        <select name="status">
          <option value="" selected>選択してください</option>
          <option value="0">非公開</option>
          <option value="1" selected>公開</option>
        </select>
        </label>
      </div>
      <input type="hidden" name="sql_kind" value="insert">
      <div><input type="submit" value="商品を登録する"></div>
    </form>
  </section>
  <section>
    <h2>商品情報の一覧・変更</h2>
    <table>
      <tr>
        <th>商品画像</th>
        <th>商品名</th>
        <th>価　格</th>
        <th>在庫数</th>
        <th>ステータス</th>
        <th>操作</th>
      </tr>
<?php foreach ($item_lists as $item_list) { ?>
      <tr>
        <form method="post">
          <td><img class="img_size" src=<?php print './image/'.$item_list['img']?>></td>
          <td class="name_width"><?php print h($item_list['name'])?></td>
          <td class="text_align_right"><?php print h($item_list['price'])?></td>
          <td><input type="text"  class="input_text_width text_align_right" name="stock" value=<?php print $item_list['stock'];?>>個&nbsp;&nbsp;<input type="submit" value="変更する"></td>
          <input type="hidden" name="id" value=<?php print h($item_list['id'])?>>
          <input type="hidden" name="sql_kind" value="update">
        </form>
        <form method="post">
          <td><input type="submit" value=<?php if($item_list['status'] === '0'){print'非公開→公開';}else{print'公開→非公開';}?>></td>
          <input type="hidden" name="status" value=<?php if($item_list['status'] === '0'){print '1';}else{print '0';}?>>
          <input type="hidden" name="id" value=<?php print $item_list['id']?>>
          <input type="hidden" name="sql_kind" value='change'>
        </form>
        <form method="post">
          <td><input type="submit" value="削除する"></td>
          <input type="hidden" name="id" value= <?php print $item_list['id']?>>
          <input type="hidden" name="sql_kind" value="delete">
        </form>
      </tr>
<?php } ?>
    </table>
  </section>
</body>
</html>
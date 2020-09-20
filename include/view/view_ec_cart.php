<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>ショッピングカートページ</title>
  <link type="text/css" rel="stylesheet" href="./css/common.css">
</head>
<body>
  <header>
    <div class="header-box">
      <a href="./ec_top.php">
        <img class="logo" src="./images/logo.png" alt="CodeCamp SHOP">
      </a>
      <a class="nemu" href="./ec_logout.php">ログアウト</a>
      <a href="./ec_cart.php" class="cart"></a>
      <p class="nemu">ユーザー名：taikin</p>
    </div>
  </header>
<?php foreach ($err_msgs as $err_msg) { ?>
    <p><?php print $err_msg;?></p>
<?php } ?>
  <div class="content">
    <h1 class="title">ショッピングカート</h1>

    <div class="cart-list-title">
      <span class="cart-list-price">価格</span>
      <span class="cart-list-num">数量</span>
    </div>
    <ul class="cart-list">
<?php foreach ($cart_lists as $cart_list) { //下のmin form id について確認?>
      <li>
        <div class="cart-item">
          <img class="img" src=<?php print './image/'.$item_list['img']?>>
          <span class="name"><?php print h($item_list['name'])?></span>
          <form class="cart-item-del" action="./ec_cart.php" method="post">
            <input type="submit" value="削除">
            <input type="hidden" name="id" value=<?php print h($item_list['id'])?>>
            <input type="hidden" name="sql_kind" value="delete_cart">
          </form>
          <span class="price"><?php print h($item_list['price'])?></span>
          <form class="form_select_amount" id="form_select_amount372" action="./ec_cart.php" method="post">
            <input type="text" class="cart-item-num2" min="0" name="amount" value=<?php print $cart_list['amount'];?>>個&nbsp;<input type="submit" value="変更する">
            <input type="hidden" name="id" value=<?php print h($cart_list['id'])?>>
            <input type="hidden" name="sql_kind" value="change_cart">
          </form>
        </div>
      </li>
<?php } ?>
    </ul>
    <div class="buy-sum-box">
      <span class="buy-sum-title">合計</span>
      <span class="buy-sum-price"><?php print $sum ?>円</span>
    </div>
    <div>
      <form action="./ec_result.php" method="post">
        <input class="buy-btn" type="submit" value="購入する">
      </form>
    </div>
  </div>
</body>
</html>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>購入完了ページ</title>
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
      <p class="nemu">ユーザー名：<?php print $_COOKIE['user_name'] ?></p>
    </div>
  </header>
  <div class="content">
<?php foreach ($err_msgs as $err_msg) { ?>
    <p><?php print $err_msg;?></p>
<?php } ?>
<?php if($message !== ''){?>
    <p class = "finish-msg"><?php print $message ?></p>
<?php } ?>
    <div class="cart-list-title">
      <span class="cart-list-price">価格</span>
      <span class="cart-list-num">数量</span>
    </div>
      <ul class="cart-list">
<?php foreach ($cart_lists as $cart_list) { ?>
      <li>
        <div class="cart-item">
          <img class="cart-item-img" src=<?php print './image/'.$cart_list['img']?>>
          <span class="cart-item-name"><?php print h($cart_list['name'])?></span>
          <span class="cart-item-price">¥<?php print h($cart_list['price'])?></span>
          <span class="form_select_amount"><?php print h($cart_list['amount'])?></span>
        </div>
      </li>
<?php } ?>
      </ul>
    <div class="buy-sum-box">
      <span class="buy-sum-title">合計</span>
      <span class="buy-sum-price">¥<?php print $sum ?></span>
    </div>
  </div>
</body>
</html>
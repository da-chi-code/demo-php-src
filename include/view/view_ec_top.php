
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>商品一覧ページ</title>
  <link type="text/css" rel="stylesheet" href="./css/common.css">
</head>
<body>
  <header>
    <div class="header-box">
      <a href="./ec_top.php">
        <img class="logo" src="./images/logo.png" alt="CodeSHOP">
      </a>
      <a class="nemu" href="./ec_logout.php">ログアウト</a>
      <a href="./ec_cart.php" class="cart"></a>
      <p class="nemu">ユーザー名：<?php print $_COOKIE['user_name'] ?></p>
    </div>
  </header>
  <div class="content">
<?php if($message !== ''){?>
    <p><?php print $message ?></p>
<?php } ?>
<?php foreach ($err_msgs as $err_msg) { ?>
    <p><?php print $err_msg;?></p>
<?php } ?>
    <ul class="item-list">
<?php foreach($item_lists as $item_list){ ?>
      <li>
        <div class="item">
          <form action="./ec_top.php" method="post">
            <img class="item-img" src=<?php print './image/'.$item_list['img']?>>
            <div class="item-info">
              <span class="item-name"><?php print h($item_list['name'])?></span>
              <span class="item-price"><?php print '¥'.h($item_list['price'])?></span>
            </div>
<?php if($item_list['stock'] === '0'){ ?>
            <span class="red">売り切れ</span>
<?php } else { ?>
            <input class="cart-btn" type="submit" value="カートに入れる">
            <input type="hidden" name="id" value=<?php print $item_list['id']?>>
            <input type="hidden" name="sql_kind" value="insert_cart">
            <input type="hidden" name="amount" value="1">
<?php } ?>
          </form>
        </div>
      </li>
<?php } ?>
</body>
</html>

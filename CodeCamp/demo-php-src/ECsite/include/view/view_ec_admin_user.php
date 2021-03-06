<!DOCTYPE html>
<html lang='ja'>

<head>
  <meta charset='utf-8'>
  <title>ユーザ管理ページ</title>
  <link type="text/css" rel="stylesheet" href="./css/admin.css">
</head>

<body>
  <?php foreach ($err_msgs as $err_msg) { ?>
    <p><?php print $err_msg; ?></p>
  <?php } ?>
  <h1>CodeSHOP 管理ページ</h1>
  <div>
    <a class='nemu' href='./ec_logout.php'>ログアウト</a>
    <a href='./ec_admin.php'>商品管理ページ</a>
  </div>
  <h2>ユーザ情報一覧</h2>
  <table>
    <tr>
      <th>ユーザID</th>
      <th>登録日時</th>
    </tr>
    <?php foreach ($user_lists as $user_list) { ?>
      <tr>
        <td><?php print h($user_list['user_name']) ?></td>
        <td><?php print h($user_list['created_at']) ?></td>
      </tr>
    <?php } ?>
  </table>
</body>

</html>
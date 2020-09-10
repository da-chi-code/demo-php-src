<?php
$emp_data = [];
$job = '';
if (isset($_GET['job']) === TRUE) {
    $job = $_GET['job'];
}
$host = 'localhost'; // データベースのホスト名又はIPアドレス ※CodeCampでは「localhost」で接続できます
$username = 'codecamp33848';  // MySQLのパスワード
$passwd   = 'codecamp33848';    // MySQLのパスワード
$dbname   = 'codecamp33848';    // データベース名
$link = mysqli_connect($host, $username, $passwd, $dbname);
// 接続成功した場合
if ($link) {
    // 文字化け防止
    mysqli_set_charset($link, 'utf8');
    if ($job !== '') {
        $query = 'SELECT emp_id, emp_name, job, age FROM emp_table WHERE job = \'' . $job . '\'';
    } else {
        $query = 'SELECT emp_id, emp_name, job, age FROM emp_table';
    }
    // クエリを実行します
    $result = mysqli_query($link, $query);
    // 1行ずつ結果を配列で取得します
    while ($row = mysqli_fetch_array($result)) {
        $emp_data[] = $row;
    }
    // 結果セットを開放します
    mysqli_free_result($result);
    // 接続を閉じます
    mysqli_close($link);
    // 接続失敗した場合
} else {
    print 'DB接続失敗';
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>課題</title>
    <style type="text/css">
        table,
        td,
        th {
            border: solid black 1px;
        }

        table {
            width: 350px;
            margin-top: 10px;
        }

        caption {
            text-align: left;
        }
    </style>
</head>

<body>
    <p>表示する職種を選択して下さい。</p>
    <form>
        <select name="job">
            <option value="">全員</option>
            <option value="manager">マネージャー</option>
            <option value="analyst">アナリスト</option>
            <option value="clerk">一般職</option>
        </select>
        <input type="submit" value="表示">
    </form>
    <table>
        <caption>社員一覧</caption>
        <tr>
            <th>社員番号</th>
            <th>名前</th>
            <th>職種</th>
            <th>年齢</th>
        </tr>
        <?php
        foreach ($emp_data as $value) {
        ?>
            <tr>
                <td><?php print htmlspecialchars($value['emp_id'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php print htmlspecialchars($value['emp_name'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php print htmlspecialchars($value['job'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php print htmlspecialchars($value['age'], ENT_QUOTES, 'UTF-8'); ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>
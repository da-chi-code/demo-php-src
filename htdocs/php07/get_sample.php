<?php
print(print_r($_GET, true) . "\t" . __FILE__ . ':' . __LINE__ . "<br>\n");
if (isset($_GET['query']) === TRUE) {
   // $query  = htmlspecialchars($_GET['query'], ENT_QUOTES, 'UTF-8');
   $query  = $_GET['query'];
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
   <meta charset="UTF-8">
   <title>スーパーグローバル変数使用例</title>
</head>
<body>
   <h1>検索しよう</h1>
<?php
   // formから検索文字列が渡ってきている場合はGoogleへのリンクを表示
   if (isset($query) === TRUE) {
?>
   <a href="https://www.google.co.jp/search?q=<?php print $query; ?>" target="_blank">「<?php print $query; ?>」をGoogleで検索する</a><br>
   <a href="http://www.bing.com/search?q=<?php print $query; ?>" target="_blank">「<?php print $query; ?>」をbingで検索する</a><br>
   <a href="http://search.yahoo.co.jp/search?p=<?php print $query; ?>" target="_blank">「<?php print $query; ?>」をyahooで検索する</a><br>
   <p>このページをブックマークしてみましょう。<br>ブックマークからこのページにアクセスしても同じページが表示されます</p>
<?php
   }
?>
   <!-- 検索文字列送信用フォーム -->
   <form method="get">
       <input type="text" name="query" value="<?php if (isset($query) === TRUE) 
                                                   { 
                                                       print htmlspecialchars($query, ENT_QUOTES, 'UTF-8'); 
                                                   } ?>">
       <!--<input type="text" name="query" value="">-->
       <input type="text" name="a1" value="">
       <input type="text" name="a2" value="">
       <input type="text" name="a3" value="">
       <input type="text" name="a4" value="">

       <input type="hidden" name="a5" value="隠れてるけど送られるよ">
<textarea name="a6">
   
</textarea>

       <input type="hidden" name="a7" value="0">
      check : <input type="checkbox" name="a7" value="checkboxだよ" >

   <select name="a8">
      <option value="select 1">select 1</option>
      <option value="select 2">select 2</option>
      <option value="select 3">select 3</option>
   </select>

       <input type="radio" name="a9" value="0">
       <input type="radio" name="a9" value="1">
       <input type="radio" name="a9" value="2">


       <input type="file" name="a10">


       <input type="submit" value="送信">
   </form>
</body>
</html>
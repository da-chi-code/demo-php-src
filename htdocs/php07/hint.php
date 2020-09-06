<?php
/**
webでサイトが表示される仕組み

ブラウザ(chromなど)でurlにリクエストをする。
	リクエストの種類よく使うもの２つ
	
	・GET
	・POST
	
	ブラウザは場合によって上記を使い分ける。
		GET
			通常urlの入力エリアにアドレスを打ち込んでリクエストするのはGET
			他にも
			<form method="GET" action="http://hoge.hoge/aaa.php">
				<input type="text" name="bbb" value="kkkkk">
			</form>
			でリクエストされることもある。


		POST
			formタグのmethod属性で指定される。
			<form method="POST" action="http://hoge.hoge/aaa.php">
				<input type="text" name="bbb" value="kkkkk">
			</form>

		※上記以外にjavascriptからリクエストを投げることもある。
			その場合はGET,POSTはjavascriptで指定できる。


	ブラウザからリクエストを受けたwebサーバーは応答を返す。（レスポンスを返す)




	上記の流れのなかでブラウザからwebサーバーにパラメータを渡す仕組みがある。

		・リクエストを投げるときにリクエストヘッダーとして一緒に渡す。リクエストヘッダー	
		・URLの中に含める。                    GET (QUERY_STRING)
		・ブラウザからwebサーバーに送り付ける。POST
		
		
	PHPがどのようにパラメータを受け取ったか確認してみよう。

print(print_r($_SERVER, true) . "\t" . __FILE__ . ':' . __LINE__ . "\n");
print(print_r($_GET, true) . "\t" . __FILE__ . ':' . __LINE__ . "\n");
print(print_r($_POST, true) . "\t" . __FILE__ . ':' . __LINE__ . "\n");

*/
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>解説</title>
</head>
<body>
	リンク a tag
	<a href="http://www.uiui.net/~gang/iinfo.php?param1=value1" >http://www.uiui.net/~gang/iinfo.php?param1=value1</a><br />

	<br />
	form GET
	<form method="GET" action="http://www.uiui.net/~gang/iinfo.php">
		<input type="hidden" name="param1" value="value1">
		<input type="text" name="param2" value="">
		<input type="submit" value="リクエスト">
	</form>

	<br />
	form POST
	<form method="POST" action="http://www.uiui.net/~gang/iinfo.php">
		<input type="hidden" name="param1" value="value1">
		<input type="text" name="param2" value="">
		<input type="submit" value="リクエスト">
	</form>

	<br />
	form POST + (QUERY_STRING)
	<form method="POST" action="http://www.uiui.net/~gang/iinfo.php?param2=value2">
		<input type="hidden" name="param1" value="value1">
		<input type="text" name="param3" value="">
		<input type="submit" value="リクエスト">
	</form>

</body>
</html>

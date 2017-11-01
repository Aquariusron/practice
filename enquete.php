<html>
<head>
	<title>送信テスト</title>
<meta http-equiv="Content-Type" content="text/html;
chraset=utf-8">
<link rel="stylesheet" type="text/css" href="mac.css"/>
</head>
<body>
	<h1>アンケートフォーム</h1>
	<table>
	<form action="post.php" method="post">
		<tr><td><p>お名前：<input type="text" name="name"></p></td></tr>
		<tr><td><p>性別：<input type="radio" name="gender" value="men">男
		<input type="radio" name="gender" value="woman">女</td></tr>
		<tr><td><p>評価：
		<select name="star">
			<option value="1">★☆☆☆☆</option>
			<option value="2">★★☆☆☆</option>
			<option value="3">★★★☆☆</option>
			<option value="4">★★★★☆</option>
			<option value="5">★★★★★</option>
		</select></p></td></tr>
		<tr><td>ご意見：
		<p><textarea name="other"></textarea></p>
		<input type="submit" value="送信">
		<td></tr>
	</form>
	</table>
</body>
</html>
<?php

?>
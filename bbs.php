<pre><?php
include 'includes/login.php';

	$num = 3;
	
	$dsn = 'mysql:host=localhost;dbname=tennis;charset=utf8';
	$user = 'tennisuser';
	$password = '0832';

	$page = 0;
	if(isset($_GET['page']) && $_GET['page'] > 0) {
		$page = intval($_GET['page']) - 1;
	}

	try {
			$db = new PDO($dsn, $user, $password);
			$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

			// プリペアドステートメント発行
			$stmt = $db->prepare(
										"SELECT * FROM bbs ORDER BY date DESC LIMIT :page, :num"
									);

			// パラメータの割当
			$page = $page * $num;
			$stmt -> bindParam(':page', $page, PDO::PARAM_INT);
			$stmt -> bindParam(':num', $num, PDO::PARAM_INT);

			$stmt->execute();
	} catch (PDOException $e) {
		echo "エラー".$e->getMessage();
		var_dump($e);
		
	}
?>
</pre>
<html>
<head>
	<title>けいじばん</title>
<meta http-equiv="Content-Type" content="text/html;
charset="utf-8">
<link rel="stylesheet" type="text/css" href="mac.css"/>
</head>
<body>
	<h1>掲示板</h1>
	<p><a href="index.php">トップページに戻る</a></p>
	<form action="write.php" method="post">
		<p>名前：<input type="text" name="name" value="<?php echo isset($_COOKIE['name'])? $_COOKIE['name'] : "" ?>"></p>
		<p>タイトル：<input type="text" name="title"></p>
		<p><textarea name="body" cols="20" row="50"></textarea></p>
		<p>削除パスワード(数字4桁):<input type="text" name="pass"></p>
		<p><input type="submit" value="書き込む"></p>
	</form>
	</ hr>
<pre>
<?php
	while($row = $stmt->fetch()):
		if($row['title']) {
			$title = $row['title'];
		} else {
			$title = '(無題)';
		}
?>
</pre>
<br><br>
	<table>
		<tr>
		<tr><p>名前：<?php echo $row['name'] ?></tr></p>
		<tr><p>タイトル：<?php echo $title ?></tr></p>
		<tr><td><p><?php echo nl2br($row['body'], false) ?></p></td></tr>
		<td><p><?php echo $row['date'] ?></p></td>
		</tr>
	</table>
	<hr>
<?php
	endwhile;
	
	try {
		$stmt = $db->prepare("SELECT COUNT(*) FROM bbs");

		$stmt->execute();
	} catch(PDOException $e) {
		echo "エラー".$e->getMessage();
		var_dump($e);
	}

	$comments = $stmt->fetchColumn();
	$max_page = ceil($comments / $num);
	echo '<p>';
	for($i = 1; $i <= $max_page; $i++) {
		echo '<a href="bbs.php?page='.$i.'">'.$i.'</a>&nbsp;';

	}
	echo '</p>';

?>

</body>
</html>
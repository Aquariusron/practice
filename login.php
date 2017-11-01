<?php
	session_start();
	
	if(isset($_SESSION['id'])) {
		header('Location: index.php');
	} else if(isset($_POST['name']) && isset($_POST['password'])) {
		$dsn = 'mysql:host=localhost;dbname=tennis;charset=utf8';
		$user = 'tennisuser';
		$password = '0832';

	try {
			$db = new PDO($dsn, $user, $password);
			$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

			// プリペアドステートメント発行
			$stmt = $db->prepare("SELECT * FROM users WHERE name=:name AND password=:pass");

			// デバッグ用
			print_r($db->errorInfo());

			// パラメータの割当
			$stmt->bindParam(':name', $_POST['name'], PDO::PARAM_STR);
			$stmt->bindParam(':pass', sha1($_POST['password']), PDO::PARAM_STR);

			$stmt->execute();

			if($row = $stmt->fetch()) {
				$_SESSION['id'] = $row['id'];
				header('Location: index.php');
				exit();
			}
	} catch (PDOException $e) {
		echo "エラー".$e->getMessage();
		var_dump($e);
		
	}
} else {
?>

<html>
<head></head>
<meta http-equiv="Content-Type" content="text/html;
charset="utf-8">
<body>
	<h1>テニスサークル交流サイト</h1>

	<h2>ログイン</h2>
	<form action="" method="post">
		<p>名前：<input type="text" name="name"></p>
		<p>パスワード：<input type="text" name="password"></p>
		<p><input type="submit" value="ログイン"></p>
	</form>
</body>
</html>
<?php } ?>
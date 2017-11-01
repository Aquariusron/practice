<?php
include 'includes/login.php';

	// POSTから値を受け取る
	$name = $_POST['name'];
	$title = $_POST['title'];
	$body = $_POST['body'];
	$pass = $_POST['pass'];

	// バリデーション
	// 名前・本文空白チェック
	if($name == null || $body == null) {
		header('Location:bbs.php');
		exit();
	}

	// パスワードの桁数チェック
	if(!preg_match("/^[0-9]{4}$/", $pass)) {
		header('Location:bbs.php');
		exit();
	}

	// 名前にクッキーをセット
	// 現在時刻よりも60秒×60分×24時間×30日後なので、30日後まで有効になる
	setcookie('name', $name, time() + 60 * 60 * 24 * 30);

	// DBに接続
	$dsn = 'mysql:host=localhost;dbname=tennis;charset=utf8';
	$user = 'tennisuser';
	$password = '0832';

	try{
		$db = new PDO($dsn, $user, $password);
		$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

	// プリペアドステートメント発行
	$stmt = $db->prepare("INSERT INTO bbs(name, title, body, date, pass) VALUES(:name, :title, :body, now(), :pass)");

	// パラメータの割当
	$stmt -> bindParam(':name', $name, PDO::PARAM_STR);
	$stmt -> bindParam(':title', $title, PDO::PARAM_STR);
	$stmt -> bindParam(':body', $body, PDO::PARAM_STR);
	$stmt -> bindParam(':pass', $pass, PDO::PARAM_STR);

	$stmt->execute();

	//bbs.phpに遷移
	header('Location:bbs.php');
	exit();

	} catch(PDOException $e) {
		die('エラー'.$e->getMessage());
		var_dump($e);
	}
?>
<html>
<head>
	<title>けいじばん</title>
<meta http-equiv="Content-Type" content="text/html;
charset="utf-8">
<link rel="stylesheet" type="text/css" href="mac.css"/>
</head>
<body>

</body>
</html>

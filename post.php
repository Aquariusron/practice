<?php
	//POSTメソッドでnameタグの値を受け取る
	$name = $_POST['name'];

	//性別
	$gender = $_POST['gender'];

	//評価 数値かどうかの判定
	$tmp_star = intval($_POST['star']);
	$star = '';

	// お問い合わせ情報
	$other = $_POST['other'];

	//　性別情報
	if($gender == "man") {
		$gender = "男性";
	} elseif($gender == "woman") {
		$gender = "女性";
	} else {
		echo '不正な値です'.'<br>';
	}

	//　評価情報
	if($tmp_star > 5 || $tmp_star < 1) {
		echo '不正な値です'.'<br>';
	} else {
		for($i = 0; $i < $tmp_star; $i++) {
			$star .= '★'; 
		}
		for(; $i < 5; $i++) {
			$star .= '☆';
		}
	}
?>
<html>
<head>
	<title>アンケート結果</title>
<meta http-equiv="Content-Type" content="text/html;
charset=utf-8">
</head>
<body>
	<h1>アンケート結果</h1>
	<p>お名前：<?php echo $name; ?></p>
	<p>性別：<?php echo $gender; ?></p>
	<p>評価：<?php echo $star; ?></p>
	<p>ご意見：<?php echo nl2br($other,false); ?></p>

</body>
</html>
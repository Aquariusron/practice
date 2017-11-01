<?php
include 'includes/login.php';

	$fp = fopen("info.txt", "r");
	$line = array();

	if($fp) {
		while(!feof($fp)) {
			$line[] = fgets($fp);
		}
	fclose($fp);
	}
?>
<html>
<head>
	<title>テニスサークル交流サイト</title>
<link rel="stylesheet" type="text/css" href="mac.css"/>
<meta http-equiv="Content-Type" content="text/html;
charset=utf-8">
</head>
<body>
	<h1>テニスサークル交流サイト</h1>
	<p><a href="index.php">トップページへ戻る</a></p>
	<h2>お知らせ</h2>
	<?php
		//配列の要素があったら
		if(count($line) > 0) {
			//配列の一番最初の要素だけ見出しにする
			foreach($line as $key => $value) {
				if($key == 0) {
					echo '<h3>'.$value.'</h3>';
				//それ以降は改行して配列内を表示
				} else {
					echo $value.'<br>';
				}
			}
		} else {
			echo 'お知らせはありません';
		}
	?>
</body>
</html>